@extends('backend.layouts.app')

@section('title', __('labels.backend.access.tickets.management') . ' | ' . __('labels.backend.access.tickets.edit'))

@section('breadcrumb-links')
    @include('backend.tickets.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($ticket, ['route' => ['admin.tickets.update', $ticket], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.tickets.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.tickets.index', 'id' => $ticket->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection