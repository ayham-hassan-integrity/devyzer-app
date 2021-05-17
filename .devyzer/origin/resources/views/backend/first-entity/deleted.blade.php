@extends('backend.layouts.app')

@section('title', __('Deleted Firstentitys'))

@section('breadcrumb-links')
    @include('backend.first-entity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Firstentitys')
        </x-slot>

        <x-slot name="body">
            <livewire:firstentity-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection