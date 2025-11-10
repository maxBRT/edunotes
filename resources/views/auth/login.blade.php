<x-layout title="Login">
    <div class="flex items-center justify-center min-h-[calc(100vh-16rem)]">
        <div class="w-full max-w-md">
            <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8">
                <h2 class="text-3xl font-bold mb-2">Welcome back</h2>
                <p class="text-muted-foreground mb-6">Sign in to your account to continue</p>

                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
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

                    <div>
                        <label for="password" class="block text-sm font-medium mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-2.5 pr-12 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                                placeholder="Enter your password">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground transition-colors">
                                <x-icons.eye id="password-hide" />
                                <x-icons.eye-slash id="password-show" class="hidden" />
                            </button>
                        </div>
                        @error('password')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 rounded border-border bg-input text-primary focus:ring-2 focus:ring-ring">
                            <span class="text-sm text-muted-foreground">Remember me</span>
                        </label>

                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Sign in
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-muted-foreground">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary hover:underline font-medium">
                            Sign up
                        </a>
                    </p>
                </div>
                <div class="mt-2 text-center">
                    <p class="text-sm text-muted-foreground">
                        Can't sign in?
                        <a href="{{ route('password.request') }}" class="text-primary hover:underline font-medium">
                            Reset Password
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const hideIcon = document.getElementById(inputId + '-hide');
            const showIcon = document.getElementById(inputId + '-show');

            if (input.type === 'password') {
                input.type = 'text';
                hideIcon.classList.add('hidden');
                showIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                hideIcon.classList.remove('hidden');
                showIcon.classList.add('hidden');
            }
        }
    </script>
</x-layout>
