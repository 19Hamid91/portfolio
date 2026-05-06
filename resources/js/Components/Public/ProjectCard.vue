<template>
  <Link :href="'/projects/' + project.slug" class="text-decoration-none h-100 d-block">
      <v-card class="glass-card h-100 rounded-xl d-flex flex-column border project-card" :style="`animation-delay: ${index * 0.1}s`">
         <div class="thumbnail-wrapper overflow-hidden position-relative" style="height: 280px; border-radius: 20px 20px 0 0;">
           <v-img :src="project.thumbnail_url || 'https://via.placeholder.com/600x400'" height="280" cover class="thumbnail-img"></v-img>
           <div class="overlay-grad"></div>
           <div class="view-btn-overlay">
              <v-btn color="primary" rounded="pill" class="text-none font-weight-bold primary-btn-glow" prepend-icon="mdi-eye" size="large">View Details</v-btn>
           </div>
         </div>
         <v-card-text class="pa-8 d-flex flex-column flex-grow-1">
            <h3 class="font-weight-black text-h5 text-white mb-3 outfit-font">{{ project.title }}</h3>
            <p class="text-body-1 opacity-80 text-grey-lighten-1 mb-6 flex-grow-1" style="line-height: 1.6;">
                {{ project.description?.length > 120 ? project.description.substring(0, 120) + '...' : project.description }}
            </p>
            <div class="d-flex flex-wrap gap-2">
               <v-chip v-for="tech in project.technologies.slice(0, 3)" :key="tech.id" size="small" color="white" variant="outlined" class="font-weight-medium bg-white bg-opacity-10 border-opacity-25">
                  <v-avatar start v-if="tech.icon_url"><v-img :src="tech.icon_url" cover></v-img></v-avatar>
                  {{ tech.name }}
               </v-chip>
               <v-chip v-if="project.technologies.length > 3" size="small" variant="plain" color="grey-lighten-1" class="px-1">
                  +{{ project.technologies.length - 3 }}
               </v-chip>
            </div>
         </v-card-text>
      </v-card>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    project: Object,
    index: Number
});
</script>

<style scoped>
.glass-card {
    background: rgba(255, 255, 255, 0.03) !important;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.12) !important;
}
.primary-btn-glow {
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4) !important;
}
.project-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    transform: translateY(20px);
}
@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}
.project-card:hover {
    transform: translateY(-12px);
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(99, 102, 241, 0.4) !important;
    box-shadow: 0 25px 50px rgba(0,0,0,0.5) !important;
}
.thumbnail-img {
    transition: transform 0.8s ease;
}
.project-card:hover .thumbnail-img {
    transform: scale(1.1);
}
.overlay-grad {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80%;
    background: linear-gradient(to top, rgba(13,17,23,1) 0%, transparent 100%);
    pointer-events: none;
}
.view-btn-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0,0,0,0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.project-card:hover .view-btn-overlay {
    opacity: 1;
}
</style>
