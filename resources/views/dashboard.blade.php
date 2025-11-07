<x-layout title="Dashboard">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <a href="{{ route('schoolclasses.create') }}"
            class="px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
            Create New Class
        </a>
    </div>

    <div class="flex justify-center gap-4 flex-wrap">
        @foreach($schoolclasses as $schoolclass)

        <div
            class="bg-card text-card-foreground border border-border rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 max-w-md w-full">
            <a href="{{ route('schoolclasses.show', $schoolclass->id) }}"
                class="text-primary hover:underline text-xl font-semibold block mb-2">
                {{ $schoolclass->name }}
            </a>


            <div class="space-y-1 text-sm text-muted-foreground">
                <p><span class="font-medium text-foreground">Teacher:</span> {{ $schoolclass->teacher_name }}</p>
                <p><span class="font-medium text-foreground">Email:</span> {{ $schoolclass->teacher_email }}</p>
                <p class="wrap-break-words max-w-full">
                    <span class="font-medium text-foreground">Website:</span>
                    <a href="{{ $schoolclass->class_website }}" target="_blank"
                        class="text-primary hover:underline break-all block">
                        {{ $schoolclass->class_website }}
                    </a>
                </p>
            </div>
        </div>

        @endforeach
    </div>
</x-layout>
