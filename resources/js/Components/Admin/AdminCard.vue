<template>
  <v-card class="glass-card rounded-xl border-0" :class="paClass" :max-width="maxWidth">
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
.glass-card { 
    background: rgba(31, 28, 44, 0.4) !important; 
    backdrop-filter: blur(12px); 
    border: 1px solid rgba(255, 255, 255, 0.12) !important; 
    box-shadow: 0 20px 40px rgba(0,0,0,0.4) !important; 
}
</style>
