<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.products.management') }}
                <small
                    class="text-muted">{{ isset($product) ? __('labels.backend.access.products.edit') : __('labels.backend.access.products.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('name', trans('validation.attributes.backend.access.products.name'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('code', trans('validation.attributes.backend.access.products.code'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.code'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('unit_price', trans('validation.attributes.backend.access.products.unit_price'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('unit_price', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.unit_price'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('discount', trans('validation.attributes.backend.access.products.discount'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('discount', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.discount'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('final_price', trans('validation.attributes.backend.access.products.final_price'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('final_price', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.final_price'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('categories', trans('validation.attributes.backend.access.products.product_categories'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::select('category_id', $productCategories, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.access.products.product_categories'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('image', trans('validation.attributes.backend.access.products.image'), ['class' => 'col-md-2 from-control-label required']) }}

                @if (!empty($product->image))
                    <div class="col-lg-1">
                        <img src="{{ asset('storage/img/product/'.$product->image) }}" height="80" width="80" alt={{ $product->image }}>
                        
                    </div>
                    <div class="col-lg-5">
                        {{ Form::file('image', ['id' => 'image']) }}
                    </div>
                @else
                    <div class="col-lg-5">
                        {{ Form::file('image', ['id' => 'image']) }}
                    </div>
                @endif
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('description', trans('validation.attributes.backend.access.products.description'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.products.description')]) }}
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
            FTX.products.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
        });
    </script>
@stop


