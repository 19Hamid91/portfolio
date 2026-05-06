<template>
  <AdminCard>
       <h3 class="text-h6 font-weight-bold mb-6 text-white outfit-font">Add New Technology</h3>
       <v-form @submit.prevent="submit">
           <v-text-field v-model="form.name" label="Technology Name" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.name"></v-text-field>
           
           <p class="text-subtitle-2 mb-2 text-grey-lighten-1">Icon Source (Upload or URL)</p>
           <v-file-input v-model="form.icon" label="Upload Image" accept="image/*" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" prepend-inner-icon="mdi-image" prepend-icon="" density="compact" :error-messages="form.errors.icon"></v-file-input>
           <div class="text-center text-caption my-1 text-grey-lighten-1">- OR -</div>
           <v-text-field v-model="form.icon_url" label="Direct URL (SVG/PNG)" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" density="compact" :error-messages="form.errors.icon_url"></v-text-field>
           
           <v-btn type="submit" color="primary" block rounded="pill" class="font-weight-bold mt-2 primary-btn-glow" :loading="form.processing">Save Technology</v-btn>
       </v-form>
  </AdminCard>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AdminCard from '@/Components/Admin/AdminCard.vue';

const form = useForm({
    name: '',
    icon: null,
    icon_url: ''
});

const submit = () => {
    form.post(route('admin.technologies.store'), {
        onSuccess: () => form.reset()
    });
};
</script>

<style scoped>
.primary-btn-glow {
  border: 1px solid rgba(255, 255, 255, 0.1) !important;
  box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4) !important;
}
</style>
