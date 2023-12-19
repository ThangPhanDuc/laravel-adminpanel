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
                            class="text-muted">{{ __('labels.backend.access.tickets.view') }}</small>
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
                                    <th>{{ trans('labels.backend.access.tickets.table.content') }}</th>
                                    <td>{{ $ticket->content }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.type') }}</th>
                                    <td>{{ $ticket->type }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.flag') }}</th>
                                    <td>{{ $ticket->flag->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.expected') }}</th>
                                    <td>{{ $ticket->expected }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.user') }}</th>
                                    <td>{{ $ticket->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.status') }}</th>
                                    <td>{{ $ticket->status }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.link') }}</th>
                                    <td>{{ $ticket->link }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.image') }}</th>
                                    <td><img src="{{ asset('storage/img/ticket/' . $ticket->image_path) }}"
                                            alt={{ $ticket->image_path }} height="80" width="80"
                                            class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.response') }}</th>
                                    <td>{{ $ticket->response }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.createdat') }}</th>
                                    <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('labels.backend.access.tickets.table.updatedat') }}</th>
                                    <td>{{ $ticket->updated_at->format('Y-m-d H:i:s') }}</td>
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
    @include('backend.tickets.chat', ['id' => $ticket->id])
@endsection
