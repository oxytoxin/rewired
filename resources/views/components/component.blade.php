@props([
'wire_id' => $this->id(),
'props' => $this->props ?? [],
'component' => '',
'rootId' => 'rewired'
])
<div wire:ignore id="{{ $rootId }}" data-component="{{ $component }}"
     data-props="{{json_encode(['wire_id' => $wire_id, ...$props])}}"></div>
