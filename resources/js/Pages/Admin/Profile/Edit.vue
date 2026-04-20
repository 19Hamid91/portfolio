<template>
  <AuthenticatedLayout>
    <Head title="Portfolio Profile" />
    <template #header>
        Portfolio Profile
    </template>
    
    <v-card class="glass-card rounded-xl border-0 pa-8 mx-auto" max-width="1000">
        <h3 class="text-h5 font-weight-bold mb-6 text-white outfit-font">Edit Public Profile</h3>
        <v-form @submit.prevent="submit">
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.full_name" label="Full Name" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.full_name"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.email" label="Contact Email" type="email" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.email"></v-text-field>
                </v-col>
                <v-col cols="12">
                    <p class="text-subtitle-2 mb-2 text-grey-lighten-1">Avatar Source (Choose File or URL)</p>
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-file-input v-model="form.avatar" label="Upload Image File" accept="image/*" variant="outlined" color="primary" prepend-inner-icon="mdi-camera" prepend-icon="" :error-messages="form.errors.avatar"></v-file-input>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field v-model="form.avatar_url" label="OR Direct URL" placeholder="https://..." variant="outlined" color="primary" :error-messages="form.errors.avatar_url"></v-text-field>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12">
                    <v-textarea v-model="form.bio" label="Biography / Tagline" rows="4" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.bio"></v-textarea>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.github_url" label="GitHub URL" prepend-inner-icon="mdi-github" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.github_url"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.linkedin_url" label="LinkedIn URL" prepend-inner-icon="mdi-linkedin" variant="outlined" color="primary" bg-color="rgba(0,0,0,0.2)" :error-messages="form.errors.linkedin_url"></v-text-field>
                </v-col>
            </v-row>
            <div class="mt-6 text-right">
                <v-btn type="submit" color="primary" rounded="pill" class="px-8 font-weight-bold" size="large" :loading="form.processing" prepend-icon="mdi-content-save">Save Profile</v-btn>
            </div>
        </v-form>
    </v-card>
  </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps({ profile: Object });
const form = useForm({
    full_name: props.profile?.full_name || '',
    avatar: null,
    avatar_url: props.profile?.avatar_url || '',
    bio: props.profile?.bio || '',
    github_url: props.profile?.github_url || '',
    linkedin_url: props.profile?.linkedin_url || '',
    email: props.profile?.email || ''
});
const submit = () => form.post(route('admin.profile.update'));
</script>
<style scoped>
.glass-card { background: rgba(31, 28, 44, 0.4) !important; backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05) !important; box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important; }
</style>
