<div class="row">
    <div class="col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-12">
                        {{ html()->label('Title')->class('form-label') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->text('title')->class('form-control')->placeholder('Slider Title')->required() }}
                        {{ html()->div('Menu title is required')->class('invalid-feedback') }}
                    </div>

                    <div class="col-12">
                        {{ html()->label('Description')->class('form-label')->for('description') }}
                        {{ html()->textarea('description')->class('form-control ckeditor-classic') }}
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
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
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->text('button_url')->class('form-control')->placeholder('Button Link') }}
                    </div>

                    <div class="col-lg-12">
                        {{ html()->label('Target')->class('form-label')->for('button_target') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->select('button_target', config('constants.redirect_options'))->class('form-select choices-select') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Publish</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ html()->select('status', config('constants.page_status_options'))->class('form-select choices-select ') }}
                    </div>
                </div>
                
            </div>
            <!-- end card body -->
            <x-form-buttons :editable="$editable" label="Save" href="{{ route('slider.index') }}" />
        </div>

        <div class="card featured-image-section">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">
                    Featured
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    {{ html()->label('Image(s)')->class('form-label')->for('image') }}
                    <x-image-input :editable="$editable" id="images" name="images" :data="$editable ? $slider->getRawOriginal('images') : null" :multiple="true"
                        label="Select Image(s)" />
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
