<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('action', function($query) {
                return $this->action($query);
            })
            ->editColumn('created_at', function($query) {
                return $query->created_at->format('d M Y');
            })
            ->editColumn('updated_at', function($query) {
                return $query->updated_at->format('d M Y');
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->addIndex()
                    ->setTableId('data-table')
                    ->addTableClass('table-striped table-bordered')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->dom('lBfrtip')
                    ->orderBy(3)
                    ->responsive()
                    ->autoWidth(false)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('sl')->orderable(false)->searchable(false),
            // Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at')->searchable(false),
            Column::make('updated_at')->searchable(false),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }



    public function action($query) {
        return '<div class="btn-area d-flex">
        <a href=" ' . route("user.edit", $query->id) . ' " class="btn btn-raised btn-primary waves-effect">Edit</a>
        <a href="#" data-id=" ' . $query->id . ' " type="submit" class="btn btn-raised btn-danger waves-effect delete-btn">Delete</a>
        </div>';
    }
}
