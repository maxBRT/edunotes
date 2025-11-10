<x-layout title="Reset Password">
    <div class="flex items-center justify-center min-h-[calc(100vh-16rem)]">
        <div class="w-full max-w-md">
            <div class="bg-card text-card-foreground border border-border rounded-xl shadow-sm p-8">
                <h2 class="text-3xl font-bold mb-2">Create New Password</h2>
                <p class="text-muted-foreground mb-6">Enter your email and choose a new password</p>

                <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $email ?? '') }}" required autofocus
                            class="w-full px-4 py-2.5 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            placeholder="you@example.com">
                        @error('email')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-2">
                            New Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-2.5 pr-12 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                                placeholder="Enter your new password">
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

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium mb-2">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-4 py-2.5 pr-12 bg-input text-foreground border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                                placeholder="Confirm your new password">
                            <button type="button" onclick="togglePassword('password_confirmation')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground transition-colors">
                                <x-icons.eye id="password_confirmation-hide" />
                                <x-icons.eye-slash id="password_confirmation-show" class="hidden" />
                            </button>
                        </div>
                        @error('password_confirmation')
                        <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @error('form')
                    <p class="text-destructive text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                        class="w-full px-6 py-3 bg-primary text-primary-foreground rounded-lg font-medium hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-ring transition-opacity">
                        Reset Password
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
