<?php

namespace App\DataTables;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()

            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" class="checkbox" data-id="'.$row->id.'">';
            })

            ->addColumn('title', function ($row) {
                $image = $row->image
                    ? asset($row->image)
                    : asset('assets/admin/img/no-image.png');

                return '
                    <div class="d-flex align-items-center gap-2">
                        <img src="'.$image.'" width="50" height="40" class="rounded">
                        <span class="fw-semibold">'.e($row->title).'</span>
                    </div>
                ';
            })

            ->addColumn('visibility', function ($row) {
                return '
                    <label class="switch">
                        <input type="checkbox"
                            class="visibility-change"
                            data-route="'.route('admin.projects.visibility', $row->id).'"
                            '.($row->status === 'published' ? 'checked' : '').'>
                        <span class="slider"></span>
                    </label>
                ';
            })

            ->addColumn('status', function ($row) {
                return $row->status === 'published'
                    ? '<span class="badge bg-success">Published</span>'
                    : '<span class="badge bg-secondary">Draft</span>';
            })

            ->addColumn('action', function ($row) {
                return '
                    <a href="'.route('admin.projects.edit', $row->id).'"
                    class="btn btn-outline-primary btn-sm me-1">
                        Edit
                    </a>

                    <button class="btn btn-outline-danger btn-sm delete-confirm"
                        data-route="'.route('admin.projects.destroy', $row->id).'"
                        data-csrf="'.csrf_token().'">
                        Delete
                    </button>
                ';
            })

            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y <br> h:i A');
            })

            ->rawColumns(['checkbox','title','visibility','status','action','created_at']);
    }

    public function query(Project $model): QueryBuilder
    {
        return $model->newQuery()->latest();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('project-table')
            ->setTableAttribute('class', 'table table-hover table-bordered align-middle')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'row'<'col-md-6'i><'col-md-6'p>>")
            ->buttons([]);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('SL')->orderable(false),
            Column::computed('checkbox')->orderable(false)->searchable(false),
            Column::make('title')->title('Project'),
            Column::make('visibility')->title('Visibility'),
            Column::make('status')->title('Status'),
            Column::make('created_at')->title('Created'),
            Column::computed('action')->title('Action')->orderable(false)->searchable(false),
        ];
    }
}
