<template>
  <header class="w-full h-20 border-b border-brand-border bg-black flex items-center justify-between px-6 md:px-12 sticky top-0 z-50">
    <!-- Serif Logo -->
    <div class="flex items-center">
      <Link href="/" class="text-2xl font-serif font-black tracking-tighter text-white hover:text-primary transition-colors duration-100">
        H.
      </Link>
    </div>

    <!-- Navigation Links & Actions -->
    <nav class="flex items-center gap-6 md:gap-8">
      <a 
        href="#projects-section" 
        class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary transition-colors duration-100"
      >
        Works
      </a>
      <a 
        href="#about-section" 
        class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary transition-colors duration-100"
      >
        About
      </a>
      <a 
        href="#contact-section" 
        class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary transition-colors duration-100"
      >
        Contact
      </a>
      
      <Link 
        v-if="$page.props.auth?.user" 
        :href="route('admin.projects.index')" 
        class="border border-primary text-primary px-4 py-2 text-xs font-mono uppercase tracking-widest hover:bg-primary hover:text-black transition-colors duration-100"
      >
        Dashboard
      </Link>
    </nav>
  </header>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* Snappy interactions */
</style>
