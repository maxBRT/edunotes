<x-layout :title="'EduNotes - Organize Your Learning'">
    <!-- Hero Section -->
    <section class="relative text-center py-32 px-4 bg-gradient-to-b from-background via-primary/5 to-background">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div class="max-w-4xl mx-auto relative">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-medium mb-8">
                <x-icons.check class="w-4 h-4" />
                Take notes. Stay organized. Learn better.
            </div>
            <h1 class="text-6xl md:text-7xl font-extrabold text-foreground mb-6 leading-tight">
                Less noise, more learning
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent"> EduNotes</span>
            </h1>
            <p class="text-xl md:text-2xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed">
                A clean, distraction-free space to take notes and stay organized for class.
                Built for students who just want to focus on learning.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @guest
                <a href="{{ route('register') }}"
                    class="group px-8 py-4 bg-primary text-primary-foreground rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    Get Started Free
                    <x-icons.arrow-right class="inline w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
                </a>
                <a href="{{ route('login') }}"
                    class="px-8 py-4 bg-secondary text-secondary-foreground rounded-xl font-semibold hover:bg-secondary/80 transition-all duration-300">
                    Sign In
                </a>
                @else
                <a href="{{ route('dashboard') }}"
                    class="group px-8 py-4 bg-primary text-primary-foreground rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    Go to Dashboard
                    <x-icons.arrow-right class="inline w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
                </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Separator -->
    <div class="flex items-center justify-center py-16">
        <div class="w-16 h-1 bg-gradient-to-r from-transparent via-primary to-transparent"></div>
    </div>

    <!-- Features Section -->
    <section class="py-24 px-4 bg-muted/30">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">Made for how students actually study
                </h2>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Simple features designed to help you stay
                    organized, take better notes, and learn more efficiently.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="group bg-card text-card-foreground rounded-2xl p-8 border border-border shadow-md hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <x-icons.book class="w-7 h-7 text-primary-foreground" />
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-primary transition-colors">Organize Classes</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Keep all your classes perfectly organized in one intuitive dashboard. Easy to manage and always
                        at your fingertips.
                    </p>
                </div>

                <div
                    class="group bg-card text-card-foreground rounded-2xl p-8 border border-border shadow-md hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <x-icons.pencil class="w-7 h-7 text-primary-foreground" />
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-primary transition-colors">Take Notes</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Write and format stunning notes with our markdown editor. Capture ideas, formulas, and
                        insights effortlessly.
                    </p>
                </div>

                <div
                    class="group bg-card text-card-foreground rounded-2xl p-8 border border-border shadow-md hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <x-icons.lightning class="w-7 h-7 text-primary-foreground" />
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-primary transition-colors">Study Smarter</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Access your notes anytime, anywhere. Review key concepts and prepare for exams.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Separator -->
    <div class="flex items-center justify-center py-16">
        <div class="w-16 h-1 bg-gradient-to-r from-transparent via-primary to-transparent"></div>
    </div>

    <!-- CTA Section -->
    @guest
    <section class="py-24 px-4 mb-16">
        <div class="max-w-4xl mx-auto">
            <div
                class="relative py-20 px-8 text-center bg-gradient-to-br from-primary/10 via-accent/5 to-primary/5 rounded-3xl border border-primary/20 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
                <div class="relative">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-foreground">Ready to make studying a little
                        easier?
                    </h2>
                    <p class="text-lg md:text-xl text-muted-foreground mb-10 leading-relaxed max-w-2xl mx-auto">
                        Join students who use EduNotes to stay organized and stress less.
                    </p>
                    <a href="{{ route('register') }}"
                        class="group inline-flex items-center gap-2 px-10 py-5 bg-primary text-primary-foreground rounded-xl font-bold text-lg shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        Create Free Account
                        <x-icons.arrow-right class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endguest
</x-layout>
