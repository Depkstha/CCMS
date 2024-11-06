<div class="row">
    <div class="col-xl-8">
        <div class="card h-auto">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-12">
                        {{ html()->label('Title')->class('form-label')->for('title') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->text('title')->class('form-control')->placeholder('Enter Branch Title')->required(true) }}
                    </div>

                    <div class="col-12">
                        {{ html()->label('Description (Short)')->class('form-label')->for('short_description') }}
                        {{ html()->textarea('short_description')->class('form-control')->placeholder('Enter Branch Description (Short)')->rows(5) }}
                    </div>

                    <div class="col-12">
                        {{ html()->label('Description')->class('form-label')->for('description') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->textarea('description')->class('form-control ckeditor-classic')->placeholder('Enter Branch Description')->required() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card meta-section">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">Meta</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-sm-12">
                        {{ html()->label('Meta Title')->class('form-label')->for('meta_title') }}
                        {{ html()->text('meta_title')->class('form-control mb-3')->placeholder('Meta Title') }}
                    </div>
                    <div class="col-xl-12 col-sm-12">
                        {{ html()->label('Meta Keywords')->class('form-label')->for('meta_keywords') }}
                        {{ html()->textarea('meta_keywords')->class('form-control mb-3')->placeholder('Meta Keywords') }}
                    </div>


                    <div class="col-xl-12 col-sm-12">
                        {{ html()->label('Meta Description')->class('form-label')->for('meta_description') }}
                        {{ html()->textarea('meta_description')->class('form-control mb-3')->placeholder('Meta Description')->rows(3) }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">
                    Published
                </h6>
            </div>
            <div class="card-body">
                {{ html()->label('Status')->class('form-label visually-hidden')->for('status') }}
                {{ html()->select('status', config('constants.page_status_options'))->class('form-select choices-select') }}
            </div>

            <x-form-buttons :href="route('branch.index')" :label="isset($branch) ? 'Update' : 'Create'" />

        </div>

        <div class="card featured-image-section">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">
                    Featured Image
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    {{ html()->label('Featured')->class('form-label')->for('image') }}
                    <x-image-input :data="$editable ? $branch->getRawOriginal('image') : null" id="image" name="image" :editable="$editable"
                        :multiple=false />
                </div>

                {{ html()->label('Banner')->class('form-label')->for('banner') }}
                <x-image-input :data="$editable ? $branch->getRawOriginal('banner') : null" id="banner" name="banner" :editable="$editable"
                    :multiple=false />
            </div>
        </div>

        <div class="card media-gallery-section">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">
                    Media Gallery
                </h6>
            </div>
            <div class="card-body">
                <x-image-input :editable="$editable" id="images" name="images" :data="$editable ? $branch->getRawOriginal('images') : null" :multiple="true"
                    label="Select Images" />
            </div>
        </div>

        <div class="card sidebar-section">
            <div class="card-header d-flex jusitfy-content-between align-items-center">
                <h6 class="card-title mb-0 fs-14">Sidebar</h6>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-lg-12">
                        {{ html()->label('Title')->class('form-label')->for('sidebar_title') }}
                        {{ html()->text('sidebar_title')->class('form-control') }}
                    </div>
                    <div class="col-lg-12">
                        {{ html()->label('Content')->class('form-label')->for('sidebar_content') }}
                        {{ html()->textarea('sidebar_content')->class('form-control')->placeholder('Short Content (optional)')->rows(3) }}
                    </div>

                    <div class="col-lg-12">
                        {{ html()->label('Image')->class('form-label')->for('sidebar_content') }}
                        <x-image-input :data="$editable ? $branch->getRawOriginal('sidebar_image') : null" id="sidebar_image" name="sidebar_image" :editable="$editable"
                            :multiple=false />
                    </div>
                </div>
            </div>
        </div>

        <div class="card button-section">
            <div class="card-header d-flex jusitfy-content-between align-items-center">
                <h6 class="card-title mb-0 fs-14">Button</h6>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-lg-12">
                        {{ html()->label('Text')->class('form-label')->for('button_text') }}
                        {{ html()->text('button_text')->class('form-control') }}
                    </div>
                    <div class="col-lg-12">
                        {{ html()->label('Link')->class('form-label')->for('button_text') }}
                        {{ html()->text('button_text')->class('form-control')->placeholder('Button Link') }}
                    </div>

                    <div class="col-lg-12">
                        {{ html()->label('Target')->class('form-label')->for('redirect') }}
                        {{ html()->select('redirect', config('constants.redirect_options'))->class('form-select choices-select') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
