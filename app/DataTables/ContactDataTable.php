<?php

namespace App\DataTables;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
{
    /**
     * Build DataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()

            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" class="checkbox" data-id="'.$row->id.'">';
            })

            // Combine Name, Email, Mobile
            ->addColumn('contact_info', function ($row) {
                return '<strong>' . e($row->name) . '</strong><br>
                        <span class="text-muted">' . e($row->email) . '</span><br>
                        <span class="text-muted">' . ($row->mobile ?? 'N/A') . '</span>';
            })

            ->editColumn('message', function ($row) {
                return \Str::limit($row->message, 80);
            })

            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y') . '<br>' . $row->created_at->format('h:i A');
            })

            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-outline-info btn-sm show-contact"
                        data-route="'.route('admin.contacts.show', $row->id).'">
                        View
                    </button>

                    <button class="btn btn-outline-danger btn-sm delete-confirm"
                        data-route="'.route('admin.contacts.destroy', $row->id).'"
                        data-csrf="'.csrf_token().'">
                        Delete
                    </button>
                ';
            })

            ->rawColumns(['checkbox', 'contact_info', 'message', 'created_at', 'action']);
    }

    /**
     * Query source
     */
    public function query(Contact $model): QueryBuilder
    {
        return $model->newQuery()->latest();
    }

    /**
     * HTML Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contact-table')
            ->setTableAttribute('class', 'table table-hover table-bordered align-middle')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'><'col-md-4'f>>rt<'row'<'col-md-6'i><'col-md-6'p>>");
    }

    /**
     * Columns
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('SL')
                ->orderable(false)
                ->searchable(false)
                ->width('5%'),

            Column::computed('checkbox')
                ->title('Select') 
                ->orderable(false)
                ->searchable(false)
                ->width('5%'),

            Column::computed('contact_info')->title('Contact Info')->orderable(false)->width('20%'),

            Column::make('message')
            ->title('Message')
            ->orderable(false)
            ->width('35%'),

            Column::make('created_at')->title('Created')->width('10%'),

            Column::computed('action')
                ->title('Action')
                ->orderable(false)
                ->searchable(false)
                ->width('15%'),
        ];
    }
}
