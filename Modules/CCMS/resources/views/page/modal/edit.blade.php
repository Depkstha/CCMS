<div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="editPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="editPageModalLabel">Edit Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).on('click', '.edit-item-btn', function() {
            const url = $(this).attr('data-link');
            const myModal = new bootstrap.Modal(document.getElementById("editPageModal"));
            $("#editPageModal .modal-body").html(
                '<div class="text-center my-5"><i class="spinner-border text-primary" role="status"></i></div>'
            );
            myModal.show();
            $.get(url, function(res, status) {
                $("#editPageModal .modal-body").html(res);
            });
        });
    </script>
@endpush
