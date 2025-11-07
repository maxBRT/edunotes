<x-layout title="Create Note">
    <div class="flex justify-center">
        <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8 max-w-5xl w-full">
            <h1 class="text-3xl font-bold mb-6">Create Note for {{ $schoolClass->name }}</h1>

            <form action="{{ route('notes.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="school_class_id" value="{{ $schoolClass->id }}">

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-foreground">
                        Title
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
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
                        placeholder="Enter content">{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="school_class_id" value="{{ $schoolClass->id }}">
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Create Note
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script>
        const easyMDE = new EasyMDE({element: document.getElementById('content')});
    </script>
</x-layout>
