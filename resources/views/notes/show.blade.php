<x-layout :title="$note->title">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">{{ $note->title }}</h1>
            <div class="flex gap-2">
                <a href="{{ route('schoolclasses.show', $note->school_class_id) }}"
                    class="px-6 py-3 bg-secondary text-secondary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                    Back to Class
                </a>
                @if(Route::has('notes.edit'))
                <a href="{{ route('notes.edit', $note->id) }}"
                    class="px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                    Edit Note
                </a>
                @endif
                <livewire:emitter signal="openDeleteModal" message="Delete Note"
                    classes="px-4 py-3 bg-destructive text-destructive-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity" />
                <livewire:delete-note-modal noteTitle="{{ $note->title }}" noteId="{{ $note->id }}" />
            </div>
        </div>

        <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8">
            <div class="prose prose-lg max-w-none dark:prose-invert
                    prose-headings:font-bold prose-headings:text-foreground
                    prose-h1:text-4xl prose-h2:text-3xl prose-h3:text-2xl
                    prose-p:text-foreground prose-p:leading-relaxed
                    prose-a:text-primary prose-a:underline prose-a:decoration-primary/50 prose-a:underline-offset-4 hover:prose-a:decoration-primary
                    prose-strong:text-foreground prose-strong:font-semibold
                    prose-code:bg-muted prose-code:text-accent-foreground prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-[''] prose-code:after:content-['']
                    prose-pre:bg-muted prose-pre:border prose-pre:border-border
                    prose-blockquote:border-l-primary prose-blockquote:bg-muted/50 prose-blockquote:italic
                    prose-ul:list-disc prose-ol:list-decimal
                    prose-li:text-foreground prose-li:marker:text-muted-foreground
                    prose-hr:border-border
                    prose-table:border prose-table:border-border
                    prose-th:bg-muted prose-th:font-semibold
                    prose-td:border prose-td:border-border
                    prose-img:rounded-lg prose-img:shadow-md">
                {!! $note->content_html !!}
            </div>

            <div class="mt-6 pt-6 border-t border-border text-sm text-muted-foreground">
                <div class="flex justify-between items-center">
                    <span>Created {{ $note->created_at->diffForHumans() }}</span>
                    @if($note->updated_at->ne($note->created_at))
                    <span>Last updated {{ $note->updated_at->diffForHumans() }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
