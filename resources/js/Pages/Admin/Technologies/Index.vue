<template>
  <AuthenticatedLayout>
    <Head title="Manage Technologies" />
    <template #header>Technologies Data</template>
    
    <v-row>
       <v-col cols="12" md="4">
            <TechnologyForm />
       </v-col>
       <v-col cols="12" md="8">
            <TechnologyTable :technologies="technologies" />
       </v-col>
    </v-row>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TechnologyForm from '@/Components/Admin/Technologies/TechnologyForm.vue';
import TechnologyTable from '@/Components/Admin/Technologies/TechnologyTable.vue';

defineProps({ technologies: Array });
</script>

<style scoped>
</style>
