@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.tickets.management'))

@section('breadcrumb-links')
    @include('backend.tickets.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.tickets.management') }} <small
                            class="text-muted">{{ __('labels.backend.access.tickets.active') }}</small>
                    </h4>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="tickets-table" class="table" data-ajax_url="{{ route('admin.tickets.get') }}">
                            <thead>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.content') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.type') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.flag') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.status') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.link') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.response') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.user') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.createdat') }}</th>
                                    <th>{{ trans('labels.general.actions') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Tickets.list.init();
    });
</script>
@stop --}}

@section('pagescript')
    <script>
        FTX.Tickets = {

            list: {
                selectors: {
                    tickets_table: $('#tickets-table'),
                },
                init: function() {
                    this.selectors.tickets_table.dataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: this.selectors.tickets_table.data('ajax_url'),
                            type: 'post',
                        },

                        columns: [{
                                data: 'content',
                                name: 'tickets.content',
                            },
                            {
                                data: 'type',
                                name: 'tickets.type',
                            },
                            {
                                data: 'ticket_flag_id',
                                name: 'tickets.ticket_flag_id',
                            },
                            {
                                data: 'status',
                                name: 'tickets.status',
                            },
                            {
                                data: 'link',
                                name: 'tickets.link',
                            },
                            {
                                data: 'response',
                                name: 'tickets.response',
                            },
                            {
                                data: 'user_id',
                                name: 'tickets.user_id',
                            },
                            {
                                data: 'created_at',
                                name: 'tickets.created_at',
                            },
                            {
                                data: 'actions',
                                name: 'actions',
                                searchable: false,
                                sortable: false
                            }

                        ],
                        order: [
                            [3, "asc"]
                        ],
                        searchDelay: 500,
                        "createdRow": function(row, data, dataIndex) {
                            FTX.Utils.dtAnchorToForm(row);
                        }
                    });
                }
            },


        }

        FTX.Utils.documentReady(function() {
            FTX.Tickets.list.init();
        });
    </script>
@stop
