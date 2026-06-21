<template>
  <section class="w-full border-b border-brand-border bg-black flex flex-col md:grid md:grid-cols-12 min-h-[75vh]">
    <!-- Left Column (Typographic Hero Title & Copywriting) -->
    <div class="col-span-12 md:col-span-8 p-6 md:p-12 lg:p-16 flex flex-col justify-between">
      <div>
        <div class="text-[10px] font-mono uppercase tracking-widest text-brand-muted mb-8">
          {{ profile?.full_name || 'Abdurrahman Hamid' }} &mdash; Full-Stack Web Developer
        </div>
        
        <h1 class="text-5xl sm:text-7xl lg:text-8xl font-serif font-black tracking-[-0.03em] leading-[1.05] text-white mb-6 max-w-4xl">
          Make it eazy.
        </h1>
        
        <p class="text-base sm:text-lg text-white font-sans max-w-2xl leading-relaxed mt-6">
          I build web applications that are clean, fast, and actually make sense to the people using them. From backend logic to frontend detail &mdash; end to end, no handoff needed.
        </p>

        <div class="text-xs font-mono uppercase tracking-widest text-brand-muted mt-8">
          Laravel &middot; React &middot; Vue
        </div>
      </div>

      <div class="mt-12 flex flex-wrap gap-4 mb-4">
        <button 
          @click="$emit('scroll-to-projects')"
          class="border border-primary bg-primary text-black px-6 py-3 text-xs font-mono uppercase tracking-widest transition-colors duration-100 hover:bg-primary-hover hover:border-primary-hover cursor-pointer"
        >
          View My Work &darr;
        </button>
        <button 
          @click="$emit('scroll-to-contact')"
          class="border border-brand-border text-white px-6 py-3 text-xs font-mono uppercase tracking-widest transition-colors duration-100 hover:bg-primary hover:text-black hover:border-primary cursor-pointer"
        >
          Let's Talk
        </button>
      </div>
    </div>

    <!-- Right Column (Avatar & Social Links) -->
    <div class="col-span-12 md:col-span-4 border-t md:border-t-0 md:border-l border-brand-border flex flex-col justify-between bg-black">
      <!-- Top Box: Avatar/Image in stark black-and-white -->
      <div class="border-b border-brand-border p-12 flex flex-grow items-center justify-center bg-black relative">
        <div class="w-56 h-56 border border-brand-border bg-black p-4 relative transition-transform duration-100 hover:rotate-2">
          <!-- Corner technical brackets -->
          <div class="absolute -top-[1px] -left-[1px] w-2.5 h-2.5 border-t border-l border-primary"></div>
          <div class="absolute -top-[1px] -right-[1px] w-2.5 h-2.5 border-t border-r border-primary"></div>
          <div class="absolute -bottom-[1px] -left-[1px] w-2.5 h-2.5 border-b border-l border-primary"></div>
          <div class="absolute -bottom-[1px] -right-[1px] w-2.5 h-2.5 border-b border-r border-primary"></div>

          <img 
            :src="profile?.avatar_url || 'https://api.dicebear.com/7.x/avataaars/svg?seed=Felix'" 
            alt="Avatar" 
            class="w-full h-full object-cover grayscale contrast-125 filter bg-black border border-brand-border"
          />
        </div>
      </div>

      <!-- Bottom Box: Social Grid -->
      <div class="p-6 md:p-8 flex items-center justify-center gap-6">
        <a 
          v-if="profile?.github_url" 
          :href="profile.github_url" 
          target="_blank" 
          class="text-xs font-mono uppercase tracking-wider text-brand-muted hover:text-primary transition-colors duration-100"
        >
          GitHub
        </a>
        <a 
          v-if="profile?.linkedin_url" 
          :href="profile.linkedin_url" 
          target="_blank" 
          class="text-xs font-mono uppercase tracking-wider text-brand-muted hover:text-primary transition-colors duration-100"
        >
          LinkedIn
        </a>
        <a 
          v-if="profile?.email" 
          :href="'mailto:' + profile.email" 
          class="text-xs font-mono uppercase tracking-wider text-brand-muted hover:text-primary transition-colors duration-100"
        >
          Email
        </a>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
    profile: Object
});

defineEmits(['scroll-to-projects', 'scroll-to-contact']);
</script>

<style scoped>
    /* Snappy hover cursors and layouts */
</style>
