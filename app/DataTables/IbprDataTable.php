<?php

namespace App\DataTables;

use App\Models\Ibpr;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IbprDataTable extends DataTable
{
    public const STATUS_BADGES = [
        'open' => 'bg-danger',
        'in_progress' => 'bg-warning text-dark',
        'selesai' => 'bg-success',
    ];

    public const TINGKAT_BADGES = [
        'Ekstrem' => 'bg-danger',
        'Tinggi' => 'bg-danger bg-opacity-75',
        'Sedang' => 'bg-warning text-dark',
        'Rendah' => 'bg-success',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Ibpr> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('aktivitas', fn ($item) => $item->aktivitas)
            ->addColumn('bahaya', fn ($item) => $item->bahaya)
            ->addColumn('konsekuensi', fn ($item) => $item->konsekuensi ?: '-')
            ->addColumn('keparahan', fn ($item) => $item->keparahan)
            ->addColumn('kemungkinan', fn ($item) => $item->kemungkinan)
            ->addColumn('risiko', fn ($item) => $item->risiko)
            ->addColumn('tingkat', function ($item) {
                $badgeClass = self::TINGKAT_BADGES[$item->tingkat] ?? 'bg-secondary';

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($item->tingkat) . '</span>';
            })
            ->addColumn('hierarki', fn ($item) => Ibpr::HIERARKI[$item->hierarki] ?? ($item->hierarki ?: '-'))
            ->addColumn('pic', fn ($item) => $item->pic ?: '-')
            ->addColumn('batas_waktu', fn ($item) => $item->batas_waktu ? $item->batas_waktu->format('d-m-Y') : '-')
            ->addColumn('status', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status] ?? 'bg-secondary';
                $label = Ibpr::STATUS[$item->status] ?? ucfirst($item->status);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('ibpr.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('ibpr.destroy', $item->id) . '" data-name="' . e($item->aktivitas) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'tingkat']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Ibpr>
     */
    public function query(Ibpr $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ibpr-table')
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
            Column::make('aktivitas')
                ->title('Proses/Aktivitas'),
            Column::make('bahaya')
                ->title('Bahaya'),
            Column::make('konsekuensi')
                ->title('Konsekuensi'),
            Column::make('keparahan')
                ->title('Keparahan (S)')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('kemungkinan')
                ->title('Kemungkinan (L)')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('risiko')
                ->title('Nilai Risiko')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('tingkat')
                ->title('Tingkat')
                ->searchable(false)
                ->addClass('text-center'),
            Column::make('hierarki')
                ->title('Hierarki Pengendalian'),
            Column::make('pic')
                ->title('PIC'),
            Column::make('batas_waktu')
                ->title('Batas Waktu'),
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
        return 'IBPR_' . date('YmdHis');
    }
}
