{{ html()->form('POST', route('institution.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($institution)
    {{ html()->hidden('id', $institution->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($institution->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('URL')->for('url') }}
                {{ html()->text('url')->value($institution->url ?? old('url'))->class('form-control')->placeholder('Enter URL') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Image')->class('form-label')->for('image') }}
                <x-image-input :editable="$editable" id="image" name="image" :data="$editable ? $institution->getRawOriginal('image') : null" :multiple="false" />
            </div>

        </div>

        <x-form-buttons :href="route('institution.index')" :label="isset($institution) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
