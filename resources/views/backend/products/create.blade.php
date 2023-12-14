@extends('backend.layouts.app')

@section('title', __('labels.backend.access.products.management') . ' | ' . __('labels.backend.access.products.create'))

@section('breadcrumb-links')
    @include('backend.products.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.products.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.products.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.products.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection
 