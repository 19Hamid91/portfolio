<template>
  <v-container class="py-16 mt-16" style="max-width: 1400px;">
     <div class="text-center mb-16">
        <h4 class="text-body-1 text-primary font-weight-bold tracking-widest text-uppercase mb-2">My Arsenal</h4>
        <h2 class="text-h3 font-weight-black text-white outfit-font">Technologies & Tools</h2>
     </div>
     
     <v-row justify="center" class="gap-4">
        <v-col cols="6" sm="4" md="3" lg="2" class="text-center" v-for="tech in technologies" :key="tech.id">
           <div class="tech-icon-card glass-card pa-6 rounded-xl d-flex flex-column align-center justify-center hover-lift" style="cursor: default;">
               <v-img v-if="tech.icon_url" :src="tech.icon_url" width="60" height="60" class="mb-4"></v-img>
               <v-icon v-else size="50" class="mb-4 text-grey">mdi-layers</v-icon>
               <span class="text-body-1 font-weight-bold tracking-tight text-white">{{ tech.name }}</span>
           </div>
        </v-col>
        <v-col cols="12" class="text-center" v-if="!technologies?.length">
           <p class="text-grey">No technologies added yet.</p>
        </v-col>
     </v-row>
  </v-container>
</template>

<script setup>
defineProps({
    technologies: Array
});
</script>

<style scoped>
.glass-card {
    background: rgba(255, 255, 255, 0.03) !important;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
}
.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.3) !important;
}
.tech-icon-card {
    background: rgba(255,255,255,0.02) !important;
    border: 1px solid rgba(255,255,255,0.05);
}
.tech-icon-card:hover {
    background: rgba(255,255,255,0.05) !important;
    border: 1px solid rgba(99,102,241,0.3);
}
</style>
