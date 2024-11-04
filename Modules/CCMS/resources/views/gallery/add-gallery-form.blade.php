{{ html()->form('POST', route('gallery.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($gallery)
    {{ html()->hidden('id', $gallery->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($gallery->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Slug')->for('slug') }}
                {{ html()->text('slug')->value($gallery->slug ?? old('slug'))->class('form-control')->placeholder('Enter Gallery Slug') }}
            </div>
        </div>

        <x-form-buttons :href="route('gallery.index')" :label="isset($gallery) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
