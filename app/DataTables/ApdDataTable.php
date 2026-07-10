<?php

namespace App\DataTables;

use App\Models\Apd;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ApdDataTable extends DataTable
{
    public const KONDISI_BADGES = [
        'baik' => 'bg-success',
        'perlu_periksa' => 'bg-warning text-dark',
        'rusak' => 'bg-danger',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Apd> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('jenis_apd', fn ($item) => $item->jenis_apd)
            ->addColumn('merek', fn ($item) => $item->merek)
            ->addColumn('jumlah_tersedia', fn ($item) => $item->jumlah_tersedia)
            ->addColumn('jumlah_dibutuhkan', fn ($item) => $item->jumlah_dibutuhkan)
            ->addColumn('selisih', function ($item) {
                $class = $item->selisih > 0 ? 'text-success' : ($item->selisih < 0 ? 'text-danger' : '');
                $sign = $item->selisih > 0 ? '+' : '';

                return '<span class="' . $class . ' fw-bold">' . $sign . $item->selisih . '</span>';
            })
            ->addColumn('kondisi', function ($item) {
                $badgeClass = self::KONDISI_BADGES[$item->kondisi] ?? 'bg-secondary';
                $label = Apd::KONDISI[$item->kondisi] ?? ucfirst($item->kondisi);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('tanggal_beli', fn ($item) => $item->tanggal_beli->format('d-m-Y'))
            ->addColumn('masa_pakai', fn ($item) => $item->masa_pakai . ' bln')
            ->addColumn('tanggal_kadaluarsa', fn ($item) => $item->tanggal_kadaluarsa->format('d-m-Y'))
            ->addColumn('status', function ($item) {
                $badgeClass = $item->status === 'OK' ? 'bg-success' : 'bg-danger bg-opacity-25 text-danger';

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($item->status) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('apd.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('apd.destroy', $item->id) . '" data-name="' . e($item->jenis_apd) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'kondisi', 'selisih']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Apd>
     */
    public function query(Apd $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('apd-table')
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
            Column::make('jenis_apd')
                ->title('Jenis APD'),
            Column::make('merek')
                ->title('Merek/Model'),
            Column::make('jumlah_tersedia')
                ->title('Tersedia')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('jumlah_dibutuhkan')
                ->title('Dibutuhkan')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('selisih')
                ->title('Selisih')
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center'),
            Column::make('kondisi')
                ->title('Kondisi'),
            Column::make('tanggal_beli')
                ->title('Tgl Beli'),
            Column::make('masa_pakai')
                ->title('Masa Pakai'),
            Column::make('tanggal_kadaluarsa')
                ->title('Tgl Kadaluarsa')
                ->searchable(false)
                ->orderable(false),
            Column::make('status')
                ->title('Status')
                ->searchable(false)
                ->orderable(false),
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
        return 'APD_' . date('YmdHis');
    }
}
