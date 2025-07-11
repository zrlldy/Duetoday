<div>
    @if ($message)
        <div x-data="{ show: true }" x-init="$watch('show', value => {
            if (!value) {
                setTimeout(() => $wire.set('message', null), 2000);
            }
        });
        
        $watch('$wire.message', () => {
            show = true; // Reset visibility when message updates
            setTimeout(() => show = false, 3000);
        });
        
        // Initial fade timer
        setTimeout(() => show = false, 3000);" x-show="show"
            x-transition:leave="transition-opacity duration-2000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-4 right-4 px-4 py-2 rounded shadow z-50 text-white
                {{ $type === 'success' ? 'bg-green-500' : 'bg-red-500' }}"
            x-cloak>
            {{ $message }}
        </div>
    @endif
</div>
