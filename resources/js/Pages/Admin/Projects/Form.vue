<template>
  <AuthenticatedLayout>
    <Head :title="isEditing ? 'Edit Project' : 'New Project'" />
    <template #header>{{ isEditing ? 'Edit Project' : 'New Project' }}</template>

    <AdminCard pa="8" maxWidth="1000" class="mx-auto">
        <h3 class="text-h5 font-weight-bold mb-6 text-white outfit-font">{{ isEditing ? 'Edit' : 'Create' }} Project details</h3>
        
        <v-form @submit.prevent="submit">
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.title" label="Project Title" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.title"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.web_link" label="Live Web Link" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.web_link"></v-text-field>
                </v-col>
                <v-col cols="12">
                    <p class="text-subtitle-2 mb-2 text-grey-lighten-1">Thumbnail Source (Choose File or URL)</p>
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-file-input v-model="form.thumbnail" label="Upload Thumbnail" accept="image/*" variant="outlined" color="primary" prepend-inner-icon="mdi-image" prepend-icon="" :error-messages="form.errors.thumbnail"></v-file-input>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field v-model="form.thumbnail_url" label="OR Direct URL" placeholder="https://..." variant="outlined" color="primary" :error-messages="form.errors.thumbnail_url"></v-text-field>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12">
                    <v-textarea v-model="form.description" label="Project Overview / Description" rows="6" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.description"></v-textarea>
                </v-col>
                <v-col cols="12">
                     <v-select 
                        v-model="form.technologies" 
                        :items="technologies" 
                        item-title="name" 
                        item-value="id" 
                        label="Technologies Used" 
                        multiple 
                        chips 
                        variant="outlined"
                        color="primary"
                        bg-color="rgba(0,0,0,0.2)"
                        :error-messages="form.errors.technologies"
                     ></v-select>
                </v-col>
            </v-row>
            <div class="mt-6 text-right">
                <v-btn :href="route('admin.projects.index')" variant="text" color="grey-lighten-1" class="mr-4 text-none">Cancel</v-btn>
                <v-btn type="submit" color="primary" rounded="pill" class="px-8 font-weight-bold text-none" size="large" :loading="form.processing" prepend-icon="mdi-content-save">Save Project</v-btn>
            </div>
        </v-form>
    </AdminCard>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminCard from '@/Components/Admin/AdminCard.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({ project: Object, technologies: Array });
const isEditing = !!props.project?.id;

const form = useForm({
    title: props.project?.title || '',
    description: props.project?.description || '',
    thumbnail: null,
    thumbnail_url: props.project?.thumbnail_url || '',
    web_link: props.project?.web_link || '',
    technologies: props.project?.technologies ? props.project.technologies.map(t => t.id) : []
});

const submit = () => {
    if(isEditing) {
        form.transform((data) => ({
            ...data,
            _method: 'put'
        })).post(route('admin.projects.update', props.project.id));
    } else {
        form.post(route('admin.projects.store'));
    }
};
</script>

<style scoped>
</style>
