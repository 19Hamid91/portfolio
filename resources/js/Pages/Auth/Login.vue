<template>
    <GuestLayout>
        <Head title="Log in" />
        <v-card
            class="bg-brand-surface border border-brand-border pa-8 w-100"
            max-width="450"
        >
            <div class="mb-8">
                <h1 class="font-serif font-black text-3xl mb-2 text-white">H. CMS</h1>
                <p class="text-xs font-mono uppercase tracking-widest text-brand-muted">Administration Login</p>
            </div>

            <div
                v-if="status"
                class="mb-4 font-mono text-xs text-primary"
            >
                {{ status }}
            </div>

            <v-form @submit.prevent="submit">
                <v-text-field
                    v-model="form.email"
                    label="Email Address"
                    type="email"
                    variant="outlined"
                    color="primary"
                    :error-messages="form.errors.email"
                    required
                    autofocus
                    class="font-mono text-xs"
                ></v-text-field>

                <v-text-field
                    v-model="form.password"
                    label="Password"
                    :type="showPassword ? 'text' : 'password'"
                    variant="outlined"
                    color="primary"
                    :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    @click:append-inner="showPassword = !showPassword"
                    :error-messages="form.errors.password"
                    required
                    class="mt-4 font-mono text-xs"
                ></v-text-field>

                <div class="d-flex align-center justify-space-between mt-2 mb-6">
                    <v-checkbox
                        v-model="form.remember"
                        label="Remember me"
                        color="primary"
                        hide-details
                        class="mt-0 font-mono text-xs text-brand-muted"
                    ></v-checkbox>
                </div>

                <v-btn
                    type="submit"
                    block
                    color="primary"
                    size="large"
                    class="font-mono text-xs uppercase tracking-widest text-black hover:bg-primary-hover hover:border-primary-hover"
                    :loading="form.processing"
                    flat
                >
                    Log in &rarr;
                </v-btn>
            </v-form>
        </v-card>
    </GuestLayout>
</template>

<script setup>
    import { ref } from "vue";
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    defineProps({ status: String });

    const showPassword = ref(false);
    const form = useForm({ email: "", password: "", remember: false });
    const submit = () => {
        form.post(route("login"), { onFinish: () => form.reset("password") });
    };
</script>

<style scoped></style>
