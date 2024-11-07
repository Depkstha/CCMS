<div class="hstack flex-wrap gap-3">
    <a href="{{ route('branch.edit', $id) }}" data-bs-toggle="tooltip"
        data-bs-placement="bottom" data-bs-title="Edit" class="link-success fs-15 edit-item-btn"><i
            class=" ri-edit-2-line"></i></a>

            <a data-link="{{ route('branch.toggle', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Toggle" data-status="{{ $status == 1 ? 'Draft' : 'Published' }}"
            class="link-info fs-15 toggle-item"><i class="{{ $status == 1 ? 'ri-toggle-line' : 'ri-toggle-fill' }}"></i></a>

    <a href="javascript:void(0);" data-link="{{ route('branch.destroy', $id) }}" class="link-danger fs-15 remove-item"
        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete"><i class="ri-delete-bin-6-line"></i>
    </a>
</div>
