<template>
  <v-container class="py-16 mt-10" id="projects-section" style="max-width: 1400px;">
      <div class="d-flex align-center mb-10">
          <div>
            <h4 class="text-body-1 text-primary font-weight-bold tracking-widest text-uppercase mb-2">Portfolio</h4>
            <h2 class="text-h3 font-weight-black text-white outfit-font">
              Featured <span class="gradient-text">Works</span>
            </h2>
          </div>
          <v-spacer></v-spacer>
          <div class="h-line opacity-30 mt-8 hidden-sm-and-down"></div>
      </div>
      
      <!-- Filter Bar -->
      <div class="mb-12 glass-card pa-6 rounded-xl" v-if="technologies?.length">
          <div class="d-flex align-center justify-space-between mb-4">
              <span class="text-body-1 font-weight-bold text-white">Filter by Technology:</span>
              <v-btn 
                 v-if="selectedTechs.length > 0" 
                 @click="clearFilters" 
                 variant="text" 
                 color="error" 
                 size="small" 
                 prepend-icon="mdi-close-circle"
                 class="text-none font-weight-bold"
              >Clear Filters</v-btn>
          </div>
          <div class="d-flex flex-wrap gap-3">
              <v-chip 
                 v-for="tech in technologies" 
                 :key="'filter-'+tech.id" 
                 :color="selectedTechs.includes(tech.id) ? 'primary' : 'white'"
                 :variant="selectedTechs.includes(tech.id) ? 'elevated' : 'outlined'"
                 class="font-weight-medium border-opacity-25 hover-lift"
                 size="large"
                 @click="toggleTech(tech.id)"
                 style="cursor: pointer;"
              >
                 <v-avatar start v-if="tech.icon_url">
                    <v-img :src="tech.icon_url" cover></v-img>
                 </v-avatar>
                 {{ tech.name }}
              </v-chip>
          </div>
      </div>

      <!-- Filter Count Helper -->
      <div v-if="selectedTechs.length > 0" class="mb-8 text-primary font-weight-bold">
          Showing {{ filteredProjects.length }} project(s) matching your filters.
      </div>
      
      <v-row v-if="filteredProjects.length">
        <v-col cols="12" md="6" lg="4" v-for="(project, index) in filteredProjects" :key="project.id" class="mb-8">
          <ProjectCard :project="project" :index="index" />
        </v-col>
      </v-row>
      <div v-else class="text-center py-16 glass-card rounded-xl mx-auto" style="max-width: 800px;">
          <v-icon size="80" color="error" class="mb-6 opacity-60">mdi-text-box-search-outline</v-icon>
          <h3 class="text-h4 font-weight-bold text-white outfit-font">No matches found</h3>
          <p class="text-body-1 text-grey-lighten-1 mt-4">Try clearing your filters or selecting different technologies.</p>
      </div>
  </v-container>
</template>

<script setup>
import { ref, computed } from 'vue';
import ProjectCard from './ProjectCard.vue';

const props = defineProps({
    projects: Array,
    technologies: Array
});

// Feature: Multi-select filtering
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

// Filtered projects computed property
const filteredProjects = computed(() => {
    if (selectedTechs.value.length === 0) return props.projects;
    
    return props.projects.filter(project => {
        // Find if project has ALL selected tech IDs
        const projectTechIds = project.technologies.map(t => t.id);
        return selectedTechs.value.every(id => projectTechIds.includes(id));
    });
});
</script>

<style scoped>
.gradient-text {
    background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.glass-card {
    background: rgba(255, 255, 255, 0.03) !important;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
}
.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3) !important;
}
.h-line {
    flex-grow: 1;
    height: 2px;
    margin-left: 30px;
    background: linear-gradient(to right, rgba(99,102,241,0.5), transparent);
}
</style>
