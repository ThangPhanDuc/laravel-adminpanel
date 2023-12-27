<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.employees.management') }}
                <small class="text-muted">{{ (isset($employee)) ? __('labels.backend.access.employees.edit') : __('labels.backend.access.employees.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr> 

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('full_name', trans('validation.attributes.backend.access.employees.full_name'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.employees.full_name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            
            <div class="form-group row">
                {{ Form::label('phone_number', trans('validation.attributes.backend.access.employees.phone_number'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('phone_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.employees.phone_number'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('position', trans('validation.attributes.backend.access.employees.position'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('position', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.employees.position'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            
            <div class="form-group row">
                {{ Form::label('salary', trans('validation.attributes.backend.access.employees.salary'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('salary', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.employees.salary'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
          
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
    FTX.Utils.documentReady(function() {
        FTX.employees.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop