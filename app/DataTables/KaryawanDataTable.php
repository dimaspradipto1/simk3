<?php

namespace App\DataTables;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KaryawanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Karyawan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('nip', fn ($item) => $item->nip ?: '-')
            ->addColumn('nama', fn ($item) => $item->nama)
            ->addColumn('departemen', fn ($item) => $item->departemen->nama_departemen ?? '-')
            ->addColumn('jabatan', fn ($item) => $item->jabatan ?: '-')
            ->addColumn('no_hp', fn ($item) => $item->no_hp ?: '-')
            ->addColumn('is_active', function ($item) {
                return $item->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-secondary">Nonaktif</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('karyawan.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('karyawan.destroy', $item->id) . '" data-name="' . e($item->nama) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'is_active']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Karyawan>
     */
    public function query(Karyawan $model): QueryBuilder
    {
        return $model->newQuery()->with('departemen');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('karyawan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->scrollX()
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
        return [
            Column::computed('DT_RowIndex')
                ->title('NO')
                ->width('5%')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),
            Column::make('nip')
                ->title('NIP'),
            Column::make('nama')
                ->title('Nama Karyawan'),
            Column::make('departemen')
                ->title('Departemen')
                ->searchable(false)
                ->orderable(false),
            Column::make('jabatan')
                ->title('Jabatan'),
            Column::make('no_hp')
                ->title('No. HP'),
            Column::make('is_active')
                ->title('Status'),
            Column::computed('action')
                ->title('AKSI')
                ->exportable(false)
                ->printable(false)
                ->width('15%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Karyawan_' . date('YmdHis');
    }
}
