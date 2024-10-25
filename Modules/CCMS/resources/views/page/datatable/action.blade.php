<div class="hstack flex-wrap gap-3">
    <a href="javascript:void(0)" data-link="{{ route('page.edit', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit"
        class="link-success fs-15 edit-item-btn"><i class=" ri-edit-2-line"></i></a>
    <a href="{{ route('page.updateContent', $id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Update Content"
        class="link-info fs-15"><i class="ri-file-edit-line"></i></a>
    <a href="javascript:void(0);" data-link="{{ route('page.destroy', $id) }}" class="link-danger fs-15 remove-item"
        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete"><i class="ri-delete-bin-6-line"></i>
    </a>
</div>
