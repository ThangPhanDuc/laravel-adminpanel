<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.tickets.management') }}
                <small
                    class="text-muted">{{ isset($ticket) ? __('labels.backend.access.tickets.edit') : __('labels.backend.access.tickets.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('content', trans('validation.attributes.backend.access.tickets.content'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('content', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.tickets.content'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('type', trans('validation.attributes.backend.access.tickets.type'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::select(
                        'type',
                        [
                            'bug' => 'Bug Report',
                            'enhancement' => 'Enhancement',
                            'default' => 'Default',
                        ],
                        'default',
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
                {{ Form::label('ticket_flag_id', trans('validation.attributes.backend.access.tickets.flag'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::select('ticket_flag_id', $ticketFlags, null, ['class' => 'form-control select2 status box-size', 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            
            <div class="form-group row">
                {{ Form::label('expected', trans('validation.attributes.backend.access.tickets.expected'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('expected', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.tickets.expected')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('link', trans('validation.attributes.backend.access.tickets.link'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('link', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.tickets.link')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('image_path', trans('validation.attributes.backend.access.tickets.image_path'), ['class' => 'col-md-2 from-control-label required']) }}

                @if (!empty($ticket->image_path))
                    <div class="col-lg-1">
                        <img src="{{ asset('storage/img/ticket/' . $ticket->image_path) }}" height="80"
                            width="80" alt={{ $ticket->image_path }}>
                    </div>
                    <div class="col-lg-5">
                        {{ Form::file('image_path', ['id' => 'image_path']) }}
                    </div>
                @else
                    <div class="col-lg-5">
                        {{ Form::file('image_path', ['id' => 'image_path']) }}
                    </div>
                @endif
            </div>
            <!--form-group-->

        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->



@section('pagescript')
    <script >
        FTX.Tickets = {

            edit: {
                selectors: {
                    tags: jQuery(".tags"),
                    categories: jQuery(".categories"),
                    status: jQuery(".status"),
                    publish_datetime: jQuery("#publish_datetime"),
                },

                init: function(locale) {
                    this.addHandlers(locale);
                    FTX.tinyMCE.init(locale);
                },

                addHandlers: function(locale) {

                    this.selectors.tags.select2({
                        tags: true,
                        width: '100%',
                    });

                    this.selectors.categories.select2({
                        width: '100%',
                        tags: true,
                        placeholder: 'Select category'
                    });

                    this.selectors.status.select2({
                        width: '100%'
                    });

                    this.selectors.publish_datetime.datetimepicker({
                        locale: (locale === undefined ? 'en_US' : locale),
                    });
                },
            },
        }

        FTX.Utils.documentReady(function() {
            FTX.Tickets.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
        });
    </script>
@stop