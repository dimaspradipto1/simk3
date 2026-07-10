<?php

namespace App\DataTables;

use App\Models\Pelatihanhse;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PelatihanhseDataTable extends DataTable
{
    public const STATUS_BADGES = [
        'selesai' => 'bg-success',
        'dijadwalkan' => 'bg-warning text-dark',
        'batal' => 'bg-secondary',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Pelatihanhse> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('nama_pelatihan', fn ($item) => $item->nama_pelatihan)
            ->addColumn('kategori', fn ($item) => Pelatihanhse::KATEGORI[$item->kategori] ?? $item->kategori)
            ->addColumn('tanggal', fn ($item) => $item->tanggal->format('d-m-Y'))
            ->addColumn('jumlah_peserta', fn ($item) => $item->jumlah_peserta)
            ->addColumn('instruktur', fn ($item) => $item->instruktur)
            ->addColumn('sertifikat', function ($item) {
                return $item->sertifikat === 'ya'
                    ? '<span class="badge bg-success">Ya</span>'
                    : '<span class="badge bg-secondary">Tidak</span>';
            })
            ->addColumn('status', function ($item) {
                $badgeClass = self::STATUS_BADGES[$item->status] ?? 'bg-secondary';
                $label = Pelatihanhse::STATUS[$item->status] ?? ucfirst($item->status);

                return '<span class="badge rounded-pill ' . $badgeClass . '">' . e($label) . '</span>';
            })
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('pelatihanhse.show', $item->id) . '" class="btn btn-sm btn-primary text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Detail"><i class="bi bi-eye"></i></a>';
                $btn .= '<a href="' . route('pelatihanhse.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('pelatihanhse.destroy', $item->id) . '" data-name="' . e($item->nama_pelatihan) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action', 'status', 'sertifikat']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Pelatihanhse>
     */
    public function query(Pelatihanhse $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pelatihanhse-table')
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
            Column::make('nama_pelatihan')
                ->title('Nama Pelatihan'),
            Column::make('kategori')
                ->title('Kategori'),
            Column::make('tanggal')
                ->title('Tanggal'),
            Column::make('jumlah_peserta')
                ->title('Peserta')
                ->addClass('text-center'),
            Column::make('instruktur')
                ->title('Instruktur'),
            Column::make('sertifikat')
                ->title('Sertifikasi'),
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
        return 'Pelatihan_HSE_' . date('YmdHis');
    }
}
