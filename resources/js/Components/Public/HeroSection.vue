<template>
  <v-container class="hero-container d-flex align-center justify-center relative px-4" fluid>
    <!-- Decorative blurred circles in background -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    
    <v-row align="center" justify="space-between" style="max-width: 1400px; width: 100%; z-index: 10;">
       <v-col cols="12" md="7" lg="6" class="text-center text-md-left pr-md-10">
           <v-chip class="mb-6 px-4 py-2 font-weight-bold mx-auto mx-md-0" color="primary" variant="tonal" size="large">
              <v-icon start icon="mdi-rocket-launch" class="mr-2"></v-icon>
              Available for new opportunities
           </v-chip>
           
           <h1 class="text-h2 text-md-h1 font-weight-black mb-4 text-white outfit-font" style="line-height: 1.1;">
             Hi, I'm <br />
             <span class="gradient-text">{{ profile?.full_name || 'Anonymous' }}</span>
           </h1>
           
           <p class="text-h6 text-grey-lighten-1 mb-10 mx-auto mx-md-0" style="line-height: 1.8; max-width: 600px;">
             {{ profile?.bio || 'Crafting digital experiences with modern web technologies. Transforming ideas into elegant interfaces and scalable robust backends.' }}
           </p>
           
           <div class="d-flex flex-wrap gap-4 justify-center justify-md-start">
              <v-btn size="x-large" color="primary" class="rounded-pill px-8 font-weight-bold hover-lift text-none mb-3 mb-sm-0" elevation="8" @click="$emit('scroll-to-projects')">
                 Explore My Work <v-icon end>mdi-arrow-down</v-icon>
              </v-btn>
              <div class="d-flex gap-3">
                 <v-btn v-if="profile?.github_url" :href="profile.github_url" target="_blank" icon="mdi-github" size="large" variant="outlined" color="white" class="glass-btn hover-lift"></v-btn>
                 <v-btn v-if="profile?.linkedin_url" :href="profile.linkedin_url" target="_blank" icon="mdi-linkedin" size="large" variant="outlined" color="primary" class="glass-btn hover-lift"></v-btn>
                 <v-btn v-if="profile?.email" :href="'mailto:' + profile.email" icon="mdi-email" size="large" variant="outlined" color="white" class="glass-btn hover-lift"></v-btn>
              </div>
           </div>
       </v-col>
       
       <v-col cols="12" md="5" lg="6" class="text-center mt-16 mt-md-0 position-relative">
          <div class="avatar-showcase mx-auto">
              <div class="halo-ring halo-1"></div>
              <div class="halo-ring halo-2"></div>
              <v-avatar size="320" class="elevation-24 avatar-image" style="border: 8px solid rgba(255,255,255,0.1);">
                <v-img :src="profile?.avatar_url || 'https://api.dicebear.com/7.x/avataaars/svg?seed=Felix'" alt="Avatar" cover></v-img>
              </v-avatar>
              <!-- Floating tech badges -->
              <div class="floating-badge badge-1 glass-card px-4 py-2 rounded-pill d-flex align-center gap-2">
                  <v-icon color="success">mdi-check-decagram</v-icon> Full-Stack
              </div>
              <div class="floating-badge badge-2 glass-card px-4 py-2 rounded-pill d-flex align-center gap-2">
                  <v-icon color="primary">mdi-code-braces</v-icon> Laravel + Vue
              </div>
          </div>
       </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
defineProps({
    profile: Object
});

defineEmits(['scroll-to-projects']);
</script>

<style scoped>
.hero-container {
    min-height: 90vh;
}
.gradient-text {
    background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.glass-btn {
    background: rgba(255, 255, 255, 0.05) !important;
    backdrop-filter: blur(10px);
}
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
/* Background Blobs */
.blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.15;
    z-index: 0;
    pointer-events: none;
}
.blob-1 {
    top: 5%; left: -5%;
    width: 500px; height: 500px;
    background: #4f46e5;
}
.blob-2 {
    bottom: -10%; right: -5%;
    width: 600px; height: 600px;
    background: #10b981;
}
/* Avatar Showcase */
.avatar-showcase {
    position: relative;
    width: fit-content;
}
.halo-ring {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    border: 1px solid rgba(99, 102, 241, 0.3);
    z-index: 0;
}
.halo-1 {
    width: 380px; height: 380px;
    animation: rotate 20s linear infinite;
    border-style: dashed;
}
.halo-2 {
    width: 440px; height: 440px;
    animation: rotate 30s linear infinite reverse;
}
@keyframes rotate {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}
.floating-badge {
    position: absolute;
    z-index: 10;
    font-weight: 600;
    font-size: 0.9rem;
    color: white;
    box-shadow: 0 10px 20px rgba(0,0,0,0.3) !important;
}
.badge-1 {
    top: 10%; left: -10%;
    animation: float 4s ease-in-out infinite;
}
.badge-2 {
    bottom: 15%; right: -15%;
    animation: float 5s ease-in-out infinite reverse;
}
@keyframes float {
    0% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(2deg); }
    100% { transform: translateY(0px) rotate(0deg); }
}
</style>
