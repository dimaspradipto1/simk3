<?php

namespace App\DataTables;

use App\Models\ObservasiBahaya;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ObservasiBahayaDataTable extends DataTable
{
    public const STATUS_BADGES = [
        'open' => 'bg-danger',
        'in_progress' => 'bg-warning text-dark',
        'closed' => 'bg-success',
    ];

    public const RISK_BADGES = [
        'rendah' => 'bg-success',
        'sedang' => 'bg-warning text-dark',
        'tinggi' => 'bg-danger',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ObservasiBahaya> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('tanggal', fn ($item) => $item->tanggal->format('d-m-Y'))
            ->addColumn('lokasi', fn ($item) => $item->lokasi)
            ->addColumn('kategori_bahaya', fn ($item) => ObservasiBahaya::KATEGORI_BAHAYA[$item->kategori_bahaya] ?? $item->kategori_bahaya)
            ->addColumn('tingkat_resiko', function ($item) {
                $badgeClass = self::RISK_BADGES[$item->tingkat_resiko] ?? 'bg-secondary';
                $label = ObservasiBahaya::RISK_LEVELS[$item->tingkat_resiko] ?? ucfirst($item->tingkat_resiko);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('pic', fn ($item) => $item->pic)
            ->addColumn('target_selesai', fn ($item) => $item->target_selesai->format('d-m-Y'))
            ->addColumn('status', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status] ?? 'bg-secondary';
                $label = ObservasiBahaya::STATUSES[$item->status] ?? ucfirst($item->status);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('observasi-bahaya.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('observasi-bahaya.destroy', $item->id) . '" data-name="' . e($item->lokasi) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'tingkat_resiko']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<ObservasiBahaya>
     */
    public function query(ObservasiBahaya $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('observasi-bahaya-table')
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
            Column::make('tanggal')
                ->title('Tanggal'),
            Column::make('lokasi')
                ->title('Lokasi'),
            Column::make('kategori_bahaya')
                ->title('Kategori Bahaya'),
            Column::make('tingkat_resiko')
                ->title('Tingkat Risiko'),
            Column::make('pic')
                ->title('PIC'),
            Column::make('target_selesai')
                ->title('Target Selesai'),
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
        return 'Observasi_Bahaya_' . date('YmdHis');
    }
}
