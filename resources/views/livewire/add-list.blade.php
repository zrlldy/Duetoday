<div>
    @forelse ($categories as $list)
        <div class="flex flex-row item-center gap-2 mt-2" class="flex flex-row items-center gap-2 mt-2"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ 100 + $loop->index * 100 }})" x-show="show" x-transition.opacity.duration.500ms>
            <flux:badge size="sm" color="lime">4</flux:badge>
            <flux:navlist.item href="#">{{ $list->name }}</flux:navlist.item>
            <flux:button as="submit" size="sm" variant="primary" size="sm" color="red"
                wire:click="deleteCategory({{ $list->id }})">
                <flux:icon.trash variant="micro" />
            </flux:button>
        </div>
    @empty

        <div class="text-center text-gray-500 text-sm ">
            No List found. Please add a new List.
        </div>
    @endforelse

    {{-- <div class="mt-4">
        <form action="" wire:submit.prevent="addCategory">
            <div class="flex flex-row item-center gap-2">
                <flux:input placeholder="Search orders" wire:model="newCategory">
                    <x-slot name="iconTrailing">
                        <flux:button size="sm" variant="subtle" icon="x-mark" class="-mr-1" />
                    </x-slot>
                </flux:input>
                <flux:button type="submit" variant="primary" color="green">
                    <flux:icon.plus />
                </flux:button>
            </div>
        </form>
    </div> --}}


    <div class="mt-4">
        <form wire:submit.prevent="addCategory">
            <div class="flex flex-row items-center gap-2">
                <!-- Replaced flux:input with native input -->
                <input type="text" wire:model="newCategory" placeholder="Add New List"
                    class="w-full border rounded-lg px-3 py-2 text-sm text-zinc-700 dark:text-zinc-300" />

                <flux:button type="submit" size="sm" variant="primary" color="green">
                    <flux:icon.plus variant="micro" />
                </flux:button>
            </div>
        </form>
    </div>
</div>
