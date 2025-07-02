<div>


    <form action="" wire:submit.prevent="addCategory">

        {{-- Display any validation errors --}}
        <input type="text" wire:model="newCategory" placeholder="Add new category" class="border p-2 rounded">
        <button class="p-2 rounded-sm border-amber-300 bg-red-400"> add </button>
    </form>
</div>
