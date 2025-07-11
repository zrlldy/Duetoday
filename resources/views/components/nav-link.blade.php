<flux:navlist.item href="{{ $href }}" icon="{{ $icon }}" @class(['mb-2', 'current' => $active])
    aria-current="{{ $active ? 'page' : 'false' }}"  livewire:navigate>
    {{ $slot }}
</flux:navlist.item>
