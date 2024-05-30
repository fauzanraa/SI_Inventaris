<?php

namespace App\DataTables;

use App\Models\PinjamanRuangan;
use App\Models\TandaTerima;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TandaTerimaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($tandaTerima){
                $btn  = '
                        <a href="'.url('admin/cekPengajuan/' . $tandaTerima->id. '/konfirmasi').'" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        '; 
                return $btn;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PinjamanRuangan $model): QueryBuilder
    {
        return $model->newQuery()
                        ->join('pengajuan_pinjamans', 'pinjaman_ruangans.pengajuan_pinjaman_id', '=', 'pengajuan_pinjamans.id' )
                        ->select('pinjaman_ruangans.*', 'pengajuan_pinjamans.tanggal_mulai as tanggal_mulai', 'pengajuan_pinjamans.tanggal_selesai as tanggal_selesai');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tandaterima-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('pengajuan_pinjaman_id'),
            Column::make('tanggal_approval'),
            Column::make('tanggal_mulai'),
            Column::make('tanggal_selesai'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->height(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TandaTerima_' . date('YmdHis');
    }
}
