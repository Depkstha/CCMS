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
                        {{ html()->label('Degree')->class('form-label') }}
                        {{ html()->text('degree')->class('form-control')->placeholder('Enter Degree') }}
                    </div>

                    <div class="col-12">
                        {{ html()->label('Description')->class('form-label')->for('description') }}
                        {{ html()->textarea('description')->class('form-control ckeditor-classic') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Other Information</h5>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-lg-6">
                        {{ html()->label('Branch')->class('form-label')->for('branch_id') }}
                        {{ html()->select('branch_id',[])->class('form-select')->placeholder('Select') }}
                    </div>
    
                    <div class="col-lg-6">
                        {{ html()->label('Address')->class('form-label')->for('address') }}
                        {{ html()->text('address')->class('form-control')->placeholder('Enter Address') }}
                    </div>
    
                    <div class="col-lg-6">
                        {{ html()->label('Email')->class('form-label')->for('email') }}
                        {{ html()->text('email')->class('form-control')->placeholder('Enter Email') }}
                    </div>
    
                    <div class="col-lg-6">
                        {{ html()->label('Mobile')->class('form-label')->for('mobile') }}
                        {{ html()->text('mobile')->class('form-control')->placeholder('Enter Mobile') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Social Link</h5>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-lg-4">
                        {{ html()->label('Facebook')->class('form-label')->for('facebook') }}
                        {{ html()->text('facebook')->class('form-control')->value(setting('facebook'))->placeholder('Enter Facebook Link') }}
                    </div>
    
                    <div class="col-lg-4">
                        {{ html()->label('Youtube')->class('form-label')->for('youtube') }}
                        {{ html()->text('youtube')->class('form-control')->value(setting('youtube'))->placeholder('Enter Youtube Link') }}
                    </div>
    
                    <div class="col-lg-4">
                        {{ html()->label('Twitter')->class('form-label')->for('twitter') }}
                        {{ html()->text('twitter')->class('form-control')->value(setting('twitter'))->placeholder('Enter Twitter Link') }}
                    </div>
    
                    <div class="col-lg-4">
                        {{ html()->label('Linkedin')->class('form-label')->for('linkedin') }}
                        {{ html()->text('linkedin')->class('form-control')->value(setting('linkedin'))->placeholder('Enter Linkedin Link') }}
                    </div>
    
                    <div class="col-lg-4">
                        {{ html()->label('Whatsapp')->class('form-label')->for('whatsapp') }}
                        {{ html()->text('whatsapp')->class('form-control')->value(setting('whatsapp'))->placeholder('Enter Whatsapp Link') }}
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
                        {{ html()->select('status', config('constants.page_status_options'))->class('form-select select2') }}
                    </div>
                </div>
                <x-form-buttons :editable="$editable" label="Save" href="{{ route('team.index') }}" />

            </div>
            <!-- end card body -->
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
                    <x-image-input :editable="$editable" id="image" name="image" :data="$editable ? $team->getRawOriginal('image') : null"
                        :multiple="false" />
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
