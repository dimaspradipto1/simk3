<?php

namespace App\DataTables;

use App\Models\Departemen;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DepartemenDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Departemen> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('nama_departemen', fn ($item) => $item->nama_departemen)
            ->addColumn('keterangan', fn ($item) => $item->keterangan ?: '-')
            ->addColumn('jumlah_karyawan', fn ($item) => $item->karyawans_count)
            ->addColumn('action', function ($item) {
                $btn = '<div class="d-flex justify-content-center align-items-center" style="gap: 5px;">';
                $btn .= '<a href="' . route('departemen.edit', $item->id) . '" class="btn btn-sm btn-warning text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit"><i class="bi bi-pencil-square"></i></a>';
                $btn .= '<button type="button" class="btn btn-danger btn-sm rounded shadow-sm d-flex align-items-center justify-content-center btn-delete" style="width: 30px; height: 30px;" title="Hapus" data-url="' . route('departemen.destroy', $item->id) . '" data-name="' . e($item->nama_departemen) . '"><i class="bi bi-trash"></i></button>';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Departemen>
     */
    public function query(Departemen $model): QueryBuilder
    {
        return $model->newQuery()->withCount('karyawans');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('departemen-table')
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
            Column::make('nama_departemen')
                ->title('Nama Departemen'),
            Column::make('keterangan')
                ->title('Keterangan'),
            Column::make('jumlah_karyawan')
                ->title('Jumlah Karyawan')
                ->searchable(false)
                ->addClass('text-center'),
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
        return 'Departemen_' . date('YmdHis');
    }
}
