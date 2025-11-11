<x-layout :title="$schoolClass->name">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="relative mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors">
                        <x-icons.arrow-left class="w-5 h-5 group-hover:-translate-x-1 transition-transform" />
                        <span class="font-medium">Back to Dashboard</span>
                    </a>
                </div>
            </div>

            <div class="mt-6">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <x-icons.book class="w-8 h-8 text-white" />
                    </div>
                    <div class="flex-1">
                        <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-2">
                            {{ $schoolClass->name }}
                        </h1>
                        <p class="text-lg text-muted-foreground">Manage your class notes and materials</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Info & Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Teacher Info Card -->
            <div class="bg-card border border-border rounded-2xl p-6 shadow-md hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                        <x-icons.user class="w-5 h-5 text-primary" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-muted-foreground mb-1">Teacher</p>
                        <p class="text-sm font-semibold text-foreground truncate">{{ $schoolClass->teacher_name }}</p>
                    </div>
                </div>
            </div>

            <!-- Email Card -->
            <div class="bg-card border border-border rounded-2xl p-6 shadow-md hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center">
                        <x-icons.mail class="w-5 h-5 text-accent" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-muted-foreground mb-1">Email</p>
                        <p class="text-sm font-semibold text-foreground truncate">{{ $schoolClass->teacher_email }}</p>
                    </div>
                </div>
            </div>

            <!-- Website Card -->
            @if($schoolClass->class_website)
            <div class="bg-card border border-border rounded-2xl p-6 shadow-md hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                        <x-icons.globe class="w-5 h-5 text-primary" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-muted-foreground mb-1">Website</p>
                        <a href="{{ $schoolClass->class_website }}" target="_blank" class="text-sm font-semibold text-primary hover:underline truncate block">
                            {{ parse_url($schoolClass->class_website, PHP_URL_HOST) ?? $schoolClass->class_website }}
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Notes Count Card -->
            <div class="bg-gradient-to-br from-primary/10 to-accent/10 border border-primary/20 rounded-2xl p-6 shadow-md hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center">
                        <x-icons.document class="w-5 h-5 text-primary" />
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-muted-foreground mb-1">Total Notes</p>
                        <p class="text-2xl font-bold text-primary">{{ $notes->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 mb-8">
            <a href="{{ route('schoolclasses.edit', $schoolClass->id) }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-primary text-primary-foreground rounded-xl font-semibold shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300">
                <x-icons.pencil class="w-5 h-5" />
                <span>Edit Class</span>
            </a>
            <livewire:emitter signal="openDeleteModal" message="Delete Class"
                classes="group inline-flex items-center gap-2 px-6 py-3 bg-destructive text-destructive-foreground rounded-xl font-semibold shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300" />
            <livewire:delete-class-modal className="{{ $schoolClass->name }}" classId="{{ $schoolClass->id }}" />
        </div>

        <!-- Notes Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-foreground">Class Notes</h2>
                <a href="{{ route('notes.create', ['school_class_id' => $schoolClass->id]) }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <x-icons.plus class="w-5 h-5" />
                    <span>Create New Note</span>
                </a>
            </div>

            @if($notes->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-20 px-4 bg-muted/30 rounded-3xl border-2 border-dashed border-border">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <x-icons.document class="w-10 h-10 text-primary" />
                    </div>
                    <h3 class="text-2xl font-bold text-foreground mb-3">No notes yet for this class</h3>
                    <p class="text-muted-foreground mb-8 text-center max-w-md">Start building your knowledge base by creating your first note.</p>
                    <a href="{{ route('notes.create', ['school_class_id' => $schoolClass->id]) }}" class="group inline-flex items-center gap-2 px-8 py-4 bg-primary text-primary-foreground rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Create Your First Note
                        <x-icons.arrow-right class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                    </a>
                </div>
            @else
                <!-- Notes Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($notes as $index => $note)
                    <div class="group bg-card text-card-foreground border border-border rounded-2xl shadow-md hover:shadow-2xl hover:scale-105 hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col">
                        <!-- Note Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-bold text-foreground mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                                    {{ $note->title }}
                                </h3>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-accent/20 rounded-lg flex items-center justify-center flex-shrink-0 ml-3 group-hover:scale-110 transition-transform">
                                <x-icons.document class="w-5 h-5 text-primary" />
                            </div>
                        </div>

                        <!-- Note Footer -->
                        <div class="pt-4 border-t border-border">
                            <div class="flex items-center justify-between text-xs text-muted-foreground mb-3">
                                <div class="flex items-center gap-1">
                                    <x-icons.clock class="w-3 h-3" />
                                    <span>{{ $note->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <a href="{{ route('notes.show', $note->id) }}" class="group/btn flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-primary/10 hover:bg-primary text-primary hover:text-primary-foreground rounded-lg font-medium transition-all duration-300">
                                <span>View Note</span>
                                <x-icons.chevron-right class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
