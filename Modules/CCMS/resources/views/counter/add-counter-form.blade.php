{{ html()->form('POST', route('counter.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($counter)
    {{ html()->hidden('id', $counter->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($counter->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Counter Value')->for('counter') }}
                {{ html()->text('counter')->value($counter->counter ?? old('counter'))->class('form-control')->placeholder('Enter Counter value') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Icon')->for('icon') }}
                {{ html()->text('icon')->value($counter->icon ?? old('icon'))->class('form-control')->placeholder('Enter Icon class') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Image')->class('form-label')->for('image') }}
                <x-image-input :editable="$editable" id="image" name="image" :data="$editable ? $counter->getRawOriginal('image') : null" :multiple="false" />
            </div>

        </div>

        <x-form-buttons :href="route('counter.index')" :label="isset($counter) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
