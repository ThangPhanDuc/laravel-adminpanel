@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.employees.management'))

@section('breadcrumb-links')
    @include('backend.employees.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.employees.management') }} <small
                            class="text-muted">{{ __('labels.backend.access.employees.active') }}</small>
                    </h4>
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="employees-table" class="table" data-ajax_url="{{ route('admin.employees.get') }}">
                            <thead>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.full_name') }}</th>
                                    <th>{{ trans('labels.backend.access.employees.table.phone_number') }}</th>
                                    <th>{{ trans('labels.backend.access.employees.table.position') }}</th>
                                    <th>{{ trans('labels.backend.access.employees.table.salary') }}</th>
                                    <th>{{ trans('labels.backend.access.employees.table.createdat') }}</th>
                                    <th>{{ trans('labels.general.actions') }}</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->


        </div>
        <!--card-body-->
    </div>
    <!--card-->
@endsection

{{-- @section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.employees.list.init();
    });
</script>
@stop --}}

@section('pagescript')
    <script>
        FTX.Employees = {

            list: {
                selectors: {
                    employees_table: $('#employees-table'),
                },
                init: function() {
                    this.selectors.employees_table.dataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: this.selectors.employees_table.data('ajax_url'),
                            type: 'post',
                        },

                        columns: [{
                                data: 'full_name',
                                name: 'employees.content',
                            },
                            {
                                data: 'phone_number',
                                name: 'employees.type',
                            },
                            {
                                data: 'position',
                                name: 'employees.position',
                            },
                            {
                                data: 'salary',
                                name: 'employees.salary',
                            },
                            {
                                data: 'created_at',
                                name: 'employees.created_at',
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
            FTX.Employees.list.init();
        });
    </script>
@stop
