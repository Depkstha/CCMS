{{ html()->form('POST', route('faq.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($faq)
    {{ html()->hidden('id', $faq->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Title')->for('title') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('title')->value($faq->title ?? old('title'))->class('form-control')->placeholder('Enter Title')->required() }}
                {{ html()->div('Please enter a title.')->class('invalid-feedback') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Content')->for('description') }}
                {{ html()->textarea('description')->value($faq->description ?? old('description'))->class('form-control')->placeholder('Enter Content')->rows(5) }}
            </div>

            <div class="mb-3">
                {{ html()->label('Category')->class('form-label')->for('category_id') }}
                {{ html()->select('category_id', $categoryOptions)->class('form-select choices-select')->placeholder('Select') }}
            </div>
        </div>

        <x-form-buttons :href="route('faq.index')" :label="isset($faq) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
