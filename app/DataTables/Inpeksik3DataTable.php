<?php

namespace App\DataTables;

use App\Models\Inpeksik3;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class Inpeksik3DataTable extends DataTable
{
    public const STATUS_BADGES = [
        'selesai' => 'bg-success',
        'belum' => 'bg-warning text-dark',
        'batal' => 'bg-secondary',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Inpeksik3> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('tanggal', fn ($item) => $item->tanggal->format('d-m-Y'))
            ->addColumn('lokasi', fn ($item) => $item->lokasi)
            ->addColumn('jenis_inpeksi', fn ($item) => Inpeksik3::JENIS_INPEKSI[$item->jenis_inpeksi] ?? $item->jenis_inpeksi)
            ->addColumn('inspektor', fn ($item) => $item->inspektor)
            ->addColumn('skor', fn ($item) => $item->skor)
            ->addColumn('status_selesai', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status_selesai] ?? 'bg-secondary';
                $label = Inpeksik3::STATUS_SELESAI[$item->status_selesai] ?? ucfirst($item->status_selesai);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('inpeksik3.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('inpeksik3.destroy', $item->id) . '" data-name="' . e($item->lokasi) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status_selesai']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Inpeksik3>
     */
    public function query(Inpeksik3 $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('inpeksik3-table')
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
            Column::make('jenis_inpeksi')
                ->title('Jenis Inspeksi'),
            Column::make('inspektor')
                ->title('Inspektor'),
            Column::make('skor')
                ->title('Skor')
                ->addClass('text-center'),
            Column::make('status_selesai')
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
        return 'Inpeksi_K3_' . date('YmdHis');
    }
}
