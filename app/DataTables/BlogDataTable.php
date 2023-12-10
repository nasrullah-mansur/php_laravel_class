<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
        ->editColumn('category', function($query) {
            return ucwords($query->category->name);
        })
        ->editColumn('image', function($query) {
            return '<img width="80" src="'. asset($query->image_sm) .'" />';
        })
        ->editColumn('updated_at', function($query) {
            return $query->updated_at->format('d M Y');
        });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    ->orderBy(1)
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
            Column::make('image'),
            Column::make('title'),
            Column::make('category'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Blog_' . date('YmdHis');
    }

    public function action($query) {
        return '<div class="btn-area d-flex">
        <a href=" ' . route("user.edit", $query->id) . ' " class="btn btn-raised btn-primary waves-effect">Edit</a>
        <a href="#" data-id=" ' . $query->id . ' " type="submit" class="btn btn-raised btn-danger waves-effect delete-btn">Delete</a>
        </div>';
    }
}
