<template>
    <GuestLayout>
        <Head title="Log in" />
        <v-card class="glass-card pa-8 rounded-xl border-0 w-100" max-width="450" elevation="24">
            <div class="text-center mb-8">
               <h1 class="font-weight-black outfit-font text-h4 mb-2 logo-text">Port<span class="text-primary">folio.</span></h1>
               <p class="text-grey-lighten-1">Login to CMS Dashboard</p>
            </div>
            
            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <v-form @submit.prevent="submit">
                <v-text-field
                    v-model="form.email"
                    label="Email Address"
                    type="email"
                    variant="outlined"
                    color="primary"
                    bg-color="rgba(0,0,0,0.2)"
                    prepend-inner-icon="mdi-email"
                    :error-messages="form.errors.email"
                    required
                    autofocus
                ></v-text-field>

                <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"
                    variant="outlined"
                    color="primary"
                    bg-color="rgba(0,0,0,0.2)"
                    prepend-inner-icon="mdi-lock"
                    :error-messages="form.errors.password"
                    required
                    class="mt-4"
                ></v-text-field>

                <div class="d-flex align-center justify-space-between mt-2 mb-6">
                    <v-checkbox v-model="form.remember" label="Remember me" color="primary" hide-details class="mt-0"></v-checkbox>
                </div>

                <v-btn
                    type="submit"
                    block
                    color="primary"
                    rounded="pill"
                    size="x-large"
                    class="font-weight-bold tracking-widest text-none primary-btn-glow"
                    :loading="form.processing"
                >
                    Log in
                </v-btn>
            </v-form>
        </v-card>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({ status: String });

const form = useForm({ email: '', password: '', remember: false });
const submit = () => { form.post(route('login'), { onFinish: () => form.reset('password') }); };
</script>

<style scoped>
.glass-card {
  background: rgba(31, 28, 44, 0.6) !important;
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.12) !important;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
}
.primary-btn-glow {
  border: 1px solid rgba(255, 255, 255, 0.1) !important;
  box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4) !important;
}
.logo-text {
  background: linear-gradient(to right, #ffffff, #a5b4fc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
