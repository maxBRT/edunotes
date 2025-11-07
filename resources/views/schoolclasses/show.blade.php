<x-layout :title="$schoolClass->name">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">{{ $schoolClass->name }}</h1>
        <a href="{{ route('dashboard') }}"
            class="px-6 py-3 bg-secondary text-secondary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
            Back to Dashboard
        </a>
    </div>

    <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-6 mb-6">
        <div class="space-y-1 text-sm text-muted-foreground">
            <p><span class="font-medium text-foreground">Teacher:</span> {{ $schoolClass->teacher_name }}</p>
            <p><span class="font-medium text-foreground">Email:</span> {{ $schoolClass->teacher_email }}</p>
            <p class="wrap-break-words max-w-full">
                <span class="font-medium text-foreground">Website:</span>
                <a href="{{ $schoolClass->class_website }}" target="_blank"
                    class="text-primary hover:underline break-all">
                    {{ $schoolClass->class_website }}
                </a>
            </p>
        </div>
        <div class="flex w-full justify-end items-end gap-2">
            <a href="{{ route('schoolclasses.edit', $schoolClass->id) }}"
                class="px-3 py-2 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                Edit Class
            </a>
            <livewire:emitter signal="openDeleteModal" message="Delete Class"
                classes="px-3 py-2 bg-destructive text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity" />
            <livewire:delete-class-modal className="{{ $schoolClass->name }}" classId="{{ $schoolClass->id }}" />
        </div>
    </div>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Class Notes</h2>
        <a href="{{ route('notes.create', ['school_class_id' => $schoolClass->id]) }}"
            class="px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
            Create New Note
        </a>
    </div>


    @if($notes->isEmpty())
    <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-12 text-center">
        <p class="text-muted-foreground text-lg">No notes yet for this class.</p>
        <p class="text-muted-foreground text-sm mt-2">Create your first note to get started!</p>
    </div>
    @else
    <div class="flex justify-center gap-4 flex-wrap">
        @foreach($notes as $note)
        <div
            class="bg-card text-card-foreground border border-border rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 max-w-md w-full">
            <h3 class="text-xl font-semibold mb-3 text-foreground">{{ $note->title }}</h3>

            <div class="prose prose-sm max-w-none line-clamp-4
                        prose-headings:text-muted-foreground prose-p:text-muted-foreground
                        prose-a:text-muted-foreground prose-a:no-underline
                        prose-strong:text-muted-foreground prose-strong:font-medium
                        prose-code:text-muted-foreground prose-em:text-muted-foreground
                        prose-li:text-muted-foreground">
                {!! $note->content_html !!}
            </div>

            <div
                class="mt-4 pt-4 border-t border-border flex justify-between items-center text-xs text-muted-foreground">
                <span>Created {{ $note->created_at->diffForHumans() }}</span>
                <a href="{{ route('notes.show', $note->id) }}" class="text-primary hover:underline">View</a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-layout>
