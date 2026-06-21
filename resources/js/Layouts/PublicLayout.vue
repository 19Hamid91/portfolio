<template>
  <div class="min-h-screen bg-black text-white flex flex-col font-sans selection:bg-white selection:text-black">
    <!-- Navbar -->
    <Navbar />

    <main class="flex-grow flex flex-col">
      <slot></slot>
    </main>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import Navbar from '@/Components/Public/Navbar.vue';
import Footer from '@/Components/Public/Footer.vue';
</script>

<style scoped>
/* Scoped overrides if needed */
</style>
