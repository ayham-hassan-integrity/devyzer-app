@extends('backend.layouts.app')

@section('title', __('View Firstentity'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Firstentity')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.firstentity.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('name')</th>
                    <td>{{   $firstentity->name }}</td>
                </tr>
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $firstentity->id }}</td>
                </tr>
                <tr>
                    <th>@lang('mobile')</th>
                    <td>{{   $firstentity->mobile }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Firstentity Created'):</strong> @displayDate($firstentity->created_at) ({{   $firstentity->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($firstentity->updated_at) ({{   $firstentity->updated_at->diffForHumans() }})

                @if($firstentity->trashed())
                    <strong>@lang('Firstentity Deleted'):</strong> @displayDate($firstentity->deleted_at) ({{   $firstentity->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection