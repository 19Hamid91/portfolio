<template>
  <section class="w-full border-b border-brand-border bg-black py-16 px-6 md:px-12" id="projects-section">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
      <div>
        <h4 class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-2">Portfolio</h4>
        <h2 class="text-3xl md:text-4xl font-serif font-black text-white">Selected Works</h2>
      </div>
      
      <!-- Reset helper -->
      <button 
        v-if="selectedTechs.length > 0" 
        @click="clearFilters" 
        class="border border-primary text-primary px-4 py-2 text-[10px] font-mono uppercase tracking-widest hover:bg-primary-hover hover:text-black hover:border-primary-hover transition-colors duration-100 self-start md:self-auto cursor-pointer"
      >
        Clear Filters
      </button>
    </div>
    
    <!-- Filter Bar -->
    <div class="mb-12 border border-brand-border bg-brand-surface p-6" v-if="technologies?.length">
      <div class="text-xs font-mono uppercase tracking-widest text-brand-muted mb-4">Filter by Tech Stack</div>
      <div class="flex flex-wrap gap-2">
        <button 
          v-for="tech in technologies" 
          :key="'filter-'+tech.id" 
          @click="toggleTech(tech.id)"
          :class="[
            'px-3 py-1.5 text-xs font-mono uppercase tracking-widest border transition-colors duration-100 cursor-pointer',
            selectedTechs.includes(tech.id) 
              ? 'bg-primary text-black border-primary' 
              : 'bg-transparent text-brand-muted border-brand-border hover:text-primary hover:border-primary'
          ]"
        >
          {{ tech.name }}
        </button>
      </div>
    </div>
 
    <!-- Filter Count Helper -->
    <div v-if="selectedTechs.length > 0" class="mb-6 text-xs font-mono uppercase tracking-wider text-white">
      Showing {{ filteredProjects.length }} project(s) matching selected criteria.
    </div>
    
    <!-- Editorial Border Grid -->
    <div v-if="filteredProjects.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 border-t border-l border-brand-border">
      <div 
        v-for="(project, index) in filteredProjects" 
        :key="project.id" 
        class="border-r border-b border-brand-border"
      >
        <ProjectCard :project="project" :index="index" />
      </div>
    </div>
    
    <!-- Empty State -->
    <div v-else class="text-center py-20 border border-brand-border bg-brand-surface max-w-3xl mx-auto">
      <svg class="w-12 h-12 text-brand-muted mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
      </svg>
      <h3 class="text-lg font-serif text-white mb-2">No matching projects</h3>
      <p class="text-sm text-brand-muted font-mono">Try selecting a different combination of technologies.</p>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import ProjectCard from './ProjectCard.vue';

const props = defineProps({
    projects: Array,
    technologies: Array
});

const selectedTechs = ref([]);

const toggleTech = (techId) => {
    const index = selectedTechs.value.indexOf(techId);
    if (index === -1) {
        selectedTechs.value.push(techId);
    } else {
        selectedTechs.value.splice(index, 1);
    }
};

const clearFilters = () => {
    selectedTechs.value = [];
};

const filteredProjects = computed(() => {
    if (selectedTechs.value.length === 0) return props.projects;
    
    return props.projects.filter(project => {
        const projectTechIds = project.technologies.map(t => t.id);
        return selectedTechs.value.every(id => projectTechIds.includes(id));
    });
});
</script>

<style scoped>
</style>
