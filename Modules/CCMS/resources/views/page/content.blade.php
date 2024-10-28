@php
    $page->section ??= [];
@endphp
@extends('layouts.app')
@section('content')
    <x-dashboard.breadcumb :title="$title" />
    <div class="container-fluid">
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div>
                    <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary mb-4">Page List</a>
                    <a href="javascript:void(0);" data-link="{{ route('page.edit', $page->id) }}" type="button"
                        class="btn btn-sm btn-primary mb-4 customize-btn edit-item-btn">Customize Page</a>
                </div>

                {{ html()->modelForm($page, 'PUT')->route('page.updateContent', $page->id)->class('needs-validation')->attributes(['novalidate'])->open() }}
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        {{ html()->label('Title')->class('form-label')->for('title') }}
                                        {{ html()->span('*')->class('text-danger') }}
                                        {{ html()->text('title')->class('form-control bg-light')->isReadonly(true) }}
                                    </div>

                                    <div class="col-12">
                                        {{ html()->label('Description')->class('form-label')->for('description') }}
                                        {{ html()->textarea('description')->class('form-control ckeditor-classic') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($page->type == 'page')
                            <div class="card slug-section">
                                <div class="card-header d-flex jusitfy-content-between align-items-center">
                                    <h6 class="card-title mb-0 fs-14">URL Generator</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            {{ html()->label('Parent(Optional)')->class('form-label')->for('parent_slug') }}
                                            {{ html()->text('parent_slug')->class('form-control') }}
                                        </div>
                                        <div class="col-lg-6">
                                            {{ html()->label('Slug')->class('form-label')->for('slug') }}
                                            {{ html()->span('*')->class('text-danger') }}
                                            {{ html()->text('slug')->class('form-control')->placeholder('Page Slug')->required() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">
                                Custom Fields
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i
                                        class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body">
                            <div class="card-body">
                                <h6 class="mb-4 font-w500">Add New Custom Field:</h6>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" placeholder="Title">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <label class="form-label">Value</label>
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm mt-3 mt-sm-0">Add Custom
                                    Field</button>
                                <p class="mt-3 mb-0">Custom fields can be used to extra metadata to a post
                                    that you can use in your theme.</p>
                            </div>
                        </div>
                        </div> --}}

                        @if (in_array('meta-section', $page->section))
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
                        @endif
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
                                {{ html()->select('status', config('constants.page_status_options'))->class('form-select')->required() }}
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                            </div>
                        </div>

                        @if ($page->type == 'page')
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0 fs-14">
                                        Template
                                    </h6>
                                </div>
                                <div class="card-body">
                                    {{ html()->label('Template')->class('form-label visually-hidden')->for('template') }}
                                    {{ html()->select('template', getPageTemplateOptions())->class('form-select')->placeholder('Select')->required() }}
                                </div>
                            </div>
                        @endif

                        @if (in_array('page-attribute-section', $page->section))
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0 fs-14">
                                        Page Attributes
                                    </h6>
                                </div>
                                <div class="card-body">
                                    {{ html()->label('Parent Page')->class('form-label')->for('parent_page') }}
                                    {{ html()->span('*')->class('text-danger') }}
                                    {{ html()->select('parent_page', $pageOptions ?? [])->class('form-select')->placeholder('Select')->required() }}
                                </div>
                            </div>
                        @endif

                        @if (in_array('featured-image-section', $page->section))
                            <div class="card featured-image-section">
                                <div class="card-header">
                                    <h6 class="card-title mb-0 fs-14">
                                        Featured Image
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        {{ html()->label('Featured')->class('form-label')->for('image') }}
                                        <x-image-input :data="$editable ? $page->getRawOriginal('image') : null" id="image" name="image" :editable="$editable"
                                            :multiple=false />
                                    </div>

                                    {{ html()->label('Banner')->class('form-label')->for('banner') }}
                                    <x-image-input :data="$editable ? $page->getRawOriginal('banner') : null" id="banner" name="banner" :editable="$editable"
                                        :multiple=false />
                                </div>
                            </div>
                        @endif

                        @if (in_array('media-gallery-section', $page->section))
                            <div class="card media-gallery-section">
                                <div class="card-header">
                                    <h6 class="card-title mb-0 fs-14">
                                        Media Gallery
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <x-image-input :editable="$editable" id="images" name="images" :data="$editable ? $page->getRawOriginal('images') : null"
                                        :multiple="true" label="Select Images" />
                                </div>
                            </div>
                        @endif

                        @if (in_array('sidebar-section', $page->section))
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
                                            {{ html()->text('sidebar_content')->class('form-control')->placeholder('Short Content (optional)') }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Image')->class('form-label')->for('sidebar_content') }}
                                            <x-image-input :data="$editable ? $page->getRawOriginal('sidebar_image') : null" id="sidebar_image" name="sidebar_image"
                                                :editable="$editable" :multiple=false />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (in_array('button-section', $page->section))
                            <div class="card button-section">
                                <div class="card-header d-flex jusitfy-content-between align-items-center">
                                    <h6 class="card-title mb-0 fs-14">Button</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <div class="col-lg-12">
                                            {{ html()->label('Text')->class('form-label')->for('button_text') }}
                                            {{ html()->span('*')->class('text-danger') }}
                                            {{ html()->text('button_text')->class('form-control')->required() }}
                                        </div>
                                        <div class="col-lg-12">
                                            {{ html()->label('Link')->class('form-label')->for('button_text') }}
                                            {{ html()->span('*')->class('text-danger') }}
                                            {{ html()->text('button_text')->class('form-control')->placeholder('Button Link')->required() }}
                                        </div>

                                        <div class="col-lg-12">
                                            {{ html()->label('Target')->class('form-label')->for('redirect') }}
                                            {{ html()->span('*')->class('text-danger') }}
                                            {{ html()->select('redirect', config('constants.redirect_options'))->class('form-select')->required() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>

    @include('ccms::page.modal.edit')
@endsection
