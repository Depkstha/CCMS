@props(['label' => 'Add', 'href' => '#'])

<div class="text-end mt-3">
    {{ html()->a($href = $href, $text = 'Cancel')->class('btn btn-sm btn-light') }}
    {{ html()->button($label, 'submit')->class('btn btn-sm text-white')->style('background-color: var(--vz-primary)') }}
</div>
