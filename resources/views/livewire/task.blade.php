<div class="mt-4" wire:poll>
    <div class="flex flex-row gap-4 items-center mb-6 mt-2 ">
        <flux:text class="text-base text-center"> Today's Task</flux:text>
        <flux:badge color="red">{{ count($tasks) }}</flux:badge>
    </div>
    <form wire:submit.prevent="addTask">

        <div class="mt-4 flex flex-row gap-2 items-center">
            <!-- Native input field to replace flux:input -->
            <div class="relative w-full">
                <input type="text" placeholder="Search orders"
                    class="w-full border rounded-lg px-3 py-2 text-sm text-zinc-700 dark:text-zinc-300 pr-10"
                    wire:model="task" />

                <!-- Trailing icon (same behavior as iconTrailing) -->
                <button type="button"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-zinc-700">
                    <!-- x-mark icon button -->
                    <flux:icon.x-mark />
                </button>
            </div>
            <!-- Submit button -->
            <flux:button class="sm" variant="primary" type="submit">Add Task</flux:button>
        </div>

    </form>

    @forelse ($tasks as $t)
        <div class="mt-4" x-data="{ open: false, show: false }" x-init="setTimeout(() => show = true, {{ 100 + $loop->index * 100 }})" x-show="show"
            x-transition.opacity.duration.500ms>

            <div class="collapse bg-base-100 border border-base-300 rounded-box" :class="{ 'collapse-open': open }">
                <div class="collapse-title font-semibold flex items-center flex-wrap gap-2">
                    <flux:checkbox wire:model="terms" />

                    <span>{{ $t->title }}</span>
                    <span class="text-[10px] text-gray-400">{{ $t->created_at->diffForHumans() }}</span>
                    <button @click.stop="open = !open" class="p-1 ml-auto focus:outline-none"
                        style="background: transparent;">
                        <!-- Down Arrow -->
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <!-- Up Arrow -->
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                </div>

                <div class="collapse-content text-sm" x-show="open" x-transition>

                    <div class="mb-2">
                        @if (empty($t->description && $t->due_date))
                            <form wire:submit.prevent="updateTask({{ $t->id }})">
                                <flux:textarea rows="auto" placeholder="Add a description"
                                    wire:model="description" />



                                <div class="flex flex-col space-y-1 w-full mt-2">
                                    <label for="due_date" class="text-sm text-gray-700 dark:text-gray-300">Due
                                        Date</label>

                                    <input type="date" id="due_date" name="due_date" wire:model="due_date"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" />
                                </div>
                                <div class="flex justify-center items-center h-full m-2">
                                    <flux:button type="submit" size="sm" variant="primary" color="green">
                                        Submit
                                    </flux:button>
                                </div>

                            </form>
                        @else
                            <span>{{ $t->description }}</span>
                        @endif

                        <div class="mt-2">

                            <flux:badge color="lime" icon="calendar">
                                {{ $t->due_date ? \Carbon\Carbon::parse($t->due_date)->format('d/m/Y') : 'No due date' }}
                            </flux:badge>

                            @foreach ($t->categories as $cts)
                                <flux:badge color="indigo" icon="bolt">
                                    {{ $cts->name ?? 'No category' }}
                                </flux:badge>
                            @endforeach

                        </div>
                    </div>

                    <div class="flex flex-col items-center gap-2">
                        <div x-data="{ show: false }" class="text-center">
                            <!-- Toggle Button -->
                            <flux:button size="sm" variant="primary" color="indigo" @click="show = !show">
                                {{-- <flux: size='sm' /> --}}
                                Categories
                            </flux:button>

                            <!-- Pills Panel -->
                            <div x-show="show" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-180"
                                x-transition:leave-end="opacity-0 scale-100"
                                class="mt-3 flex flex-wrap gap-2 justify-center text-center">

                                @forelse ($category as $ct)
                                    <label class="cursor-pointer">
                                        <input type="checkbox" class="hidden peer" wire:model="selectedCategories"
                                            value="{{ $ct->id }}" />
                                        <span
                                            class="badge badge-outline rounded-full 
                                                
                                                {{ $t->categories->contains($ct->id) ? 'bg-primary text-white' : 'peer-checked:bg-primary peer-checked:text-white' }}
                                                ">
                                            {{ $ct->name }}
                                        </span>
                                    </label>
                                @empty
                                    <div class="text-center text-gray-500 text-sm w-full">
                                        No categories found. Please add a new category.
                                    </div>
                                @endforelse

                                <div class="w-full mt-4 flex justify-center">
                                    <flux:button wire:click="addSelectedCategoriesToTask({{ $t->id }})"
                                        variant="primary" color="indigo" size="sm">
                                        Assign Selected Categories
                                    </flux:button>
                                </div>
                            </div>

                            <!-- end of pills panel-->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500">
            No tasks found. Please add a new task.
        </div>
    @endforelse





</div>

</div>
