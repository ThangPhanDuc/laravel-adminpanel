@extends('backend.layouts.app')

@section('title', __('labels.backend.access.employees.management') . ' | ' . __('labels.backend.access.employees.edit'))

@section('breadcrumb-links')
    @include('backend.employees.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($employee, ['route' => ['admin.employees.update', $employee], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.employees.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.employees.index', 'id' => $employee->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection