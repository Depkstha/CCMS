<div class="hstack flex-wrap gap-3">
    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Page Setting"
        class="link-success fs-15"><i class="ri-settings-4-line"></i></a>
    <a href="{{ route('page.edit', $id) }}" data-bs-toggle="tooltip" data-bs-placement="top"
    data-bs-original-title="Update Page Content" class="link-info fs-15"><i class="ri-play-list-add-line"></i></a>
    <a href="javascript:void(0);" data-link="{{ route('page.destroy', $id) }}" class="link-danger fs-15 remove-item"><i
            class="ri-delete-bin-line"></i>
    </a>
</div>
