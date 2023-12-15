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
                            class="text-muted">{{ __('labels.backend.access.products.view') }}</small>
                    </h4>
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.name') }}</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.code') }}</th>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.unit_price') }}</th>
                                    <td>{{ $product->unit_price }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.discount') }}</th>
                                    <td>{{ $product->discount }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.final_price') }}</th>
                                    <td>{{ $product->final_price }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.category') }}</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.image') }}</th>
                                    <td><img src="{{ asset('storage/img/product/'.$product->image) }}" alt={{ $product->image }} height="80" width="80" class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.description') }}</th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.createdat') }}</th>
                                    <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.products.table.updatedat') }}</th>
                                    <td>{{ $product->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </tbody>
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
