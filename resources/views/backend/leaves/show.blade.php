@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.leaves.management'))

@section('breadcrumb-links')
    @include('backend.leaves.includes.breadcrumb-links')
@endsection

@section('content')


    <div class="modal-body" id="modal-body">
        <div class="text-center">
            <div class="row text-center" style="margin: 20px">
                <h3 class="modal-title"><strong>LEAVE APPLICATION </strong></h3>
            </div>
        </div>

        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item">My name is: <strong>{{ $leave->user->first_name }}</strong></li>
                <li class="list-group-item">Position: <strong>{{ $leave->user->position->name }}</strong>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Department: <strong>{{ $leave->user->jobTitle->name }}</strong></li>
                <li class="list-group-item">I am applying for leave from:
                    <strong>{{ $leave->start_date->format('d/m/Y') }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To:
                    <strong>{{ $leave->end_date->format('d/m/Y') }}</strong>
                </li>
                <li class="list-group-item">Total leave days: <strong>1</strong></li>
                <li class="list-group-item">Expected return date: <strong>{{ $leave->end_date->format('d/m/Y') }}</strong>
                </li>
                <li class="list-group-item">Reason: <strong>{{ $leave->reason }}</strong></li>
                <li class="list-group-item">I hereby commit: <strong>Commit to return to work on time as prescribed</strong>
                </li>
                <li class="list-group-item">Kindly review and settle, Board of Directors.</li>
                <li class="list-group-item">I sincerely thank you!</li>
                <li class="list-group-item"><i>Application created on:
                        <strong>{{ $leave->created_at->format('d/m/Y') }}</strong></i></li>
            </ul>
            <div class="text-right">
                <span>Hanoi, {{ $leave->created_at->format('F j, Y') }}</span>
            </div>

        </div>

        <div class="row text-center">
            <div class="text-center col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4><strong>Department Head</strong></h4>
                @if ($leave->manager_confirmation)
                    <p>(Confirmed)</p>
                @else
                    <p>(Not confirmed yet)</p>
                @endif
            </div>

            <div class="text-center col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4><strong>HR Manager</strong></h4>
                @if ($leave->hr_confirmation)
                    <p>(Confirmed)</p>
                @else
                    <p>(Not confirmed yet)</p>
                @endif
            </div>
        </div>
    </div>


    <div class="row mt-4 float-right">
        <div class="col d-flex">
            @if ($isHRManager)
                @if ($leave->manager_confirmation)
                    <button class="btn btn-info m-2" disabled>HR has confirmed</button>
                @else
                    <form action="{{ route('admin.leaves.process', ['leave' => $leave, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success m-2">Approve</button>
                    </form>

                    <form action="{{ route('admin.leaves.process', ['leave' => $leave, 'action' => 'reject']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger m-2">Reject</button>
                    </form>
                @endif
            @elseif($isDepartmentHead)
                @if ($leave->manager_confirmation)
                    <button class="btn btn-info m-2" disabled>Department Head has confirmed</button>
                @else
                    <form action="{{ route('admin.leaves.process', ['leave' => $leave, 'action' => 'approve']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success m-2">Approve as Department Head</button>
                    </form>

                    <form action="{{ route('admin.leaves.process', ['leave' => $leave, 'action' => 'reject']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger m-2">Reject as Department Head</button>
                    </form>
                @endif
            @endif
        </div>
    </div>



@endsection
