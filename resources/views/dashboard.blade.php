<x-layout title="Dashboard">
    <div class="max-w-7xl mx-auto">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-2">
                Welcome back, <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">{{ $user->name }}</span>
            </h1>
            <p class="text-lg text-muted-foreground">Here's what's happening with your studies today</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Total Classes -->
            <div class="group bg-gradient-to-br from-primary/10 to-primary/5 border border-primary/20 rounded-2xl p-6 hover:shadow-lg hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <x-icons.book class="w-6 h-6 text-primary" />
                    </div>
                    <span class="text-3xl font-bold text-primary">{{ $totalClasses }}</span>
                </div>
                <h3 class="text-lg font-semibold text-foreground mb-1">Total Classes</h3>
                <p class="text-sm text-muted-foreground">Active courses</p>
            </div>

            <!-- Total Notes -->
            <div class="group bg-gradient-to-br from-accent/10 to-accent/5 border border-accent/20 rounded-2xl p-6 hover:shadow-lg hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-accent/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <x-icons.pencil class="w-6 h-6 text-accent" />
                    </div>
                    <span class="text-3xl font-bold text-accent">{{ $totalNotes }}</span>
                </div>
                <h3 class="text-lg font-semibold text-foreground mb-1">Total Notes</h3>
                <p class="text-sm text-muted-foreground">Saved notes</p>
            </div>

            <!-- Quick Action -->
            <div class="group bg-gradient-to-br from-primary to-accent rounded-2xl p-6 hover:shadow-xl hover:scale-105 transition-all duration-300 flex items-center justify-center cursor-pointer">
                <a href="{{ route('schoolclasses.create') }}" class="flex flex-col items-center text-center gap-3 w-full">
                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <x-icons.plus class="w-7 h-7 text-white" />
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-1">Create New Class</h3>
                        <p class="text-sm text-white/80">Start organizing</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Classes Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-foreground">Your Classes</h2>
                @if($totalClasses > 0)
                <span class="text-sm text-muted-foreground">{{ $totalClasses }} {{ Str::plural('class', $totalClasses) }}</span>
                @endif
            </div>

            @if($schoolclasses->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-20 px-4 bg-muted/30 rounded-3xl border-2 border-dashed border-border">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <x-icons.book class="w-10 h-10 text-primary" />
                    </div>
                    <h3 class="text-2xl font-bold text-foreground mb-3">No classes yet</h3>
                    <p class="text-muted-foreground mb-8 text-center max-w-md">Get started by creating your first class and begin organizing your notes.</p>
                    <a href="{{ route('schoolclasses.create') }}" class="group inline-flex items-center gap-2 px-8 py-4 bg-primary text-primary-foreground rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Create Your First Class
                        <x-icons.arrow-right class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                    </a>
                </div>
            @else
                <!-- Classes Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($schoolclasses as $index => $schoolclass)
                    <div class="group bg-card text-card-foreground border border-border rounded-2xl shadow-md hover:shadow-2xl hover:scale-105 hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col">
                        <!-- Class Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <a href="{{ route('schoolclasses.show', $schoolclass->id) }}" class="group/link">
                                    <h3 class="text-xl font-bold text-foreground group-hover/link:text-primary transition-colors mb-1">
                                        {{ $schoolclass->name }}
                                    </h3>
                                </a>
                                @if($schoolclass->notes_count ?? 0)
                                <span class="inline-flex items-center gap-1 text-xs text-muted-foreground">
                                    <x-icons.document class="w-3 h-3" />
                                    {{ $schoolclass->notes_count }} {{ Str::plural('note', $schoolclass->notes_count) }}
                                </span>
                                @endif
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <x-icons.book class="w-5 h-5 text-white" />
                            </div>
                        </div>

                        <!-- Class Details -->
                        <div class="space-y-3 flex-1">
                            <div class="flex items-start gap-2">
                                <x-icons.user class="w-4 h-4 text-muted-foreground mt-0.5 flex-shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-foreground">{{ $schoolclass->teacher_name }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-2">
                                <x-icons.mail class="w-4 h-4 text-muted-foreground mt-0.5 flex-shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-muted-foreground truncate">{{ $schoolclass->teacher_email }}</p>
                                </div>
                            </div>

                            @if($schoolclass->class_website)
                            <div class="flex items-start gap-2">
                                <x-icons.globe class="w-4 h-4 text-muted-foreground mt-0.5 flex-shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <a href="{{ $schoolclass->class_website }}" target="_blank" class="text-sm text-primary hover:underline truncate block">
                                        {{ parse_url($schoolclass->class_website, PHP_URL_HOST) ?? $schoolclass->class_website }}
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Button -->
                        <div class="mt-6 pt-4 border-t border-border">
                            <a href="{{ route('schoolclasses.show', $schoolclass->id) }}" class="group/btn flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-primary/10 hover:bg-primary text-primary hover:text-primary-foreground rounded-lg font-medium transition-all duration-300">
                                <span>View Class</span>
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
