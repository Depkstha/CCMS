@extends('layouts.app')

@section('content')
    <x-dashboard.breadcumb title="Setting" />
    <div class="row">

        <div class="col-12">
            <h5 class="mb-3">Custom Tabs Bordered</h5>
            <div class="card">
                <div class="card-body">
                    <p class="text-muted">Use <code>nav-tabs-custom</code> class to create custom tabs with borders.</p>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                Settings
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold
                                    out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack
                                    portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR.
                                    <div class="mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-soft-primary material-shadow-none">Read More <i
                                                class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile1" role="tabpanel">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    When, while the lovely valley teems with vapour around me, and the meridian sun strikes
                                    the upper surface of the impenetrable foliage of my trees, and but a few stray gleams
                                    steal into the inner sanctuary, I throw myself down among the tall grass by the
                                    trickling stream; and, as I lie close to the earth, a thousand unknown.
                                    <div class="mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-soft-primary material-shadow-none">Read More <i
                                                class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony.
                                    <div class="mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-soft-primary material-shadow-none">Read More <i
                                                class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings1" role="tabpanel">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and
                                    absorb its power, like the form of a beloved mistress, then I often think with longing,
                                    Oh, would I could describe these conceptions, could impress upon paper all that is
                                    living so full and warm within me, that it might be the.
                                    <div class="mt-2">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-soft-primary material-shadow-none">Read More <i
                                                class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Website Information</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link fs-16 active" data-bs-toggle="tab" href="#general-tab">General
                                    Content</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#logo-tab">Logo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  fs-16" data-bs-toggle="tab" href="#address-tab">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#seo-tab">Seo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#social-tab">Social Media</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#banner-tab">Default Banner</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#recaptcha-tab">Recaptcha</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link fs-16" data-bs-toggle="tab" href="#other-tab">Other</a>
                            </li>
                        </ul>
                        {{ html()->form('POST', route('setting.store'))->open() }}
                        <div class="tab-content">
                            <div class="tab-pane fade" id="logo-tab" role="tabpanel">
                                <div class="pt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-4">
                                            {{ html()->label('Logo')->class('form-label')->for('logo') }}
                                            <x-image-input :data="$editable ? setting('logo') : null" id="logo" name="logo"
                                                :editable="$editable" :multiple=false />
                                        </div>

                                        <div class="col-lg-4">
                                            {{ html()->label('Logo - White')->class('form-label')->for('logo_white') }}
                                            <x-image-input :data="$editable ? setting('logo_white') : null" id="logo_white" name="logo_white"
                                                :editable="$editable" :multiple=false />
                                        </div>

                                        <div class="col-lg-4">
                                            {{ html()->label('Fav Icon')->class('form-label')->for('favicon') }}
                                            <x-image-input :data="$editable ? setting('favicon') : null" id="favicon" name="favicon"
                                                :editable="$editable" :mulitple=false />
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="banner-tab" role="tabpanel">
                                <div class="pt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-4">
                                            {{ html()->label('Banner')->class('form-label')->for('banner') }}
                                            <x-image-input :data="$editable ? setting('banner') : null" id="banner" name="banner"
                                                :editable="$editable" :multiple=false />
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="general-tab">
                                <div class="pt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-12">
                                            {{ html()->label('Title')->class('form-label')->for('title') }}
                                            {{ html()->text('title')->class('form-control')->value(setting('title'))->placeholder('Enter Title') }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Footer - About Us')->class('form-label')->for('description') }}
                                            {{ html()->textarea('description')->class('form-control')->value(setting('description'))->placeholder('Enter Description')->rows(5) }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Footer - Copyright')->class('form-label')->for('copyright') }}
                                            {{ html()->text('copyright')->class('form-control')->value(setting('copyright'))->placeholder('Enter Copyright Text') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Phone')->class('form-label')->for('phone') }}
                                            {{ html()->text('phone')->class('form-control')->value(setting('phone'))->placeholder('Enter Phone') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Mobile')->class('form-label')->for('mobile') }}
                                            {{ html()->text('mobile')->class('form-control')->value(setting('mobile'))->placeholder('Enter Mobile') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Email')->class('form-label')->for('email') }}
                                            {{ html()->email('email')->class('form-control')->value(setting('email'))->placeholder('Enter Email') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Office - Working Days')->class('form-label')->for('working_days') }}
                                            {{ html()->text('working_days')->class('form-control')->value(setting('working_days'))->placeholder('Enter Working Days') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Office - Working Hours')->class('form-label')->for('working_hours') }}
                                            {{ html()->text('working_hours')->class('form-control')->value(setting('working_hours'))->placeholder('Enter Working Hours') }}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="address-tab">
                                <div class="pt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-3">
                                            {{ html()->label('Website URL')->class('form-label')->for('website_url') }}
                                            {{ html()->text('website_url')->class('form-control')->value(setting('website_url'))->placeholder('Enter Website URL') }}
                                        </div>

                                        <div class="col-lg-3">
                                            {{ html()->label('Zip Code')->class('form-label')->for('zipcode') }}
                                            {{ html()->text('zipcode')->class('form-control')->value(setting('zipcode'))->placeholder('Enter Zip Code') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Location')->class('form-label')->for('location') }}
                                            {{ html()->text('location')->class('form-control')->value(setting('location'))->placeholder('Enter Office Location') }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Google Map Iframe')->class('form-label')->for('map') }}
                                            {!! html()->textarea('map')->class('form-control')->value(setting('map'))->placeholder('Enter Google Map Iframe')->rows(5) !!}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seo-tab">
                                <div class="pt-4">
                                    <div class="row gy-3">
                                        <div class="col-lg-12">
                                            {{ html()->label('Meta Title')->class('form-label')->for('meta_title') }}
                                            {{ html()->text('meta_title')->class('form-control')->value(setting('meta_title'))->placeholder('Enter Meta Title') }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Meta Keywords')->class('form-label')->for('meta_keywords') }}
                                            {{ html()->textarea('meta_keywords')->class('form-control')->value(setting('meta_keywords'))->placeholder('Enter Meta Keywords')->rows(3) }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Meta Description')->class('form-label')->for('meta_description') }}
                                            {{ html()->textarea('meta_description')->class('form-control')->value(setting('meta_description'))->placeholder('Enter Meta Description')->rows(5) }}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="recaptcha-tab">
                                <div class="pt-4">
                                    <div class="row d-flex flex-column gy-3">
                                        <div class="col-lg-6">
                                            {{ html()->label('Recaptcha Site Key')->class('form-label')->for('recaptcha_site_key') }}
                                            {{ html()->text('recaptcha_site_key')->class('form-control')->value(setting('recaptcha_site_key'))->placeholder('Enter Recaptcha Site Key') }}
                                        </div>

                                        <div class="col-lg-6">
                                            {{ html()->label('Recaptcha Secret Key')->class('form-label')->for('recaptcha_secret_key') }}
                                            {{ html()->text('recaptcha_secret_key')->class('form-control')->value(setting('recaptcha_secret_key'))->placeholder('Enter Recaptcha Secret Key') }}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="social-tab">
                                <div class="pt-4">
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
                                            {{ html()->label('Instagram')->class('form-label')->for('instagram') }}
                                            {{ html()->text('instagram')->class('form-control')->value(setting('instagram'))->placeholder('Enter Instagram Link') }}
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

                                        <div class="col-lg-4">
                                            {{ html()->label('Tiktok')->class('form-label')->for('tiktok') }}
                                            {{ html()->text('tiktok')->class('form-control')->value(setting('tiktok'))->placeholder('Enter Tiktok Link') }}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="other-tab">
                                <div class="pt-4">
                                    <div class="row d-flex flex-column gy-3">
                                        <div class="col-lg-4">
                                            {{ html()->label('President')->class('form-label')->for('president') }}
                                            {{ html()->text('president')->class('form-control')->value(setting('president'))->placeholder('Enter President Name') }}
                                        </div>

                                        <div class="col-lg-4">
                                            {{ html()->label('Preloader')->class('form-label')->for('preloader_check') }}
                                            {{ html()->select('preloader_check', ['1' => 'Enable', '0' => 'Disable'])->class('default-select form-control wide')->value(setting('color')) }}
                                        </div>

                                        <div class="col-lg-4">
                                            {{ html()->label('Theme')->class('form-label')->for('color') }}
                                            {{ html()->input($type = 'color', $name = 'color')->class('form-control')->value(setting('color')) }}
                                        </div>

                                        <x-form-buttons :editable="$editable" label="Update"
                                            href="{{ route('setting.index') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
