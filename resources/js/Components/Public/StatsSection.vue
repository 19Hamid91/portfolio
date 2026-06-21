<template>
  <div class="w-full border-b border-brand-border bg-black grid grid-cols-2 md:grid-cols-4">
    <!-- Stat 1 -->
    <div class="p-6 md:p-8 flex flex-col justify-center border-r border-b md:border-b-0 border-brand-border">
       <h2 class="text-3xl md:text-4xl font-mono font-bold text-primary mb-2">3+</h2>
       <p class="text-[10px] font-mono uppercase tracking-widest text-brand-muted">Years Experience</p>
    </div>
    <!-- Stat 2 -->
    <div class="p-6 md:p-8 flex flex-col justify-center md:border-r border-b md:border-b-0 border-brand-border">
       <h2 class="text-3xl md:text-4xl font-mono font-bold text-primary mb-2">{{ projectCount }}</h2>
       <p class="text-[10px] font-mono uppercase tracking-widest text-brand-muted">Projects Built</p>
    </div>
    <!-- Stat 3 -->
    <div class="p-6 md:p-8 flex flex-col justify-center border-r border-brand-border">
       <h2 class="text-3xl md:text-4xl font-mono font-bold text-primary mb-2">{{ techCount }}+</h2>
       <p class="text-[10px] font-mono uppercase tracking-widest text-brand-muted">Tools &amp; Skills</p>
    </div>
    <!-- Stat 4 -->
    <div class="p-6 md:p-8 flex flex-col justify-center">
       <h2 class="text-3xl md:text-4xl font-mono font-bold text-primary mb-2">100%</h2>
       <p class="text-[10px] font-mono uppercase tracking-widest text-brand-muted">Dedication</p>
    </div>
  </div>
</template>

<script setup>
defineProps({
    projectCount: {
        type: Number,
        default: 0
    },
    techCount: {
        type: Number,
        default: 0
    }
});
</script>

<style scoped>
</style>
