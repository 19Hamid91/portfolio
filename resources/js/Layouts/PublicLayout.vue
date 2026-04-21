<template>
  <v-app theme="dark" class="app-background">
    <!-- Navbar -->
    <Navbar />

    <v-main class="main-content">
      <slot></slot>
    </v-main>

    <!-- Footer -->
    <Footer />
  </v-app>
</template>

<script setup>
import Navbar from '@/Components/Public/Navbar.vue';
import Footer from '@/Components/Public/Footer.vue';
</script>

<style scoped>
.app-background {
  background: radial-gradient(circle at top right, #1f1c2c 0%, #0d1117 40%, #0d1117 100%) !important;
  min-height: 100vh;
}
.main-content {
  position: relative;
  z-index: 1;
}
</style>
