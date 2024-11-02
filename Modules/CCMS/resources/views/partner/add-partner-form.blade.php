{{ html()->form('POST', route('partner.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($partner)
    {{ html()->hidden('id', $partner->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($partner->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('URL')->for('url') }}
                {{ html()->text('url')->value($partner->url ?? old('url'))->class('form-control')->placeholder('Enter URL') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Image')->class('form-label')->for('image') }}
                <x-image-input :editable="$editable" id="image" name="image" :data="$editable ? $partner->getRawOriginal('image') : null" :multiple="false" />
            </div>

        </div>

        <x-form-buttons :href="route('partner.index')" :label="isset($partner) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
