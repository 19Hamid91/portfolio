<template>
  <Link :href="'/projects/' + project.slug" class="group block h-full bg-black hover:bg-primary text-white hover:text-black border border-b border-r border-brand-border transition-colors duration-100 cursor-pointer">
    <!-- Thumbnail Image -->
    <div class="w-full h-56 md:h-64 border-b border-brand-border group-hover:border-black/20 overflow-hidden bg-brand-subtle transition-colors duration-100">
      <img 
        :src="project.thumbnail_url || 'https://via.placeholder.com/600x400'" 
        :alt="project.title"
        class="w-full h-full object-cover grayscale contrast-125 group-hover:grayscale-0 group-hover:scale-[1.02] group-hover:contrast-100 transition-all duration-100"
      />
    </div>

    <!-- Details -->
    <div class="p-6 flex flex-col justify-between min-h-[180px]">
      <div>
        <h3 class="font-serif font-black text-xl mb-2 text-white group-hover:text-black transition-colors duration-100 leading-tight">
          {{ project.title }}
        </h3>
        <p class="text-xs font-sans text-brand-muted group-hover:text-black/80 transition-colors duration-100 leading-relaxed">
          {{ stripHtml(project.description)?.length > 110 ? stripHtml(project.description).substring(0, 110) + '...' : stripHtml(project.description) }}
        </p>
      </div>

      <div class="flex flex-wrap gap-1.5 mt-6">
        <span 
          v-for="tech in project.technologies.slice(0, 3)" 
          :key="tech.id"
          class="px-2 py-0.5 text-[9px] font-mono uppercase tracking-widest text-brand-muted border border-brand-border group-hover:text-black/70 group-hover:border-black/30 transition-colors duration-100"
        >
          {{ tech.name }}
        </span>
        <span 
          v-if="project.technologies.length > 3"
          class="px-2 py-0.5 text-[9px] font-mono uppercase tracking-widest text-brand-muted group-hover:text-black/70 transition-colors duration-100"
        >
          +{{ project.technologies.length - 3 }}
        </span>
      </div>
    </div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    project: Object,
    index: Number
});

const stripHtml = (html) => {
    if (!html) return '';
    return html.replace(/<[^>]*>?/gm, '');
};
</script>

<style scoped>
</style>
