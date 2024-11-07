@props(['data'])
@php
    $loopCount = max(1, count($data));
@endphp
<div class="card custom-field-section">
    <div class="card-header">
        <h6 class="card-title mb-0 fs-14">
            Custom Fields
        </h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 clone-container">
                @for ($i = 0; $i < $loopCount; $i++)
                    <div class="row clone-section mt-2">
                        <div class="col-lg-2">
                            @if ($i == 0) 
                                {{ html()->label('Icon')->class('form-label')->for('icon[]') }}
                            @endif
                            {{ html()->text('icon[]')->value($data[$i]['icon'] ?? old('icon[]'))->class('form-control')->placeholder('Icon class') }}
                        </div>

                        <div class="col-lg-4">
                            @if ($i == 0) 
                                {{ html()->label('Title')->class('form-label')->for('key[]') }}
                            @endif
                            {{ html()->text('key[]')->value($data[$i]['key'] ?? old('key[]'))->class('form-control')->placeholder('Enter Title') }}
                        </div>

                        <div class="col-lg-4">
                            @if ($i == 0) 
                                {{ html()->label('Content')->class('form-label')->for('value[]') }}
                            @endif
                            {{ html()->textarea('value[]')->value($data[$i]['value'] ?? old('value[]'))->class('form-control')->placeholder('Enter Content')->rows(1) }}
                        </div>

                        <div class="col-lg-2">
                            @if ($i == 0) 
                                <label class="form-label">Action</label>
                            @endif
                            <div class="d-flex gap-2">
                                <a href="javascript:void(0)" class="btn btn-secondary btn-sm fs-6 clone">
                                    <i class="ri-add-line align-middle"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm fs-6 declone">
                                    <i class="ri-subtract-line align-middle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
