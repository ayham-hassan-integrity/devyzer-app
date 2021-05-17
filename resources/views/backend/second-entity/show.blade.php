@extends('backend.layouts.app')

@section('title', __('View Secondentity'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Secondentity')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.secondentity.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $secondentity->id }}</td>
                </tr>
                <tr>
                    <th>@lang('test')</th>
                    <td>{{   $secondentity->test }}</td>
                </tr>
                <tr>
                    <th>@lang('test2')</th>
                    <td>{{   $secondentity->test2 }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Secondentity Created'):</strong> @displayDate($secondentity->created_at) ({{   $secondentity->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($secondentity->updated_at) ({{   $secondentity->updated_at->diffForHumans() }})

                @if($secondentity->trashed())
                    <strong>@lang('Secondentity Deleted'):</strong> @displayDate($secondentity->deleted_at) ({{   $secondentity->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection