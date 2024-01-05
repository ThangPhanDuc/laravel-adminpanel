@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.leaves.management'))

@section('breadcrumb-links')
    @include('backend.leaves.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.leaves.management') }} <small
                            class="text-muted">{{ __('labels.backend.access.leaves.active') }}</small>
                    </h4>
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="leaves-table" class="table" data-ajax_url="{{ route('admin.leaves.get') }}">
                            <thead>
                                <tr>
                                    <th>{{ trans('labels.backend.access.leaves.table.user') }}</th>
                                    <th>{{ trans('labels.backend.access.leaves.table.leave_type') }}</th>
                                    <th>{{ trans('labels.backend.access.leaves.table.start_date') }}</th>
                                    <th>{{ trans('labels.backend.access.leaves.table.end_date') }}</th>
                                    <th>{{ trans('labels.backend.access.leaves.table.status') }}</th>
                                    <th>{{ trans('labels.backend.access.leaves.table.created_at') }}</th>
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
            FTX.Leaves.list.init();
        });
    </script>
@stop
