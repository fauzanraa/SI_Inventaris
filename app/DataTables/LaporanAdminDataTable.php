<?php

namespace App\DataTables;

use App\Models\LaporanAdmin;
use App\Models\PinjamanRuangan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LaporanAdminDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', 'laporanadmin.aksi')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PinjamanRuangan $model): QueryBuilder
    {
        return $model->newQuery()
                        ->join('pengajuan_pinjamans', 'pinjaman_ruangans.pengajuan_pinjaman_id', '=', 'pengajuan_pinjamans.id')
                        ->join('ruangans', 'pengajuan_pinjamans.ruangan_id', '=', 'ruangans.id' )
                        ->join('users', 'pengajuan_pinjamans.user_id', '=', 'users.id')
                        ->select('pinjaman_ruangans.*', 'pengajuan_pinjamans.tanggal_mulai as tanggal_mulai', 'pengajuan_pinjamans.tanggal_selesai as tanggal_selesai', 'users.nama as nama', 'ruangans.nama as nama_ruangan');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('laporanadmin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
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
            Column::make('nama'),
            Column::make('nama_ruangan'),
            Column::make('tanggal_approval'),
            Column::make('tanggal_mulai'),
            Column::make('tanggal_selesai'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LaporanAdmin_' . date('YmdHis');
    }
}
