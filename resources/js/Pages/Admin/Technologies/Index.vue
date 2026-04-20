<template>
  <AuthenticatedLayout>
    <Head title="Manage Technologies" />
    <template #header>Technologies Data</template>
    
    <v-row>
       <v-col cols="12" md="4">
           <v-card class="glass-card rounded-xl border-0 pa-6 mb-6">
                <h3 class="text-h6 font-weight-bold mb-6 text-white outfit-font">Add New Technology</h3>
                <v-form @submit.prevent="submit">
                    <v-text-field v-model="form.name" label="Technology Name" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.name"></v-text-field>
                    
                    <p class="text-subtitle-2 mb-2 text-grey-lighten-1">Icon Source (Upload or URL)</p>
                    <v-file-input v-model="form.icon" label="Upload Image" accept="image/*" variant="outlined" color="primary" prepend-inner-icon="mdi-image" prepend-icon="" density="compact" :error-messages="form.errors.icon"></v-file-input>
                    <div class="text-center text-caption my-1 text-grey-lighten-1">- OR -</div>
                    <v-text-field v-model="form.icon_url" label="Direct URL (SVG/PNG)" variant="outlined" color="primary" density="compact" :error-messages="form.errors.icon_url"></v-text-field>
                    
                    <v-btn type="submit" color="primary" block rounded="pill" class="font-weight-bold mt-2" :loading="form.processing">Save Protocol</v-btn>
                </v-form>
           </v-card>
       </v-col>
       <v-col cols="12" md="8">
           <v-card class="glass-card rounded-xl border-0 pa-6">
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
                            <td colspan="3" class="text-center py-8 text-grey">No tech listed yet.</td>
                        </tr>
                    </tbody>
                </v-table>
           </v-card>
       </v-col>
    </v-row>
  </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
defineProps({ technologies: Array });

const form = useForm({ name: '', icon: null, icon_url: '' });
const submit = () => {
    form.post(route('admin.technologies.store'), {
        onSuccess: () => form.reset()
    });
};
const deleteItem = (id) => {
    if(confirm('Delete this technology? This removes it from all attached projects.')) {
        router.delete(route('admin.technologies.destroy', id));
    }
};
</script>
<style scoped>
.glass-card { background: rgba(31, 28, 44, 0.4) !important; backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05) !important; box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important; }
</style>
