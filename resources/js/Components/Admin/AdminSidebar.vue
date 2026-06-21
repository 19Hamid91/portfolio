<template>
    <v-navigation-drawer
        v-model="drawerModel"
        class="bg-black border-r border-brand-border"
        width="280"
    >
        <!-- Header Logo -->
        <div class="p-4 mt-1 text-center border-b border-brand-border">
            <Link
                href="/"
                class="text-xl font-serif font-black tracking-tight text-white hover:opacity-80 transition-opacity"
            >
                H. CMS
            </Link>
        </div>

        <!-- Navigation List -->
        <div class="p-4 space-y-2">
            <!-- Projects -->
            <Link
                :href="route('admin.projects.index')"
                class="no-underline block"
            >
                <div
                    :class="[
                        'px-4 py-3 text-xs font-mono uppercase tracking-widest border transition-all duration-100 cursor-pointer',
                        route().current('admin.projects.*') ? 'bg-primary text-black border-primary font-bold' : 'bg-transparent text-brand-muted border-transparent hover:text-primary hover:border-brand-border',
                    ]"
                >
                    Projects
                </div>
            </Link>

            <!-- Technologies -->
            <Link
                :href="route('admin.technologies.index')"
                class="no-underline block"
            >
                <div
                    :class="[
                        'px-4 py-3 text-xs font-mono uppercase tracking-widest border transition-all duration-100 cursor-pointer',
                        route().current('admin.technologies.*') ? 'bg-primary text-black border-primary font-bold' : 'bg-transparent text-brand-muted border-transparent hover:text-primary hover:border-brand-border',
                    ]"
                >
                    Technologies
                </div>
            </Link>

            <!-- Profile -->
            <Link
                :href="route('admin.profile.edit')"
                class="no-underline block"
            >
                <div
                    :class="[
                        'px-4 py-3 text-xs font-mono uppercase tracking-widest border transition-all duration-100 cursor-pointer',
                        route().current('admin.profile.*') ? 'bg-primary text-black border-primary font-bold' : 'bg-transparent text-brand-muted border-transparent hover:text-primary hover:border-brand-border',
                    ]"
                >
                    Portfolio Profile
                </div>
            </Link>
        </div>

        <!-- Footer Link -->
        <div class="p-4 absolute bottom-0 w-full border-t border-brand-border bg-brand-surface">
            <Link
                href="/"
                class="no-underline block"
            >
                <div class="border border-brand-border text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-primary hover:border-primary px-4 py-3 text-center transition-all duration-100 cursor-pointer">
                    View Public Site &rarr;
                </div>
            </Link>
        </div>
    </v-navigation-drawer>
</template>

<script setup>
    import { computed } from "vue";
    import { Link } from "@inertiajs/vue3";

    const props = defineProps({
        modelValue: Boolean,
    });

    const emit = defineEmits(["update:modelValue"]);

    const drawerModel = computed({
        get: () => props.modelValue,
        set: (val) => emit("update:modelValue", val),
    });
</script>

<style scoped></style>
