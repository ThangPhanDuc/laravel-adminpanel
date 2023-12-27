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
                            class="text-muted">{{ __('labels.backend.access.employees.view') }}</small>
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
                                    <th>{{ trans('labels.backend.access.employees.table.full_name') }}</th>
                                    <td>{{ $employee->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.phone_number') }}</th>
                                    <td>{{ $employee->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.position') }}</th>
                                    <td>{{ $employee->position }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.salary') }}</th>
                                    <td>{{ $employee->salary }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.createdat') }}</th>
                                    <td>{{ $employee->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.employees.table.updatedat') }}</th>
                                    <td>{{ $employee->updated_at->format('Y-m-d H:i:s') }}</td>
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
