<div class="relative w-full max-w-md">
    <form role="search" class="relative">
        <div class="relative">
            <x-icons.search class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground pointer-events-none" />
            <input
                wire:model.live="search"
                type="search"
                placeholder="Search notes..."
                class="w-full pl-10 pr-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
            >
        </div>
    </form>

    @if (strlen($search) >= 1 && count($notes) > 0)
        <div class="absolute z-50 w-full mt-2 bg-card border border-border rounded-lg shadow-lg max-h-96 overflow-y-auto">
            <div class="py-2">
                @foreach ($notes as $note)
                    <a
                        href="{{ route('notes.show', $note->id) }}"
                        class="flex items-center justify-between px-4 py-3 hover:bg-muted transition-colors group"
                    >
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-foreground truncate">
                                {{ $note->title }}
                            </p>
                            @if ($note->schoolClass)
                                <p class="text-xs text-muted-foreground truncate mt-0.5">
                                    {{ $note->schoolClass->name }}
                                </p>
                            @endif
                        </div>
                        <x-icons.chevron-right class="w-4 h-4 text-muted-foreground group-hover:text-foreground group-hover:translate-x-1 transition-all flex-shrink-0 ml-2" />
                    </a>
                @endforeach
            </div>
        </div>
    @elseif (strlen($search) >= 1 && count($notes) === 0)
        <div class="absolute z-50 w-full mt-2 bg-card border border-border rounded-lg shadow-lg">
            <div class="px-4 py-6 text-center">
                <x-icons.document class="w-8 h-8 text-muted-foreground mx-auto mb-2" />
                <p class="text-sm text-muted-foreground">No notes found</p>
            </div>
        </div>
    @endif
</div>
