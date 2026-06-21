<template>
  <v-card class="bg-brand-surface border border-brand-border rounded-none" :class="paClass" :max-width="maxWidth">
    <slot />
  </v-card>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    pa: {
        type: [String, Number],
        default: 6
    },
    maxWidth: {
        type: [String, Number],
        default: null
    }
});

const paClass = computed(() => {
    return `pa-${props.pa}`;
});
</script>

<style scoped>
</style>
