<div class="hstack flex-wrap gap-3">
    <a href="{{ route('institution.index', $id) }}" class="link-success fs-15 edit-item-btn"><i class="ri-edit-2-line"></i></a>

    <a href="javascript:void(0);" data-link="{{ route('institution.destroy', $id) }}" class="link-danger fs-15 remove-item"><i
            class="ri-delete-bin-line"></i>
    </a>
</div>
