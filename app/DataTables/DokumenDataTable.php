<?php

namespace App\DataTables;

use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DokumenDataTable extends DataTable
{
    public const STATUS_BADGES = [
        'aktif' => 'bg-success',
        'review' => 'bg-warning text-dark',
        'obsolete' => 'bg-secondary',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Dokumen> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('nomor_dokumen', fn ($item) => $item->nomor_dokumen)
            ->addColumn('nama_dokumen', fn ($item) => $item->nama_dokumen)
            ->addColumn('jenis', fn ($item) => '<span class="badge bg-info text-dark">' . e(Dokumen::JENIS[$item->jenis] ?? $item->jenis) . '</span>')
            ->addColumn('versi', fn ($item) => $item->versi ?: '-')
            ->addColumn('tanggal_efektif', fn ($item) => $item->tanggal_efektif->format('d-m-Y'))
            ->addColumn('tanggal_review', fn ($item) => $item->tanggal_review ? $item->tanggal_review->format('d-m-Y') : '-')
            ->addColumn('pemilik_dokumen', fn ($item) => $item->pemilik_dokumen ?: '-')
            ->addColumn('status', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status] ?? 'bg-secondary';
                $label = Dokumen::STATUS[$item->status] ?? ucfirst($item->status);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('peringatan', function ($item) {
                return $item->peringatan
                    ? '<span class="text-warning-emphasis"><i class="bi bi-exclamation-triangle-fill"></i> ' . e($item->peringatan) . '</span>'
                    : '';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('dokumen.show', $item->id) . '" class="btn btn-sm btn-primary text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Detail"><i class="bi bi-eye"></i></a>';
                $btn .= '<button type="button" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center btn-edit-dokumen" style="width: 30px; height: 30px;" title="Edit"'
                    . ' data-url="' . route('dokumen.update', $item->id) . '"'
                    . ' data-nomor_dokumen="' . e($item->nomor_dokumen) . '"'
                    . ' data-jenis="' . e($item->jenis) . '"'
                    . ' data-nama_dokumen="' . e($item->nama_dokumen) . '"'
                    . ' data-versi="' . e($item->versi) . '"'
                    . ' data-pemilik_dokumen="' . e($item->pemilik_dokumen) . '"'
                    . ' data-tanggal_efektif="' . e($item->tanggal_efektif->format('Y-m-d')) . '"'
                    . ' data-tanggal_review="' . e(optional($item->tanggal_review)->format('Y-m-d')) . '"'
                    . ' data-status="' . e($item->status) . '"'
                    . ' data-link_dokumen="' . e($item->link_dokumen) . '"'
                    . '><i class="bi bi-pencil-square"></i></button>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('dokumen.destroy', $item->id) . '" data-name="' . e($item->nomor_dokumen) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'jenis', 'peringatan']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Dokumen>
     */
    public function query(Dokumen $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dokumen-table')
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
            Column::make('nomor_dokumen')
                ->title('No. Dokumen'),
            Column::make('nama_dokumen')
                ->title('Judul'),
            Column::make('jenis')
                ->title('Jenis'),
            Column::make('versi')
                ->title('Versi'),
            Column::make('tanggal_efektif')
                ->title('Tgl Efektif'),
            Column::make('tanggal_review')
                ->title('Tgl Review'),
            Column::make('pemilik_dokumen')
                ->title('Pemilik'),
            Column::make('status')
                ->title('Status'),
            Column::make('peringatan')
                ->title('Peringatan')
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
        return 'Register_Dokumen_' . date('YmdHis');
    }
}
