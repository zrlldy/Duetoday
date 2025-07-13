<div>
    <h2 class="text-xl font-semibold mb-4">
        Tasks in category: {{ $category->name }}
    </h2>

    <ul class="list-disc pl-5">
        @forelse($tasks as $task)
            <li>{{ $task->title }}</li>
        @empty
            <li>No tasks found in this category.</li>
        @endforelse
    </ul>
</div>
