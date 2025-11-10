<x-layout title="Reset Password">
    <div class="flex items-center justify-center min-h-[calc(100vh-16rem)]">
        <div class="w-full max-w-md">
            <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8">
                <h2 class="text-3xl font-bold mb-2">Reset Password</h2>
                <p class="text-muted-foreground mb-6">Enter your email address and we'll send you a link to reset your password</p>

                @if (session('status'))
                    <div class="mb-4 p-4 bg-green-500/10 border border-green-500/20 text-green-600 dark:text-green-400 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="you@example.com">
                        @error('email')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Send Reset Link
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-muted-foreground">
                        Remember your password?
                        <a href="{{ route('login') }}" class="text-primary hover:underline font-medium">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
