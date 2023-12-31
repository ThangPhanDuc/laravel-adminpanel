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

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Employees.list.init();
    });
</script>
@stop

