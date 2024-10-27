<div class="row">
    <div class="col-lg-9">

        <div class="card">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-8">
                        {{ html()->label('Title')->class('form-label') }}
                        {{ html()->text('title')->class('form-control')->placeholder('Display Title')->required(true) }}
                        {{ html()->div('Menu title is required')->class('invalid-feedback') }}
                    </div>

                    <div class="col-md-4">
                        {{ html()->label('Icon (Optional)')->class('form-label') }}
                        {{ html()->text('icon_class')->class('form-control')->placeholder('Icon class') }}
                    </div>


                    <div class="col-md-4">
                        {{ html()->label('Location')->class('form-label') }}
                        {{ html()->select('menu_location_id', config('constants.menu_location_options'))->class('form-select')->required(true) }}
                    </div>

                    <div class="col-md-4">
                        {{ html()->label('Type')->class('form-label') }}
                        {{ html()->select('type', $menuTypes)->id('menuType')->class('form-select')->required(true) }}
                    </div>

                    <div class="col-md-4">
                        {{ html()->label('Sub menu of (Empty if Parent Menu)')->class('form-label') }}
                        {{ html()->select('parent_id', $menuOptions)->class('form-select')->placeholder('Select Parent') }}
                    </div>

                    <div class="col-md-4 dropdown-row" style="display: none">
                        {{ html()->label('Ref (select Reference)')->class('form-label') }}
                        {{ html()->select('parameter', [])->id('parameterDropdown')->class('form-select')->placeholder('Select option') }}
                        {{ html()->div('Reference is required')->class('invalid-feedback') }}
                    </div>

                    <div class="col-md-4 text-row">
                        {{ html()->label('# or Start from /')->class('form-label') }}
                        {{ html()->text('parameter')->id('parameterInput')->class('form-control')->required(true) }}
                        {{ html()->div('Link is required')->class('invalid-feedback') }}
                    </div>

                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Publish</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ html()->select('status', config('constants.page_status_options'))->class('form-select') }}
                    </div>
                </div>
                <x-form-buttons :editable="$editable" label="Save" href="{{ route('menu.index') }}" />

            </div>
            <!-- end card body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Target</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ html()->select('target', config('constants.redirect_options'))->class('form-select') }}
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- end col -->
</div>

@push('js')
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '#menuType', function() {

                const value = $(this).val();

                if (value == 'single-link') {

                    $('.dropdown-row').hide();

                    $('#parameterDropdown').prop({
                        required: false,
                    });

                    $('.text-row').show();
                    $('#parameterInput').prop({
                        required: true,
                        disabled: false
                    });

                } else {

                    $('.dropdown-row').show();
                    $('#parameterDropdown').prop({
                        required: true,
                    });

                    $('.text-row').hide();
                    $('#parameterInput').prop({
                        required: false,
                        disabled: true
                    });

                    $.ajax({
                            url: '{{ route('menu.getMenuTypeOptions') }}',
                            type: 'GET',
                            data: {
                                tableName: value,
                            },
                            dataType: 'json',
                        })
                        .done(function(response) {
                            $('#parameterDropdown').empty();

                            $('#parameterDropdown').append($('<option>', {
                                value: null,
                                text: 'Select option',
                                selected: true,
                                disabled: true
                            }));

                            console.log(response.data);

                            $.each(response.data, function(value, text) {
                                console.log(text);
                                $('#parameterDropdown').append($('<option>', {
                                    value: value,
                                    text: text
                                }));
                            });
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX request failed: ", textStatus, errorThrown);
                        });
                }
            });
        });
    </script>
@endpush
