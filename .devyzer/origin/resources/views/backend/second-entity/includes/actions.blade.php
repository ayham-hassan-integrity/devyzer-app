@if (
    $secondentity->trashed()
)
    <x-utils.form-button
        :action="route('admin.secondentity.restore', $secondentity)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.secondentity.permanently-delete', $secondentity)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.secondentity.show', $secondentity)"/>
    <x-utils.edit-button :href="route('admin.secondentity.edit', $secondentity)"/>
    <x-utils.delete-button :href="route('admin.secondentity.destroy', $secondentity)"/>
@endif