<template>
    <GuestLayout>
        <Head title="Register" />
        <v-card class="glass-card pa-8 rounded-xl border-0 w-100" max-width="500" elevation="24">
            <div class="text-center mb-8">
               <h1 class="font-weight-black outfit-font text-h4 mb-2 logo-text">Port<span class="text-primary">folio.</span></h1>
               <p class="text-grey-lighten-1">Create an account</p>
            </div>

            <v-form @submit.prevent="submit">
                <v-text-field
                    v-model="form.name" label="Name" variant="outlined" color="primary"
                    prepend-inner-icon="mdi-account" :error-messages="form.errors.name" required autofocus
                ></v-text-field>

                <v-text-field
                    v-model="form.email" label="Email Address" type="email" variant="outlined" color="primary"
                    prepend-inner-icon="mdi-email" :error-messages="form.errors.email" required class="mt-4"
                ></v-text-field>

                <v-text-field
                    v-model="form.password" label="Password" type="password" variant="outlined" color="primary"
                    prepend-inner-icon="mdi-lock" :error-messages="form.errors.password" required class="mt-4"
                ></v-text-field>

                <v-text-field
                    v-model="form.password_confirmation" label="Confirm Password" type="password" variant="outlined" color="primary"
                    prepend-inner-icon="mdi-lock-check" :error-messages="form.errors.password_confirmation" required class="mt-4"
                ></v-text-field>

                <div class="d-flex align-center justify-end mt-4 mb-6">
                    <Link :href="route('login')" class="text-primary text-decoration-none text-subtitle-1 hover-underline">Already registered?</Link>
                </div>

                <v-btn type="submit" block color="primary" rounded="pill" size="x-large" class="font-weight-bold tracking-widest text-none" :loading="form.processing">Register</v-btn>
            </v-form>
        </v-card>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({ name: '', email: '', password: '', password_confirmation: '' });
const submit = () => { form.post(route('register'), { onFinish: () => form.reset('password', 'password_confirmation') }); };
</script>

<style scoped>
.hover-underline:hover { text-decoration: underline !important; }
.glass-card { background: rgba(31, 28, 44, 0.7) !important; backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.05) !important; }
.logo-text { background: linear-gradient(to right, #ffffff, #a5b4fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>
