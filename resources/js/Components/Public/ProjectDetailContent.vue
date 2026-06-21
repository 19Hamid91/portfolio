<template>
  <div class="w-full bg-black flex flex-col md:grid md:grid-cols-12 min-h-[50vh] border-b border-brand-border">
    <!-- Left Column: Case Study Overview -->
    <div class="col-span-12 md:col-span-8 p-6 md:p-12 lg:p-16 border-b md:border-b-0 md:border-r border-brand-border">
      <div class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-4">01 / Overview</div>
      <h3 class="text-2xl md:text-3xl font-serif font-black text-white mb-8">Project Details</h3>
      
      <div class="text-sm sm:text-base text-brand-muted leading-relaxed max-w-3xl ql-editor border-t border-brand-border pt-8" v-html="project.description">
      </div>
    </div>

    <!-- Right Column: Specs & Technical Data -->
    <div class="col-span-12 md:col-span-4 p-6 md:p-12 lg:p-16 flex flex-col justify-between bg-brand-surface">
      <div>
        <div class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-4">02 / Specs</div>
        <h3 class="text-xl font-serif font-black text-white mb-6">Technologies &amp; Architecture</h3>
        
        <!-- Spec Table -->
        <div class="divide-y divide-brand-border border-t border-b border-brand-border mb-8">
          <div 
            v-for="tech in project.technologies" 
            :key="tech.id" 
            class="py-3 flex items-center justify-between"
          >
            <span class="text-xs font-mono text-white">{{ tech.name }}</span>
            <img 
              v-if="tech.icon_url" 
              :src="tech.icon_url" 
              :alt="tech.name" 
              class="w-4 h-4 object-contain grayscale filter brightness-75"
            />
            <span v-else class="text-[9px] font-mono text-brand-muted">Utility</span>
          </div>
        </div>
      </div>

      <!-- Action Area -->
      <div class="mt-8 border-t border-brand-border pt-8">
        <a 
          v-if="project.web_link" 
          :href="project.web_link" 
          target="_blank" 
          class="block text-center border border-primary bg-primary text-black px-6 py-3.5 text-xs font-mono uppercase tracking-widest transition-colors duration-100 hover:bg-primary-hover hover:border-primary-hover cursor-pointer"
        >
          Visit Live Site &rarr;
        </a>
        <p v-else class="text-xs font-mono text-brand-muted italic">No live demo link available</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import '@vueup/vue-quill/dist/vue-quill.snow.css';

defineProps({
    project: Object
});
</script>

<style scoped>
/* Clean layouts */
</style>
