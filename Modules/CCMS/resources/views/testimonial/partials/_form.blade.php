<div class="row">
    <div class="col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-12">
                        {{ html()->label('Name')->class('form-label') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->text('title')->class('form-control')->placeholder('Enter Name')->required() }}
                        {{ html()->div('Name is required')->class('invalid-feedback') }}
                    </div>

                    <div class="col-md-6">
                        {{ html()->label('Designation')->class('form-label') }}
                        {{ html()->text('designation')->class('form-control')->placeholder('Enter Designation') }}
                    </div>

                    <div class="col-md-6">
                        {{ html()->label('Company')->class('form-label') }}
                        {{ html()->text('company')->class('form-control')->placeholder('Enter Company') }}
                    </div>

                    <div class="col-12">
                        {{ html()->label('Comment')->class('form-label')->for('description') }}
                        {{ html()->span('*')->class('text-danger') }}
                        {{ html()->textarea('description')->class('form-control')->rows(10) }}
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

            <x-form-buttons :editable="$editable" label="Save" href="{{ route('team.index') }}" />
        </div>

        <div class="card featured-image-section">
            <div class="card-header">
                <h6 class="card-title mb-0 fs-14">
                    Featured
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    {{ html()->label('Image')->class('form-label')->for('image') }}
                    <x-image-input :editable="$editable" id="image" name="image" :data="$editable ? $testimonial->getRawOriginal('image') : null"
                        :multiple="false" />
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
