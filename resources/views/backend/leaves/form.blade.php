<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.leaves.management') }}
                <small
                    class="text-muted">{{ isset($leave) ? __('labels.backend.access.leaves.edit') : __('labels.backend.access.leaves.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('name', trans('validation.attributes.backend.access.leaves.user'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', auth()->user()->first_name, ['class' => 'form-control', 'placeholder' => 'Your Placeholder Text', 'readonly' => 'readonly']) }}
                </div>

                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('type', trans('validation.attributes.backend.access.leaves.type'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::select(
                        'type',
                        [
                            'sick' => 'Sick',
                            'annual' => 'Annual',
                            'other' => 'Other',
                        ],
                        'other',
                        [
                            'class' => 'form-control select2 type box-size',
                            'required' => 'required',
                        ],
                    ) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('start_date', trans('validation.attributes.backend.access.leaves.start_date'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">

                    {{ Form::date('start_date', null, ['class' => 'form-control publish_datetime box-size', 'placeholder' => trans('validation.attributes.backend.access.leaves.publish_date_time'), 'required' => 'required', 'id' => 'start_date']) }}

                </div>
                <!--col-->
            </div>
            <!--form-group-->


            <div class="form-group row">
                {{ Form::label('end_date', trans('validation.attributes.backend.access.leaves.end_date'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">

                    {{ Form::date('end_date', null, ['class' => 'form-control publish_datetime box-size', 'placeholder' => trans('validation.attributes.backend.access.leaves.publish_date_time'), 'required' => 'required', 'id' => 'end_date']) }}

                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('reason', trans('validation.attributes.backend.access.leaves.reason'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('reason', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.leaves.reason')]) }}
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
            FTX.leaves.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
        });
    </script>
@stop
