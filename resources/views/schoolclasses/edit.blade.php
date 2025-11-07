<x-layout title="Edit Class">
    <div class="flex justify-center">
        <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8 max-w-2xl w-full">
            <h1 class="text-3xl font-bold mb-6">Edit Class</h1>

            <form action="{{ route('schoolclasses.update', $schoolClass->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-foreground">
                        Class Name
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $schoolClass->name) }}" required
                        class="w-full px-4 py-3 bg-input border border-border rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="Enter class name">
                    @error('name')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="teacher_name" class="block text-sm font-medium text-foreground">
                        Teacher Name
                    </label>
                    <input type="text" id="teacher_name" name="teacher_name"
                        value="{{ old('teacher_name', $schoolClass->teacher_name) }}" required
                        class="w-full px-4 py-3 bg-input border border-border rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="Enter teacher name">
                    @error('teacher_name')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="teacher_email" class="block text-sm font-medium text-foreground">
                        Teacher Email
                    </label>
                    <input type="email" id="teacher_email" name="teacher_email"
                        value="{{ old('teacher_email', $schoolClass->teacher_email) }}" required
                        class="w-full px-4 py-3 bg-input border border-border rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="teacher@example.com">
                    @error('teacher_email')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="class_website" class="block text-sm font-medium text-foreground">
                        Class Website
                    </label>
                    <input type="url" id="class_website" name="class_website"
                        value="{{ old('class_website', $schoolClass->class_website) }}" required
                        class="w-full px-4 py-3 bg-input border border-border rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring transition-shadow"
                        placeholder="https://example.com">
                    @error('class_website')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Update Class
                    </button>
                    <a href="{{ route('schoolclasses.show', $schoolClass->id) }}"
                        class="flex-1 px-6 py-3 bg-secondary text-secondary-foreground rounded-lg font-medium text-center hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
