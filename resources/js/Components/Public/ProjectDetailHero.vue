<template>
  <div class="w-full border-b border-brand-border bg-black flex flex-col md:grid md:grid-cols-12 min-h-[40vh] mt-0">
    <!-- Left Column: Title & Navigation -->
    <div class="col-span-12 md:col-span-7 p-6 md:p-12 lg:p-16 flex flex-col justify-between">
      <div>
        <Link href="/" class="inline-flex items-center gap-2 text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary mb-8 group cursor-pointer">
          <span class="group-hover:-translate-x-1 transition-transform duration-100">&larr;</span> Back to index
        </Link>
        
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-black text-white leading-tight max-w-2xl mt-4">
          {{ title }}
        </h1>
      </div>
      
      <div class="text-[10px] font-mono uppercase tracking-widest text-brand-muted mt-8 md:mt-0">
        Project Case Study
      </div>
    </div>

    <!-- Right Column: Thumbnail Image -->
    <div class="col-span-12 md:col-span-5 border-t md:border-t-0 md:border-l border-brand-border bg-brand-subtle overflow-hidden flex items-center justify-center">
      <img 
        :src="thumbnailUrl || 'https://via.placeholder.com/1200x600'" 
        :alt="title"
        class="w-full h-full min-h-[300px] object-cover grayscale contrast-110 filter"
      />
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    title: String,
    thumbnailUrl: String
});
</script>

<style scoped>
</style>
