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


            <div class="mb-3">
                {{ html()->label('Category')->class('form-label')->for('category_id') }}
                {{ html()->select('category_id', $categoryOptions)->class('form-select')->placeholder('Select') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Image(s) or Video')->for('images') }}
                <x-image-input :editable="$editable" id="images" name="images" :data="$editable ? $gallery->getRawOriginal('images') : null" :multiple="true"
                    label="Select Images" />
            </div>

            <div class="mb-3">
                {{ html()->label('Video Link')->for('slug') }}
                {{ html()->text('link')->value($gallery->link ?? old('link'))->class('form-control')->placeholder('Enter Youtube video link') }}
                <div class="d-flex flex-wrap mt-1" id="video-preview">
                </div>
            </div>

        </div>

        <x-form-buttons :href="route('gallery.index')" :label="isset($gallery) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}


@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            const route = "{{ config('app.url') }}/files";

            $(document).on('change input paste cut', '#link', function() {
                const url = $(this).val();
                console.log(url);

                if (url) {
                    if (url.includes("https://www.youtube.com/watch")) {
                        const videoId = url.split("v=")[1]?.split("&")[0]; // Get the video ID
                        $('#video-preview').html(`
                <iframe width="100%" height="150" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
            `);
                    } else {
                        $('#video-preview').html(`
                <iframe src="${url}" width="100%" height="150" frameborder="0"></iframe>
            `);
                    }
                } else {
                    $('#video-preview').html('');
                }
            });


            const isEditable = '{{ $editable }}';

            if (isEditable == '1') {
                $('#link').trigger('change');
            }
        });
    </script>
@endpush
