@extends('layouts.app')
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Page</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div>
                <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary mb-4">Page List</a>
                <button type="button" class="btn btn-sm btn-primary mb-4 customize-btn">Customize Form</button>
            </div>
            {{ html()->form('POST')->route('page.store')->class('needs-validation')->attributes(['novalidate'])->open() }}
            <div class="main-check customize-section">
                <div class="row">
                    <h6 class="mb-3">Show on screen</h6>

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'slug-section')->class('form-check-input')->id('slugSectionCheck') }}
                            {{ html()->label('Slug')->class('form-check-label mb-0 text-nowrap')->for('slugSectionCheck') }}
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'page-attribute-section')->class('form-check-input')->id('pageAttributeCheck') }}
                            {{ html()->label('Page Attributes')->class('form-check-label mb-0 text-nowrap')->for('pageAttributesCheck') }}
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'template-section')->class('form-check-input')->id('templateCheck') }}
                            {{ html()->label('Template')->class('form-check-label mb-0 text-nowrap')->for('templateCheck') }}
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'meta-section')->class('form-check-input')->id('metaCheck') }}
                            {{ html()->label('Meta')->class('form-check-label mb-0 text-nowrap')->for('metaCheck') }}
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'featured-image-section')->class('form-check-input')->id('featuredImageCheck') }}
                            {{ html()->label('Featured Image')->class('form-check-label mb-0 text-nowrap')->for('featuredImageCheck') }}
                        </div>
                    </div>

                    {{-- <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-4">
                            <label class="form-check-label mb-0 text-nowrap" for="flexCheckDefault-4">
                                Custom Fields
                            </label>
                        </div>
                    </div> --}}

                    <div class="col-xl-2 col-lg-3 col-sm-4">
                        <div class="form-check mb-3">
                            {{ html()->checkbox('section[]', false, 'media-gallery-section')->class('form-check-input')->id('mediaGalleryCheck') }}
                            {{ html()->label('Media Gallery')->class('form-check-label mb-0 text-nowrap')->for('mediaGalleryCheck') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="mb-3">
                                {{ html()->label('Title')->class('form-label')->for('title') }}
                                {{ html()->span('*')->class('text-danger') }}
                                {{ html()->text('title')->class('form-control')->required() }}
                            </div>

                            {{ html()->label('Description')->class('form-label')->for('description') }}
                            {{ html()->textarea('description')->class('form-control ckeditor-classic') }}
                        </div>
                    </div>

                    <div class="filter cm-content-box box-primary slug-section">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa"> URL Generator
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        {{ html()->label('Parent')->class('form-label')->for('parent_slug') }}
                                        {{ html()->text('parent_slug')->class('form-control') }}
                                    </div>
                                    <div class="col-lg-7">
                                        {{ html()->label('Slug')->class('form-label')->for('slug') }}
                                        {{ html()->text('slug')->class('form-control') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Custom Fields
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
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



                    <div class="filter cm-content-box box-primary meata-section">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa"> Meta
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                        {{ html()->label('Meta Title')->class('form-label')->for('meta_title') }}
                                        {{ html()->text('meta_title')->class('form-control mb-3')->placeholder('Meta Title') }}
                                    </div>
                                    <div class="col-xl-12 col-sm-12">
                                        {{ html()->label('Meta Keywords')->class('form-label')->for('meta_keywords') }}
                                        {{ html()->textarea('meta_keywords')->class('form-control mb-3')->placeholder('Meta Keywords')->rows(3) }}
                                    </div>


                                    <div class="col-xl-12 col-sm-12">
                                        {{ html()->label('Meta Description')->class('form-label')->for('meta_description') }}
                                        {{ html()->textarea('meta_description')->class('form-control mb-3')->placeholder('Meta Description')->rows(3) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="right-sidebar-sticky">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Published
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body py-3">
                                    <ul class="list-style-1 block">
                                        <li>
                                            <div>
                                                <label class="form-label mb-0 me-2">
                                                    <i class="fa-solid fa-key"></i>
                                                    Status:
                                                </label>
                                                <span class="font-w500">Published</span>
                                                <a href="javascript:void(0);" class="badge badge-primary light ms-3"
                                                    id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-controls="collapseOne" aria-expanded="true" role="button">Edit</a>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                data-bs-parent="#accordion-one">
                                                <div class=" border rounded p-3 mt-3">
                                                    <div class="mb-2">
                                                        {{ html()->label('Status')->class('form-label w-100')->for('status') }}
                                                        {{ html()->select('status', config('constants.page_status_options'))->class('form-control solid default-select') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="border-bottom-0">
                                            <div>
                                                <label class="form-label mb-0 me-2">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                    Published
                                                </label>
                                                <span class="font-w500">on :
                                                    {{ $page->published_at ?? date('Y-m-d') }}</span>
                                                <a href="javascript:void(0);" class="badge badge-primary light ms-3"
                                                    id="headingthree" data-bs-toggle="collapse"
                                                    data-bs-target="#collapsethree" aria-controls="collapsethree"
                                                    aria-expanded="true" role="button">Edit</a>
                                            </div>
                                            <div id="collapsethree" class="collapse" aria-labelledby="headingthree"
                                                data-bs-parent="#accordion-one">
                                                <div class="p-3 mt-3 border rounded">
                                                    <div class="input-hasicon">
                                                        {{ html()->date('published_at', $page->published_at ?? now())->class('form-control solid') }}
                                                        <div class="icon"><i class="far fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer border-top text-end py-3 ">
                                    <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Page Type
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body">
                                    {{ html()->label('Page Type')->class('form-label')->for('page_type') }}
                                    {{ html()->select('page_type', config('constants.page_type_options'))->class('form-control default-select h-auto wide') }}
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary template-section">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Template
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body">
                                    <label class="form-label d-block">Template</label>
                                    {{ html()->select('template', getPageTemplateOptions())->class('form-select select2')->placeholder('Select') }}
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary page-attribute-section">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Page Attributes
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body">
                                    <label class="form-label d-block">Parent Page</label>

                                    <select class="form-control select2 h-auto wide" aria-label="Default select example"
                                        multiple>
                                        <option selected>(No Parent)</option>
                                        <option value="1">Privacy Policy</option>
                                        <option value="2">Contact Us</option>
                                        <option value="3">Important Information</option>
                                        <option value="4">Free shipping</option>
                                        <option value="5">Daily Gifts</option>
                                        <option value="6">Blog</option>
                                        <option value="6">About Us</option>
                                        <option value="6">Dummy Co</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary feature-image-section">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Featured Image
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body">
                                    <x-image-input :data="$editable ? setting('image') : null" id="image" name="image" :editable="$editable"
                                        :multiple=false />
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary media-galler-section">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Media Gallery
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i
                                            class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content">
                                <div class="card-body">
                                    <x-image-input :editable="$editable" id="images" name="images" :data="$editable ? setting('images') : null"
                                        :multiple="true" label="Select Images" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.customize-btn').on('click', function() {
                $('.customize-section').toggle();
            });
        });
    </script>
@endpush
