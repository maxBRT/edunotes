<x-layout title="Register">
    <div class="flex items-center justify-center min-h-[calc(100vh-16rem)]">
        <div class="w-full max-w-md">
            <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8">
                <h2 class="text-3xl font-bold mb-2">Create an account</h2>
                <p class="text-muted-foreground mb-6">Sign up to get started</p>

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">
                            Name
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="Your full name">
                        @error('name')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="you@example.com">
                        @error('email')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="Create a password">
                        @error('password')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium mb-2">
                            Confirm Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="Confirm your password">
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Create account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-muted-foreground">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary hover:underline font-medium">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
