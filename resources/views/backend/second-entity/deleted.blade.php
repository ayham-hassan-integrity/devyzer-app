@extends('backend.layouts.app')

@section('title', __('Deleted Secondentitys'))

@section('breadcrumb-links')
    @include('backend.second-entity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Secondentitys')
        </x-slot>

        <x-slot name="body">
            <livewire:secondentity-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection