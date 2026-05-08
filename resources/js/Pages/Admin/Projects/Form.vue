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
                            <v-file-input v-model="form.thumbnail" label="Upload Thumbnail" accept="image/*" variant="outlined" color="primary" prepend-inner-icon="mdi-image" prepend-icon="" :error-messages="form.errors.thumbnail" bg-color="rgba(0,0,0,0.2)"></v-file-input>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field v-model="form.thumbnail_url" label="Direct URL Image" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.thumbnail_url"></v-text-field>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12">
                    <p class="text-subtitle-2 mb-2 text-grey-lighten-1">Project Overview / Description</p>
                    <div class="editor-container">
                        <QuillEditor 
                            v-model:content="form.description" 
                            content-type="html"
                            theme="snow" 
                            toolbar="essential"
                            placeholder="Describe your project here..."
                        />
                    </div>
                    <div v-if="form.errors.description" class="text-error text-caption mt-1">{{ form.errors.description }}</div>
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
               <v-btn 
                :href="route('admin.projects.index')" 
                variant="outlined" 
                color="primary" 
                rounded="pill" 
                class="mr-4 font-weight-bold text-none px-6"
                >Cancel</v-btn>
                
                <v-btn type="submit" color="primary" rounded="pill" class="px-8 font-weight-bold text-none" size="large" :loading="form.processing" :class="{ 'primary-btn-glow': !form.processing }">{{ isEditing ? 'Update Project' : 'Save Project' }}</v-btn>
            </div>
        </v-form>
    </AdminCard>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminCard from '@/Components/Admin/AdminCard.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

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
.primary-btn-glow {
  border: 1px solid rgba(255, 255, 255, 0.1) !important;
  box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4) !important;
}

.editor-container {
  background: rgba(0,0,0,0.2);
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,0.1);
}

:deep(.ql-toolbar) {
  background: rgba(255,255,255,0.05);
  border: none !important;
  border-bottom: 1px solid rgba(255,255,255,0.1) !important;
}

:deep(.ql-container) {
  border: none !important;
  min-height: 200px;
  font-family: inherit;
  font-size: 1rem;
  color: white;
}

:deep(.ql-editor.ql-blank::before) {
  color: rgba(255,255,255,0.5);
  font-style: normal;
}

:deep(.ql-snow .ql-stroke) {
  stroke: white;
}

:deep(.ql-snow .ql-fill) {
  fill: white;
}

:deep(.ql-snow .ql-picker) {
  color: white;
}

.text-error {
  color: #ff5252;
}
</style>
