<div>
    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4" x-data="{ show: @entangle('showModal') }"
        x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>

        <div class="relative bg-card border border-border rounded-xl shadow-2xl max-w-md w-full p-6"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            <div class="flex items-start gap-4 mb-6">
                <div class="flex-shrink-0 w-12 h-12 bg-destructive/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-destructive" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>

                <div class="flex-1">
                    <h3 class="text-xl font-bold text-card-foreground mb-2">Delete Class</h3>
                    <p class="text-sm text-muted-foreground">
                        Are you sure you want to delete
                        <span class="font-semibold text-foreground">"{{ $className }}"</span>?
                    </p>
                    <p class="text-sm text-muted-foreground mt-2">
                        This action cannot be undone. All notes associated with this class will also be permanently
                        deleted.
                    </p>
                </div>
            </div>

            <div class="flex gap-3 justify-end">
                <button type="button" wire:click="closeModal"
                    class="px-4 py-2 bg-secondary text-secondary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                    Cancel
                </button>
                <button type="button" wire:click="deleteClass"
                    class="px-4 py-2 bg-destructive text-destructive-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-destructive transition-opacity">
                    Delete Class
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
