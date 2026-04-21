<template>
  <div class="project-hero position-relative">
     <v-img :src="thumbnailUrl || 'https://via.placeholder.com/1200x600'" height="50vh" cover class="hero-bg"></v-img>
     <div class="hero-overlay d-flex align-end pb-12">
        <v-container>
          <Link href="/" class="text-decoration-none">
              <v-btn variant="text" color="white" prepend-icon="mdi-arrow-left" class="mb-6 hover-lift text-none font-weight-bold">
                  Back to all projects
              </v-btn>
          </Link>
          <h1 class="text-h3 text-md-h2 font-weight-black text-white outfit-font mb-4 proj-title" style="max-width: 800px;">
              {{ title }}
          </h1>
        </v-container>
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
.project-hero {
    margin-top: -80px; /* pull up behind nav */
}

.hero-bg {
    filter: brightness(0.6);
}

.hero-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(to bottom, rgba(13,17,23,0) 0%, rgba(13,17,23,0.8) 50%, rgba(13,17,23,1) 100%);
}

.proj-title {
    text-shadow: 0 4px 20px rgba(0,0,0,0.5);
    animation: slideUp 0.8s ease forwards;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4) !important;
}
</style>
