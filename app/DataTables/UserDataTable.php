<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public const ROLE_BADGES = [
        'admin' => 'bg-danger',
        'hsemanger' => 'bg-primary',
        'supervisor' => 'bg-info text-dark',
        'karyawan' => 'bg-secondary',
        'kontraktor' => 'bg-warning text-dark',
        'paramedis' => 'bg-success',
        'timtanggapdarurat' => 'bg-dark',
        'direksi' => 'bg-primary',
        'auditor' => 'bg-info text-dark',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<User> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('name', fn ($item) => $item->name)
            ->addColumn('email', fn ($item) => $item->email)
            ->addColumn('status', function ($item) {
                $badgeClass = self::ROLE_BADGES[$item->role] ?? 'bg-secondary';
                $label = ucfirst($item->role);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('is_active', function ($item) {
                return $item->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-secondary">Nonaktif</span>';
            })
            ->addColumn('action', function ($user) {
                if (auth()->user()->role !== 'admin') {
                    return '';
                }

                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('user.updatePasswordForm', $user->id) . '" class="btn btn-sm btn-info text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Ubah Password"><i class="bi bi-key"></i></a>';
                $btn .= '<a href="' . route('user.edit', $user->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<form action="' . route('user.destroy', $user->id) . '" method="POST" class="m-0">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Hapus" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="bi bi-trash"></i></button></form>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'is_active']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<User>
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [
            Column::computed('DT_RowIndex')
                ->title('NO')
                ->width('5%')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),
            Column::make('name')
                ->title('Nama Pengguna'),
            Column::make('email')
                ->title('Email'),
            Column::make('status')
                ->title('Hak Akses'),
            Column::make('is_active')
                ->title('Status'),
        ];

        if (auth()->user()->role === 'admin') {
            $columns[] = Column::computed('action')
                ->title('AKSI')
                ->exportable(false)
                ->printable(false)
                ->width('15%')
                ->addClass('text-center');
        }

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
