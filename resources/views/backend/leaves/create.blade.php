@extends('backend.layouts.app')

@section('title', __('labels.backend.access.leaves.management') . ' | ' . __('labels.backend.access.leaves.create'))

@section('breadcrumb-links')
    @include('backend.leaves.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.leaves.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.leaves.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.leaves.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection