@extends('backend.layouts.app')

@section('title', __(' Secondentities'))

@section('breadcrumb-links')
    @include('backend.second-entity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Secondentities')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.secondentity.create')"
                :text="__('Create Secondentity')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:secondentity-table/>
        </x-slot>
    </x-backend.card>
@endsection