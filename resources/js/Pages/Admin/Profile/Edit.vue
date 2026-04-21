<template>
  <AuthenticatedLayout>
    <Head title="Portfolio Profile" />
    <template #header>
        Portfolio Profile
    </template>
    
    <AdminCard max-width="1000" class="mx-auto" pa="8">
        <h3 class="text-h5 font-weight-bold mb-6 text-white outfit-font">Edit Public Profile</h3>
        <ProfileForm :profile="profile" />
    </AdminCard>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminCard from '@/Components/Admin/AdminCard.vue';
import ProfileForm from '@/Components/Admin/Profile/ProfileForm.vue';

defineProps({ 
    profile: Object 
});
</script>

<style scoped>
/* Scoped styles moved to AdminCard component */
</style>
