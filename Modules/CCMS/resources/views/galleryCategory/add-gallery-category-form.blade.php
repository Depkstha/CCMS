{{ html()->form('POST', route('galleryCategory.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($category)
    {{ html()->hidden('id', $galleryCategory->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($galleryCategory->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Slug')->for('slug') }}
                {{ html()->text('slug')->value($galleryCategory->slug ?? old('slug'))->class('form-control')->placeholder('Enter Category Slug') }}
            </div>
        </div>

        <x-form-buttons :href="route('galleryCategory.index')" :label="isset($galleryCategory) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
