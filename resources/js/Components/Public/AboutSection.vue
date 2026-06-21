<template>
    <section
        class="w-full border-b border-brand-border bg-black flex flex-col md:grid md:grid-cols-12"
        id="about-section"
    >
        <!-- Left Column: Section Tag & Title -->
        <div class="col-span-12 md:col-span-4 p-6 md:p-12 lg:p-16 border-b md:border-b-0 md:border-r border-brand-border">
            <h4 class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-2">01 / Profile</h4>
            <h2 class="text-3xl md:text-4xl font-serif font-black text-white leading-tight">About Me</h2>
        </div>

        <!-- Right Column: Biography Copywriting -->
        <div class="col-span-12 md:col-span-8 flex flex-col justify-between">
            <!-- Main Text Area -->
            <div class="p-6 md:p-12 lg:p-16 border-b border-brand-border space-y-6">
                <p class="text-base sm:text-lg text-white font-sans leading-relaxed">I'm Hamid, a full-stack developer based in Indonesia with 2+ years of experience turning ideas into working products.</p>
                <p class="text-sm sm:text-base text-brand-muted font-sans leading-relaxed">
                    I work across the full stack &mdash; Laravel on the server, React or Vue on the client &mdash; and I care as much about how something is built as how it looks and feels.
                </p>

                <!-- Big Philosophy Quote -->
                <blockquote class="border-l-2 border-primary pl-6 py-2 my-8">
                    <p class="text-lg md:text-xl font-serif italic text-white leading-relaxed">
                        &ldquo;My philosophy is simple: good software shouldn't be complicated to use, maintain, or explain. Make it work. Make it clean. Make it eazy.&rdquo;
                    </p>
                </blockquote>
            </div>

            <!-- Footer Telemetry -->
            <div class="p-6 md:p-8 bg-brand-surface flex items-center justify-between">
                <p class="text-xs font-mono text-brand-muted leading-relaxed">&mdash; When I'm not shipping features, I'm usually thinking about better ways to architect the next one.</p>
            </div>
        </div>
    </section>
</template>

<script setup></script>

<style scoped></style>
