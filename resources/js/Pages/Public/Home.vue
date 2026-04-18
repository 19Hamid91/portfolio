<template>
  <PublicLayout>
    <Head title="Welcome | Portfolio" />
    
    <!-- Hero Section -->
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
                 <v-btn size="x-large" color="primary" class="rounded-pill px-8 font-weight-bold hover-lift text-none mb-3 mb-sm-0" elevation="8" @click="scrollToProjects">
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

    <!-- Stats & Divider -->
    <div class="bg-surface-variant py-12 mt-10 border-top border-bottom border-white border-opacity-10" style="background: rgba(0,0,0,0.3) !important;">
       <v-container style="max-width: 1200px;">
           <v-row class="text-center">
              <v-col cols="6" md="3" class="mb-4 mb-md-0">
                 <h2 class="text-h3 font-weight-black gradient-text outfit-font">3+</h2>
                 <p class="text-subtitle-1 text-grey font-weight-medium">Years Experience</p>
              </v-col>
              <v-col cols="6" md="3" class="mb-4 mb-md-0">
                 <h2 class="text-h3 font-weight-black gradient-text outfit-font">{{ projects.length }}</h2>
                 <p class="text-subtitle-1 text-grey font-weight-medium">Projects Built</p>
              </v-col>
              <v-col cols="6" md="3">
                 <h2 class="text-h3 font-weight-black gradient-text outfit-font">20+</h2>
                 <p class="text-subtitle-1 text-grey font-weight-medium">Tools & Skills</p>
              </v-col>
              <v-col cols="6" md="3">
                 <h2 class="text-h3 font-weight-black gradient-text outfit-font">100%</h2>
                 <p class="text-subtitle-1 text-grey font-weight-medium">Dedication</p>
              </v-col>
           </v-row>
       </v-container>
    </div>

    <!-- Tech Stack Section -->
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

    <!-- Projects Section -->
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
            <Link :href="'/projects/' + project.slug" class="text-decoration-none h-100 d-block">
                <v-card class="glass-card h-100 rounded-xl d-flex flex-column border-0 project-card" :style="`animation-delay: ${index * 0.1}s`">
                   <div class="thumbnail-wrapper overflow-hidden position-relative" style="height: 280px; border-radius: 20px 20px 0 0;">
                     <v-img :src="project.thumbnail_url || 'https://via.placeholder.com/600x400'" height="280" cover class="thumbnail-img"></v-img>
                     <div class="overlay-grad"></div>
                     <div class="view-btn-overlay">
                        <v-btn color="primary" rounded="pill" class="text-none font-weight-bold" prepend-icon="mdi-eye" size="large">View Details</v-btn>
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
          </v-col>
        </v-row>
        <div v-else class="text-center py-16 glass-card rounded-xl mx-auto" style="max-width: 800px;">
            <v-icon size="80" color="error" class="mb-6 opacity-60">mdi-text-box-search-outline</v-icon>
            <h3 class="text-h4 font-weight-bold text-white outfit-font">No matches found</h3>
            <p class="text-body-1 text-grey-lighten-1 mt-4">Try clearing your filters or selecting different technologies.</p>
        </div>
    </v-container>
    
    <!-- CTA Section -->
    <v-container class="py-16 mb-16" style="max-width: 1000px;">
       <v-card class="glass-card rounded-xl pa-10 pa-md-16 text-center border-primary border-opacity-50 relative overflow-hidden" style="border-width: 1px !important;">
          <div class="blob blob-3"></div>
          <h2 class="text-h3 text-md-h2 font-weight-black text-white outfit-font mb-6 position-relative" style="z-index:2;">Let's Work Together</h2>
          <p class="text-h6 text-grey-lighten-1 mb-10 mx-auto position-relative" style="max-width: 600px; z-index:2; line-height: 1.6;">
             I'm always open to discussing web application design, code architecture, or partnership opportunities. Let's build something awesome.
          </p>
          <v-btn v-if="profile?.email" :href="'mailto:' + profile.email" size="x-large" color="primary" class="rounded-pill px-10 font-weight-bold text-none hover-lift position-relative" style="z-index:2;" prepend-icon="mdi-send">
             Get In Touch
          </v-btn>
       </v-card>
    </v-container>
  </PublicLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    profile: Object,
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
        // We use .every() for strict filtering.
        const projectTechIds = project.technologies.map(t => t.id);
        return selectedTechs.value.every(id => projectTechIds.includes(id));
    });
});

const scrollToProjects = () => {
    document.getElementById('projects-section')?.scrollIntoView({ behavior: 'smooth' });
};
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
.blob-3 {
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 600px; height: 600px;
    background: #4f46e5;
    opacity: 0.2;
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
/* Project Cards */
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
.h-line {
    flex-grow: 1;
    height: 2px;
    margin-left: 30px;
    background: linear-gradient(to right, rgba(99,102,241,0.5), transparent);
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
