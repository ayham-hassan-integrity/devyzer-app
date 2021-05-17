@extends('backend.layouts.app')

@section('title', __('Update Secondentity'))

@section('content')
    <x-forms.patch :action="route('admin.secondentity.update', $secondentity)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Secondentity')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.secondentity.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="test" class="col-md-2 col-form-label">@lang('test')</label>

                    <div class="col-md-10">
                        <input type="text" name="test" class="form-control" placeholder="{{  __('test') }} " value="{{   $secondentity->title }}  "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="test2" class="col-md-2 col-form-label">@lang('test2')</label>

                    <div class="col-md-10">
                        <input type="text" name="test2" class="form-control" placeholder="{{  __('test2') }} " value="{{   $secondentity->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Secondentity')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection