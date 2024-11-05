@props(['label' => 'Add', 'href' => '#'])

<div class="card-footer border-0 text-end">
    {{ html()->a($href = $href, $text = 'Cancel')->class('btn btn-sm btn-light') }}
    {{ html()->button($label, 'submit')->class('btn btn-sm text-white')->style('background-color: var(--vz-primary)') }}
</div>
