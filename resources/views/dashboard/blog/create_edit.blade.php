@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? trans('ironside::dashboard.forms.edit_the') . $item->title . trans('ironside::dashboard.forms.create_user_text_article'): trans('ironside::dashboard.forms.create_user_text_article') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('ironside::dashboard.partials.info')

					<form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('title', $errors) }}">
                                        <label for="id-title">
                                            {{ trans('ironside::dashboard.forms.title') }}
                                        </label>
                                        <input type="text" class="form-control input-generate-slug" id="id-title" name="title"
                                               placeholder="{{ trans('ironside::dashboard.forms.title_placeholder') }}" value="{{ ($errors && $errors->any()? old('title') : (isset($item)? $item->title : '')) }}">
                                        {!! form_error_message('title', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('category_id', $errors) }}">
                                        <label for="category">
                                            {{ trans('ironside::dashboard.forms.category') }}
                                        </label>
                                        {!! form_select('category_id', ([0 => trans('ironside::dashboard.forms.category_placeholder')] + $categories), ($errors && $errors->any()? old('category_id') : (isset($item)? $item->category_id : '')), ['class' => 'select2 form-control']) !!}
                                        {!! form_error_message('category_id', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('summary', $errors) }}">
                                <label for="summary">
                                    {{ trans('ironside::dashboard.forms.category_summary') }}
                                </label>
                                <input type="text" class="form-control" id="summary" name="summary"
                                       placeholder="{{ trans('ironside::dashboard.forms.category_summary_placeholder') }}"
                                       value="{{ ($errors && $errors->any()? old('summary') : (isset($item)? $item->summary : '')) }}">
                                {!! form_error_message('summary', $errors) !!}
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group {{ form_error_class('active_from', $errors) }}">
                                        <label for="active_from">
                                            {{ trans('ironside::dashboard.forms.action_from') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="active_from" data-date-format="YYYY-MM-DD HH:mm:ss" name="active_from"
                                                   placeholder="{{ trans('ironside::dashboard.forms.action_from_placeholder') }}"
                                                   value="{{ ($errors && $errors->any()? old('active_from') : (isset($item)? $item->active_from : '')) }}">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('active_from', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group {{ form_error_class('active_to', $errors) }}">
                                        <label for="active_to">
                                            {{ trans('ironside::dashboard.forms.action_to') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="active_to"
                                                   data-date-format="YYYY-MM-DD HH:mm:ss" name="active_to"
                                                   placeholder="{{ trans('ironside::dashboard.forms.action_to_placeholder') }}"
                                                   value="{{ ($errors && $errors->any()? old('active_to') : (isset($item)? $item->active_to : '')) }}">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('active_to', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('content', $errors) }}">
                                <label for="article-content">
                                    {{ trans('ironside::dashboard.forms.content') }}
                                </label>
                                <textarea
                                        class="form-control summernote" id="article-content"
                                        name="content" rows="18">{{ ($errors && $errors->any()? old('content') : (isset($item)? $item->content : '')) }}</textarea>
                                {!! form_error_message('content', $errors) !!}
                            </div>
                        </fieldset>

						@include('ironside::dashboard.partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            setDateTimePickerRange('#active_from', '#active_to');

            initSummerNote('.summernote');
            $('#form-edit').on('submit', function ()
            {
                $('#article-content').html($('.summernote').val());
                return true;
            });
        })
    </script>
@endsection