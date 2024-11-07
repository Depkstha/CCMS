<div class="hstack flex-wrap gap-3">
    <a href="{{ route('counter.index', $id) }}" class="link-success fs-15 edit-item-btn"><i class="ri-edit-2-line"></i></a>

    <a data-link="{{ route('counter.toggle', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Toggle" data-status="{{ $status == 1 ? 'Draft' : 'Published' }}"
        class="link-info fs-15 toggle-item"><i class="{{ $status == 1 ? 'ri-toggle-line' : 'ri-toggle-fill' }}"></i></a>

    <a href="javascript:void(0);" data-link="{{ route('counter.destroy', $id) }}" class="link-danger fs-15 remove-item"><i
            class="ri-delete-bin-line"></i>
    </a>
</div>