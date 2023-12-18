@extends('backend.layouts.app')

@section('title', __('labels.backend.access.tickets.management') . ' | ' . __('labels.backend.access.tickets.create'))

@section('breadcrumb-links')
    @include('backend.tickets.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.tickets.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.tickets.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.tickets.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection