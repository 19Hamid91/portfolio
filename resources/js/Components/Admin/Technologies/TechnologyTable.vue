<template>
  <AdminCard>
       <v-table theme="dark" class="bg-transparent" hover>
           <thead>
               <tr>
                   <th class="text-left font-weight-bold" width="60">Icon</th>
                   <th class="text-left font-weight-bold">Name</th>
                   <th class="text-right font-weight-bold">Actions</th>
               </tr>
           </thead>
           <tbody>
               <tr v-for="tech in technologies" :key="tech.id">
                   <td class="py-3">
                       <v-avatar size="32" class="bg-white pa-1"><v-img v-if="tech.icon_url" :src="tech.icon_url"></v-img></v-avatar>
                   </td>
                   <td class="py-3 font-weight-medium">{{ tech.name }}</td>
                   <td class="text-right py-3">
                       <v-btn icon="mdi-delete" variant="text" color="error" size="small" @click="deleteItem(tech.id)"></v-btn>
                   </td>
               </tr>
               <tr v-if="!technologies.length">
                   <td colspan="3" class="text-center py-8 text-grey">No technologies found.</td>
               </tr>
           </tbody>
       </v-table>
  </AdminCard>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import AdminCard from '@/Components/Admin/AdminCard.vue';

defineProps({
    technologies: Array
});

const deleteItem = (id) => {
    if(confirm('Delete this technology? This removes it from all attached projects.')) {
        router.delete(route('admin.technologies.destroy', id));
    }
};
</script>

<style scoped>
</style>
