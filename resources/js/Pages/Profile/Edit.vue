<template>
    <Head title="Account Settings" />

    <AuthenticatedLayout>
        <template #header>
            Account Settings
        </template>

        <div class="mx-auto max-w-7xl pt-8 pb-12">
            <v-row>
                <v-col cols="12" md="6">
                    <v-card class="glass-card pa-8 rounded-xl border-0 h-100">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl text-white profile-form-override"
                        />
                    </v-card>
                </v-col>

                <v-col cols="12" md="6">
                    <v-card class="glass-card pa-8 rounded-xl border-0 h-100">
                        <UpdatePasswordForm class="max-w-xl text-white profile-form-override" />
                    </v-card>
                </v-col>

                <v-col cols="12">
                    <v-card class="glass-card pa-8 rounded-xl border-0 border-error border-opacity-50 mt-4">
                        <DeleteUserForm class="max-w-xl text-white profile-form-override" />
                    </v-card>
                </v-col>
            </v-row>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<style scoped>
.glass-card { background: rgba(31, 28, 44, 0.4) !important; backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05) !important; box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important; }
</style>
<style>
/* Override tailwind default colors inside the profile forms */
.profile-form-override h2 { color: #fff !important; font-family: 'Outfit', sans-serif !important; font-size: 1.5rem !important; }
.profile-form-override p { color: #aaa !important; }
.profile-form-override label { color: #eee !important; }
.profile-form-override input { background: rgba(0,0,0,0.3) !important; color: white !important; border-color: rgba(255,255,255,0.2) !important; border-radius: 8px !important; }
.profile-form-override input:focus { border-color: #6366f1 !important; box-shadow: 0 0 0 1px #6366f1 !important; }
</style>
