<template>
  <v-container class="py-12 position-relative" style="margin-top: -60px; z-index: 10;">
    <v-row>
      <v-col cols="12" lg="8" md="7">
          <v-card class="glass-surface pa-6 pa-md-10 rounded-xl mb-8 border-0">
             <h3 class="text-h5 font-weight-bold mb-6 text-white outfit-font d-flex align-center gap-2">
                 <v-icon color="primary">mdi-text-box-outline</v-icon> Overview
             </h3>
             <div class="text-body-1 text-grey-lighten-1 project-desc">
                {{ project.description }}
             </div>
          </v-card>
      </v-col>

      <v-col cols="12" lg="4" md="5">
          <v-card class="glass-surface pa-8 rounded-xl border-0 sticky-sidebar">
              <h3 class="text-h5 font-weight-bold mb-6 text-white outfit-font">Tech Stack</h3>
              
              <div class="d-flex flex-column gap-4 mb-10">
                   <div v-for="tech in project.technologies" :key="tech.id" class="tech-item d-flex align-center pa-3 rounded-lg">
                      <v-avatar size="40" class="mr-4 bg-white pa-1">
                         <v-img :src="tech.icon_url || 'https://via.placeholder.com/40'" cover></v-img>
                      </v-avatar>
                      <span class="text-body-1 font-weight-medium text-white">{{ tech.name }}</span>
                   </div>
              </div>

              <v-divider class="mb-8 border-opacity-25" color="white"></v-divider>

              <div class="text-center">
                  <v-btn v-if="project.web_link" :href="project.web_link" target="_blank" color="primary" rounded="pill" block size="x-large" elevation="8" class="font-weight-bold hover-lift text-none">
                     <v-icon start>mdi-web</v-icon> Visit Live Site
                  </v-btn>
                  <p v-else class="text-grey-lighten-1 text-body-2 font-italic mt-4">No live link available</p>
              </div>
          </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
defineProps({
    project: Object
});
</script>

<style scoped>
.glass-surface {
    background: rgba(255, 255, 255, 0.03) !important;
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
}

.project-desc {
    line-height: 2;
    white-space: pre-wrap;
    font-size: 1.15rem;
}

.tech-item {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.05);
    transition: all 0.3s ease;
}

.tech-item:hover {
    background: rgba(99,102,241,0.1);
    border-color: rgba(99,102,241,0.3);
    transform: translateX(5px);
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4) !important;
}

.sticky-sidebar {
    position: sticky;
    top: 100px;
}
</style>
