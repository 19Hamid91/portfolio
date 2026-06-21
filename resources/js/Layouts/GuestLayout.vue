<template>
  <v-app theme="dark" class="app-background">
      <v-main class="d-flex align-center justify-center min-h-screen">
          <v-container class="d-flex align-center justify-center py-16 px-4">
             <slot />
          </v-container>
      </v-main>
  </v-app>
</template>

<script setup>
</script>

<style scoped>
.app-background {
  background-color: #000000 !important;
  min-height: 100vh;
}
</style>
