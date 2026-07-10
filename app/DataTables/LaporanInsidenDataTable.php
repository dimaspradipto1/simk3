<?php

namespace App\DataTables;

use App\Models\LaporanInsiden;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LaporanInsidenDataTable extends DataTable
{
    public const STATUS_BADGES = [
        'open' => 'bg-danger',
        'in_progress' => 'bg-warning text-dark',
        'closed' => 'bg-success',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<LaporanInsiden> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('no_laporan', fn ($item) => $item->no_laporan)
            ->addColumn('jenis_insiden', fn ($item) => $item->jenis_insiden)
            ->addColumn('tanggal', fn ($item) => $item->tanggal->format('d-m-Y') . ' ' . $item->waktu)
            ->addColumn('lokasi', fn ($item) => $item->lokasi)
            ->addColumn('nama_korban', fn ($item) => $item->nama_korban)
            ->addColumn('status', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status] ?? 'bg-secondary';
                $label = LaporanInsiden::STATUSES[$item->status] ?? ucfirst($item->status);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('laporan-insiden.show', $item->id) . '" class="btn btn-sm btn-primary text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Detail"><i class="bi bi-eye"></i></a>';

                if (in_array(auth()->user()->role, ['admin', 'hsemanger'])) {
                    $btn .= '<a href="' . route('laporan-insiden.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '<form action="' . route('laporan-insiden.destroy', $item->id) . '" method="POST" class="m-0">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Hapus" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="bi bi-trash"></i></button></form>';
                }

                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<LaporanInsiden>
     */
    public function query(LaporanInsiden $model): QueryBuilder
    {
        $query = $model->newQuery();

        if (! in_array(auth()->user()->role, ['admin', 'hsemanger'])) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('laporan-insiden-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->scrollX()
            ->orderBy(1, 'desc')
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
            Column::make('no_laporan')
                ->title('No. Laporan'),
            Column::make('jenis_insiden')
                ->title('Jenis Insiden'),
            Column::make('tanggal')
                ->title('Tanggal & Waktu'),
            Column::make('lokasi')
                ->title('Lokasi'),
            Column::make('nama_korban')
                ->title('Korban'),
            Column::make('status')
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
        return 'Laporan_Insiden_' . date('YmdHis');
    }
}
