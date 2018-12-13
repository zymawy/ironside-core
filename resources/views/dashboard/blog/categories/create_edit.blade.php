@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? trans('ironside::dashboard.forms.edit_the')  . $item->title . trans('ironside::dashboard.forms.entry'): trans('ironside::dashboard.forms.create_banner_text_title') }}</span>
                    </h3>
                </div>
                <div class="card-body no-padding">

                    @include('ironside::dashboard.partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="name">
                                            {{ trans('ironside::dashboard.forms.category')  }}
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="{{ trans('ironside::dashboard.forms.category_placeholder_text')  }}" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                        {!! form_error_message('name', $errors) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        @include('ironside::dashboard.partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection