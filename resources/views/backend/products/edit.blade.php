@extends('backend.layouts.app')

@section('title', __('labels.backend.access.products.management') . ' | ' . __('labels.backend.access.products.edit'))

@section('breadcrumb-links')
    @include('backend.products.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($product, ['route' => ['admin.products.update', $product], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.products.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.products.index', 'id' => $product->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection