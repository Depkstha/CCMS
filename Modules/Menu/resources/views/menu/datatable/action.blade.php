<div class="hstack gap-3 flex-wrap">
    <a href="{{ route('menu.edit', $id) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>

    <a data-link="{{ route('menu.destroy', $id) }}" data-id="{{ $id }}" class="link-danger fs-15 remove-item"><i class="ri-delete-bin-line"></i></a>
</div>
