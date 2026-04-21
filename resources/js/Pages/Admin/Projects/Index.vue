<template>
  <AuthenticatedLayout>
    <Head title="Manage Projects" />
    <template #header>Manage Projects</template>
    
    <AdminCard pa="6">
        <div class="d-flex align-center justify-space-between mb-8">
            <h3 class="text-h5 font-weight-bold text-white outfit-font">All Projects</h3>
            <v-btn color="primary" :href="route('admin.projects.create')" rounded="pill" prepend-icon="mdi-plus" class="font-weight-bold text-none">New Project</v-btn>
        </div>
        
        <v-table theme="dark" class="bg-transparent" hover>
            <thead>
                <tr>
                    <th class="text-left font-weight-bold">Title</th>
                    <th class="text-left font-weight-bold">Slug</th>
                    <th class="text-center font-weight-bold">Tech</th>
                    <th class="text-right font-weight-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in projects" :key="project.id">
                    <td class="py-3 font-weight-medium">{{ project.title }}</td>
                    <td class="py-3 text-grey-lighten-1">{{ project.slug }}</td>
                    <td class="text-center py-3">
                        <v-chip size="small" color="primary" variant="tonal">{{ project.technologies?.length || 0 }}</v-chip>
                    </td>
                    <td class="text-right py-3">
                        <v-btn icon="mdi-pencil" variant="text" color="primary" size="small" :href="route('admin.projects.edit', project.id)"></v-btn>
                        <v-btn icon="mdi-delete" variant="text" color="error" size="small" @click="deleteItem(project.id)"></v-btn>
                    </td>
                </tr>
                <tr v-if="!projects.length">
                    <td colspan="4" class="text-center py-8 text-grey">No projects found. Create one!</td>
                </tr>
            </tbody>
        </v-table>
    </AdminCard>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminCard from '@/Components/Admin/AdminCard.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({ projects: Array });

const deleteItem = (id) => {
    if(confirm('Are you sure you want to delete this project?')) {
        router.delete(route('admin.projects.destroy', id));
    }
};
</script>

<style scoped>
</style>
