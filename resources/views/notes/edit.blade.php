<x-layout :title="'Edit Note - ' . $note->title">
    <div class="flex justify-center">
        <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8 max-w-5xl w-full">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Edit Note</h1>
                <a href="{{ route('notes.show', $note->id) }}"
                    class="px-4 py-2 bg-secondary text-secondary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                    Cancel
                </a>
            </div>

            <form action="{{ route('notes.update', $note->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-foreground">
                        Title
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $note->title) }}" required
                        class="w-full px-4 py-3 bg-input border border-border rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="Enter title">
                    @error('title')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-foreground">
                        Content
                    </label>
                    <textarea id="content" name="content" rows="10"
                        class="w-full px-4 py-3 bg-input border border-border text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="Enter content">{{ old('content', $note->content) }}</textarea>
                    @error('content')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Update Note
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const easyMDE = new EasyMDE({element: document.getElementById('content')});
    </script>
</x-layout>
