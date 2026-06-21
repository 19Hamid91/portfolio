<template>
  <section class="w-full border-b border-brand-border bg-black py-16 px-6 md:px-12">
    <div class="mb-12">
      <h4 class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-2">02 / Services</h4>
      <h2 class="text-3xl md:text-4xl font-serif font-black text-white">What I do</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 border-t border-l border-brand-border bg-black">
      <!-- Service 1 -->
      <div class="group p-8 border-r border-b border-brand-border bg-black hover:bg-primary transition-colors duration-100 cursor-default">
        <span class="text-xs font-mono text-neutral-700 group-hover:text-black/50">[01]</span>
        <h3 class="font-serif font-black text-2xl text-white group-hover:text-black mb-3 mt-4 transition-colors duration-100">
          Web Application Development
        </h3>
        <p class="text-xs sm:text-sm font-sans text-brand-muted group-hover:text-black/80 leading-relaxed transition-colors duration-100">
          Full-stack builds from database to UI. Laravel backends, React or Vue frontends, deployed and production-ready.
        </p>
      </div>

      <!-- Service 2 -->
      <div class="group p-8 border-r border-b border-brand-border bg-black hover:bg-primary transition-colors duration-100 cursor-default">
        <span class="text-xs font-mono text-neutral-700 group-hover:text-black/50">[02]</span>
        <h3 class="font-serif font-black text-2xl text-white group-hover:text-black mb-3 mt-4 transition-colors duration-100">
          API Design &amp; Integration
        </h3>
        <p class="text-xs sm:text-sm font-sans text-brand-muted group-hover:text-black/80 leading-relaxed transition-colors duration-100">
          RESTful APIs built for clarity and reliability &mdash; whether it's powering your frontend or connecting third-party services.
        </p>
      </div>

      <!-- Service 3 -->
      <div class="group p-8 border-r border-b border-brand-border bg-black hover:bg-primary transition-colors duration-100 cursor-default">
        <span class="text-xs font-mono text-neutral-700 group-hover:text-black/50">[03]</span>
        <h3 class="font-serif font-black text-2xl text-white group-hover:text-black mb-3 mt-4 transition-colors duration-100">
          Legacy Code Rescue
        </h3>
        <p class="text-xs sm:text-sm font-sans text-brand-muted group-hover:text-black/80 leading-relaxed transition-colors duration-100">
          Got an old codebase that's become a burden? I help modernize, refactor, and stabilize projects that need a second life.
        </p>
      </div>

      <!-- Service 4 -->
      <div class="group p-8 border-r border-b border-brand-border bg-black hover:bg-primary transition-colors duration-100 cursor-default">
        <span class="text-xs font-mono text-neutral-700 group-hover:text-black/50">[04]</span>
        <h3 class="font-serif font-black text-2xl text-white group-hover:text-black mb-3 mt-4 transition-colors duration-100">
          Technical Consulting
        </h3>
        <p class="text-xs sm:text-sm font-sans text-brand-muted group-hover:text-black/80 leading-relaxed transition-colors duration-100">
          Not sure how to approach your next build? I can help you think through architecture, stack choices, and what to avoid.
        </p>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
    technologies: Array
});
</script>

<style scoped>
</style>
