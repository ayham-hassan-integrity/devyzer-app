@extends('backend.layouts.app')

@section('title', __(' Firstentities'))

@section('breadcrumb-links')
    @include('backend.first-entity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Firstentities')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.firstentity.create')"
                :text="__('Create Firstentity')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:firstentity-table/>
        </x-slot>
    </x-backend.card>
@endsection