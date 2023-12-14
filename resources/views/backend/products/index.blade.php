@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.products.management'))

@section('breadcrumb-links')
    @include('backend.products.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.products.management') }} <small
                            class="text-muted">{{ __('labels.backend.access.products.active') }}</small>
                    </h4>
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="products-table" class="table" data-ajax_url="{{ route('admin.products.get') }}">
                            <thead>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.name') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.code') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.unit_price') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.discount') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.final_price') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.category') }}</th>
                                    <th>{{ trans('labels.backend.access.products.table.createdat') }}</th>
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
        FTX.Products.list.init();
    });
</script>
@stop



