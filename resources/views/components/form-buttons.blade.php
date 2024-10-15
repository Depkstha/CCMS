@props(['editable' => false, 'label' => 'Add', 'href' => '#'])

<div class="text-end mt-3">
    {{ html()->a($href = $href, $text = 'Cancel')->class('btn btn-light') }}

    {{ html()->button($editable ? 'Update' : $label, 'submit')->class('btn btn-success') }}
</div>
    