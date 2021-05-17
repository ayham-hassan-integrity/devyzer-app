@if (
    $firstentity->trashed()
)
    <x-utils.form-button
        :action="route('admin.firstentity.restore', $firstentity)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.firstentity.permanently-delete', $firstentity)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.firstentity.show', $firstentity)"/>
    <x-utils.edit-button :href="route('admin.firstentity.edit', $firstentity)"/>
    <x-utils.delete-button :href="route('admin.firstentity.destroy', $firstentity)"/>
@endif