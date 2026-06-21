<template>
  <section class="w-full border-b border-brand-border bg-black flex flex-col md:grid md:grid-cols-12" id="contact-section">
    <!-- Left Column: Title -->
    <div class="col-span-12 md:col-span-6 p-6 md:p-12 lg:p-16 border-b md:border-b-0 md:border-r border-brand-border flex flex-col justify-between">
      <div>
        <h4 class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-2">04 / Contact</h4>
        <h2 class="text-4xl sm:text-5xl font-serif font-black text-white leading-tight">
          Let's build <br />something.
        </h2>
      </div>
      
      <p class="text-[10px] font-mono uppercase tracking-widest text-brand-disabled mt-8">
        Response within 24 hours.
      </p>
    </div>

    <!-- Right Column: Copywriting Links -->
    <div class="col-span-12 md:col-span-6 p-6 md:p-12 lg:p-16 flex flex-col justify-center bg-brand-surface min-h-[300px]">
      <p class="text-sm font-sans text-brand-muted mb-8 leading-relaxed max-w-lg">
        Have a project in mind, or just want to talk through an idea? I'm open to freelance work, collaborations, and long-term partnerships.
      </p>
      
      <div v-if="email" class="mb-8">
        <a 
          :href="'mailto:' + email"
          class="inline-block text-lg sm:text-xl font-mono text-white hover:text-primary transition-colors duration-100"
        >
          &rarr; {{ email }}
        </a>
      </div>

      <!-- Socials -->
      <div class="flex items-center gap-6 pt-6 border-t border-brand-border">
        <a 
          v-if="githubUrl" 
          :href="githubUrl" 
          target="_blank" 
          class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary transition-colors duration-100"
        >
          &rarr; GitHub
        </a>
        <a 
          v-if="linkedinUrl" 
          :href="linkedinUrl" 
          target="_blank" 
          class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary transition-colors duration-100"
        >
          &rarr; LinkedIn
        </a>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
    email: String,
    githubUrl: String,
    linkedinUrl: String
});
</script>

<style scoped>
</style>
