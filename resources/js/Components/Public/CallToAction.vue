<template>
  <v-container class="py-16 mb-16" style="max-width: 1000px;">
     <v-card class="glass-card rounded-xl pa-10 pa-md-16 text-center border-primary border-opacity-50 relative overflow-hidden" style="border-width: 1px !important;">
        <div class="blob blob-3"></div>
        <h2 class="text-h3 text-md-h2 font-weight-black text-white outfit-font mb-6 position-relative" style="z-index:2;">Let's Work Together</h2>
        <p class="text-h6 text-grey-lighten-1 mb-10 mx-auto position-relative" style="max-width: 600px; z-index:2; line-height: 1.6;">
           I'm always open to discussing web application design, code architecture, or partnership opportunities. Let's build something awesome.
        </p>
        <v-btn v-if="email" :href="'mailto:' + email" size="x-large" color="primary" class="rounded-pill px-10 font-weight-bold text-none hover-lift position-relative" style="z-index:2;" prepend-icon="mdi-send">
           Get In Touch
        </v-btn>
     </v-card>
  </v-container>
</template>

<script setup>
defineProps({
    email: String
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
.blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.15;
    z-index: 0;
    pointer-events: none;
}
.blob-3 {
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 600px; height: 600px;
    background: #4f46e5;
    opacity: 0.2;
}
</style>
