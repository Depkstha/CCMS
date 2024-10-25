{{ html()->modelForm($page ?? null, 'POST', route('page.store'))->class('needs-validation')->attributes(['novalidate', 'enctype' => 'multipart/form-data'])->open() }}
@if (isset($page))
    {{ html()->hidden('id', $page->id) }}
@endif
<div class="row g-3">
    <div class="col-lg-12">
        <div>
            {{ html()->label('Title')->class('form-label')->for('title') }}
            {{ html()->span('*')->class('text-danger') }}
            {{ html()->text('title')->class('form-control')->placeholder('Enter Page Title')->required() }}
        </div>
    </div>

    <div class="col-lg-12">
        <div>
            {{ html()->label('Type')->class('form-label')->for('type') }}
            {{ html()->span('*')->class('text-danger') }}
            {{ html()->select('type', config('constants.page_type_options'))->class('form-select')->required() }}
        </div>
    </div>

    <div class="col-lg-12">
        {{ html()->label('Page Content Options')->class('form-label') }}
        <div class="event-details border rounded p-4">
            <div class="row gy-3">
                @foreach (config('constants.page_section_options') as $value => $label)
                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            {{ html()->checkbox('section[]', in_array($value, $page->section ?? []), $value)->class('form-check-input')->id("{$value}Check") }}
                            {{ html()->label($label)->class('form-check-label mb-0 text-nowrap')->for("{$value}Check") }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">{{ isset($page) ? 'Update' : 'Create' }}</button>
        </div>
    </div>
</div>
{{ html()->closeModelForm() }}
