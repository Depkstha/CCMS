<div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="addPageModalLabel">Add Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            {{ html()->form('POST', route('page.store'))->class('needs-validation')->attributes(['novalidate', 'enctype' => 'multipart/form-data'])->open() }}
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-lg-12">
                        <div>
                            {{ html()->label('Title')->class('form-label')->for('title') }}
                            {{ html()->span('*')->class('text-danger') }}
                            {{ html()->text('title')->class('form-control')->placeholder('Enter Page Title')->required() }}
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            {{ html()->label('Type')->class('form-label')->for('type') }}
                            {{ html()->span('*')->class('text-danger') }}
                            {{ html()->select('type', config('constants.page_type_options'))->class('form-select')->required() }}
                        </div>
                    </div>

                    <div class="col-lg-12">
                        {{ html()->label('Page Content Options')->class('form-label') }}
                        <div class="event-details border rounded p-4">
                            <div class="row gy-3">
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'page-attribute-section')->class('form-check-input')->id('pageAttributeCheck') }}
                                        {{ html()->label('Page Attributes')->class('form-check-label mb-0 text-nowrap')->for('pageAttributesCheck') }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'meta-section')->class('form-check-input')->id('metaCheck') }}
                                        {{ html()->label('Meta')->class('form-check-label mb-0 text-nowrap')->for('metaCheck') }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'featured-image-section')->class('form-check-input')->id('featuredImageCheck') }}
                                        {{ html()->label('Featured Image')->class('form-check-label mb-0 text-nowrap')->for('featuredImageCheck') }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'media-gallery-section')->class('form-check-input')->id('mediaGalleryCheck') }}
                                        {{ html()->label('Media Gallery')->class('form-check-label mb-0 text-nowrap')->for('mediaGalleryCheck') }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'sidebar-section')->class('form-check-input')->id('sidebarCheck') }}
                                        {{ html()->label('Sidebar')->class('form-check-label mb-0 text-nowrap')->for('sidebarCheck') }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'button-section')->class('form-check-input')->id('buttonCheck') }}
                                        {{ html()->label('Button')->class('form-check-label mb-0 text-nowrap')->for('buttonCheck') }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-inline">
                                        {{ html()->checkbox('section[]', false, 'custom-field-section')->class('form-check-input')->id('customFieldCheck') }}
                                        {{ html()->label('Custom Fields')->class('form-check-label mb-0 text-nowrap')->for('customFieldCheck') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Create</button>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
