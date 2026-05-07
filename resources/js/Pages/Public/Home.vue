<template>
  <PublicLayout>
    <Head title="Welcome | Portfolio" />
    
    <!-- Hero Section -->
    <HeroSection :profile="profile" @scroll-to-projects="scrollToProjects" />

    <!-- Stats & Divider -->
    <StatsSection 
        :projectCount="projects?.length || 0" 
        :techCount="technologies?.length || 0" 
    />

    <!-- Tech Stack Section -->
    <TechStackSection :technologies="technologies" />

    <!-- Projects Section -->
    <div id="projects-section">
        <ProjectGallery :projects="projects" :technologies="technologies" />
    </div>
    
    <!-- CTA Section -->
    <CallToAction :email="profile?.email" />
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';
import HeroSection from '@/Components/Public/HeroSection.vue';
import StatsSection from '@/Components/Public/StatsSection.vue';
import TechStackSection from '@/Components/Public/TechStackSection.vue';
import ProjectGallery from '@/Components/Public/ProjectGallery.vue';
import CallToAction from '@/Components/Public/CallToAction.vue';

defineProps({
    profile: Object,
    projects: Array,
    technologies: Array
});

const scrollToProjects = () => {
    document.getElementById('projects-section')?.scrollIntoView({ behavior: 'smooth' });
};
</script>

<style scoped>
/* Main page level styles if any */
</style>
