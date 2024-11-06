<div class="hstack gap-3 flex-wrap">
    <a href="{{ route('menu.edit', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
    <a data-link="{{ route('menu.toggle', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Toggle" data-status="{{ $status == 1 ? 'Draft' : 'Published' }}"
        class="link-info fs-15 toggle-item"><i class="{{ $status == 1 ? 'ri-toggle-line' : 'ri-toggle-fill' }}"></i></a>
    <a data-link="{{ route('menu.destroy', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete" class="link-danger fs-15 remove-item"><i
            class="ri-delete-bin-line"></i></a>
</div>
