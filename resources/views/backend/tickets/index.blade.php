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
                                    <th>{{ trans('labels.backend.access.tickets.table.expected') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.status') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.link') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.response') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.user') }}</th>
                                    <th>{{ trans('labels.backend.access.tickets.table.createdat') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        FTX.Utils.documentReady(function() {
            FTX.Tickets.list.init();
        });
    </script>
@stop

