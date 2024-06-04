<?php

namespace App\DataTables;

use App\Models\PengajuanAdmin;
use App\Models\PengajuanPinjaman;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PengajuanAdminDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($pinjaman){
                if($pinjaman->status_admin === 'Menunggu'){
                    $btn1 = '<a href="'.url('admin/cekPengajuan/' . $pinjaman->id. '/detail').'" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a> ';
                    $btn2  = '
                        <a href="'.url('admin/cekPengajuan/' . $pinjaman->id. '/konfirmasi').'" class="btn btn-success"><i class="fa-solid fa-check"></i></a> 
                    '; 
                    return $btn1 . $btn2;
                } if ($pinjaman->status_admin != 'Menunggu') {
                    $btn1 = '<a href="'.url('admin/cekPengajuan/' . $pinjaman->id. '/detail').'" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a> ';
                    $btn2  = '
                        <a href="'.url('admin/cekPengajuan/' . $pinjaman->id. '/konfirmasi').'" class="btn btn-success disabled"><i class="fa-solid fa-check"></i></a> 
                    '; 
                    return $btn1 . $btn2;
                }   
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PengajuanPinjaman $model): QueryBuilder
    {
        return $model->newQuery()
                        ->join('ruangans', 'pengajuan_pinjamans.ruangan_id', '=', 'ruangans.id')
                        ->join('users', 'pengajuan_pinjamans.user_id', '=', 'users.id')
                        ->select('pengajuan_pinjamans.*', 'ruangans.nama as nama_ruangan', 'users.nama as nama_user');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pengajuanadmin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
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
            Column::make('nama_user'),
            Column::make('nama_ruangan'),
            Column::make('tanggal_mulai'),
            Column::make('tanggal_selesai'),
            Column::make('status_admin'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PengajuanAdmin_' . date('YmdHis');
    }
}
