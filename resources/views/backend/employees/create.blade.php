@extends('backend.layouts.app')

@section('title', __('labels.backend.access.employees.management') . ' | ' . __('labels.backend.access.employees.create'))

@section('breadcrumb-links')
    @include('backend.employees.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.employees.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.employees.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.employees.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection