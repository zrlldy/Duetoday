<flux:navlist.item href="{{ $href }}" icon="{{ $icon }}" @class(['mb-2', 'current' => $active])
    aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</flux:navlist.item>
