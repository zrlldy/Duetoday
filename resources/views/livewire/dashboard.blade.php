<div>

    <div class="grid gap-4 mt-5">
        <!-- Top full-width task component -->
        <div class="border p-6 rounded  border-gray-200">
            @livewire('task')
        </div>

        <!-- Bottom row with 2 columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4  ">
            <!-- Calendar -->
            <div class="border p-6 rounded  border-gray-200">
                @livewire('task')
            </div>

            <!-- Task Summary or anything else -->
            <div class="border p-6 rounded  border-gray-200">
                @livewire('task')
            </div>
        </div>
    </div>
</div>
