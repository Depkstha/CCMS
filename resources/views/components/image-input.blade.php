@props([
    'id' => 'lfm-image',
    'name' => 'logo',
    'label' => 'Select Image',
    'multiple' => 'true',
    'data' => null,
    'editable' => false,
])

<div class="upload__box">
    <div class="{{ $id }}-upload__img-wrap row">
    </div>

    <input id="{{ $id }}" type="text" name="{{ $name }}" value="{{ $data }}"
        class="form-control" readonly />

    <div class="input-group mt-3">
        <span class="input-group-btn">
            <a href="javascript:void(0)" id="{{ $id }}-input" data-input="{{ $id }}"
                class="link-primary link-opacity-75-hover link-offset-2">
                <i class="fa-regular fa-images me-1"></i> {{ $label }}
            </a>
        </span>
    </div>

</div>


@push('js')
    <script>
        $(document).ready(function() {

            let imgArray = [];
            let eventListener = "{{ $id }}";
            let isMultiple = "{{ $multiple }}";
            let isEditable = "{{ $editable }}";
            let data = "{{ $data }}";

            const prefix = `${app_url}/laravel-filemanager`;
            $(`#${eventListener}-input`).filemanager('file', {
                prefix: prefix
            });

            $(document).on('change', `#${eventListener}`, function() {
                const value = $(this).val();

                imgArray = (isMultiple == true) ? value.split(',') : [value.split(',').pop()];
                let imageUrl = imgArray.join(',');
                $(`#${eventListener}`).val(imageUrl);
                $(`.${eventListener}-upload__img-wrap`).empty();

                $.each(imgArray, function(index, item) {
                    let html = `<div class='upload__img-box col-sm-auto'>
                                    <div style='background-image: url("${app_url}/${item}")' class='img-bg'>
                                        <div id="${eventListener}-img-close" data-file="${item}" class='upload__img-close'></div>
                                    </div>
                                </div>`;
                    $(`.${eventListener}-upload__img-wrap`).append(html);
                })
            });

            $(document).on('click', `#${eventListener}-img-close`, function(e) {
                const file = $(this).data("file");

                for (let i = 0; i < imgArray.length; i++) {
                    if (imgArray[i] == file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                let imageUrl = imgArray.join(',');
                $(`#${eventListener}`).val(imageUrl);
                $(this).parent().parent().remove();
            });

            if (isEditable && data) {
                $(`#${eventListener}`).trigger('change');
            }

        });
    </script>
@endpush
