@extends('layouts.app')

@section('content')
    <x-dashboard.breadcumb title="Setting" />
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Website Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#general-tab" role="tab"
                                    aria-selected="false">
                                    General Content
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#assets-tab" role="tab"
                                    aria-selected="false">
                                    Assets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#address-tab" role="tab"
                                    aria-selected="false">
                                    Address
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#social-tab" role="tab"
                                    aria-selected="false">
                                    Social Links
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#seo-tab" role="tab"
                                    aria-selected="true">
                                    SEO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#banner-tab" role="tab"
                                    aria-selected="true">
                                    Default Banner
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#other-tab" role="tab"
                                    aria-selected="true">
                                    Recaptcha
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#other-tab" role="tab"
                                    aria-selected="true">
                                    Other
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        {{ html()->form('POST', route('setting.store'))->open() }}
                        <div class="tab-content  text-muted">
                            <div class="tab-pane active" id="general-tab" role="tabpanel">
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

                                    <x-form-buttons :editable="$editable" label="Update" href="{{ route('setting.index') }}" />
                                </div>
                            </div>
                            <div class="tab-pane" id="assets-tab" role="tabpanel">
                                <div class="row gy-3">
                                    <div class="col-lg-4">
                                        {{ html()->label('Logo')->class('form-label')->for('logo') }}
                                        <x-image-input :data="$editable ? setting('logo') : null" id="logo" name="logo" :editable="$editable"
                                            :multiple=false />
                                    </div>

                                    <div class="col-lg-4">
                                        {{ html()->label('Logo - White')->class('form-label')->for('logo_white') }}
                                        <x-image-input :data="$editable ? setting('logo_white') : null" id="logo_white" name="logo_white" :editable="$editable"
                                            :multiple=false />
                                    </div>

                                    <div class="col-lg-4">
                                        {{ html()->label('Fav Icon')->class('form-label')->for('favicon') }}
                                        <x-image-input :data="$editable ? setting('favicon') : null" id="favicon" name="favicon" :editable="$editable"
                                            :mulitple=false />
                                    </div>

                                    <x-form-buttons :editable="$editable" label="Update" href="{{ route('setting.index') }}" />
                                </div>
                            </div>
                            <div class="tab-pane" id="address-tab" role="tabpanel">
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

                                    <x-form-buttons :editable="$editable" label="Update" href="{{ route('setting.index') }}" />
                                </div>
                            </div>
                            <div class="tab-pane" id="seo-tab" role="tabpanel">
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

                            <div class="tab-pane" id="banner-tab" role="tabpanel">
                                <div class="row gy-3">
                                    <div class="col-lg-4">
                                        {{ html()->label('Banner')->class('form-label')->for('banner') }}
                                        <x-image-input :data="$editable ? setting('banner') : null" id="banner" name="banner" :editable="$editable"
                                            :multiple=false />
                                    </div>

                                    <x-form-buttons :editable="$editable" label="Update"
                                        href="{{ route('setting.index') }}" />
                                </div>
                            </div>

                            <div class="tab-pane" id="recaptcha-tab" role="tabpanel">
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

                            <div class="tab-pane" id="social-tab" role="tabpanel">
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

                            <div class="tab-pane" id="other-tab" role="tabpanel">
                                <div class="row d-flex flex-column gy-3">
                                    <div class="col-lg-4">
                                        {{ html()->label('President')->class('form-label')->for('president') }}
                                        {{ html()->text('president')->class('form-control')->value(setting('president'))->placeholder('Enter President Name') }}
                                    </div>

                                    <div class="col-lg-4">
                                        {{ html()->label('Preloader')->class('form-label')->for('preloader_check') }}
                                        {{ html()->select('preloader_check', ['1' => 'Enable', '0' => 'Disable'])->class('form-select')->value(setting('color')) }}
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
                        {{ html()->form()->close() }}
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
        </div>
    </div>
@endsection
