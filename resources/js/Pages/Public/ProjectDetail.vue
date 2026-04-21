<template>
  <PublicLayout>
    <Head :title="project.title + ' | Portfolio'" />
    
    <!-- Hero Banner for Project -->
    <ProjectDetailHero :title="project.title" :thumbnailUrl="project.thumbnail_url" />

    <!-- Project Content -->
    <ProjectDetailContent :project="project" />
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';
import ProjectDetailHero from '@/Components/Public/ProjectDetailHero.vue';
import ProjectDetailContent from '@/Components/Public/ProjectDetailContent.vue';

defineProps({
    project: Object
});
</script>

<style scoped>
/* Page level styles if any */
</style>
