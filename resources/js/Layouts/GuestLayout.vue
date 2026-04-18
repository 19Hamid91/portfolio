<template>
  <v-app theme="dark" class="app-background">
      <v-main class="d-flex align-center justify-center pt-md-16">
         <div class="blob blob-1"></div>
         <div class="blob blob-2"></div>
         <v-container class="d-flex align-center justify-center p-0" style="z-index: 10;">
            <slot />
         </v-container>
      </v-main>
  </v-app>
</template>

<style scoped>
.app-background {
  background: radial-gradient(circle at top right, #1f1c2c 0%, #0d1117 40%, #0d1117 100%) !important;
  min-height: 100vh;
  position: relative;
  overflow: hidden;
}
.blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.2;
    z-index: 0;
    pointer-events: none;
}
.blob-1 { top: -10%; left: -10%; width: 500px; height: 500px; background: #4f46e5; }
.blob-2 { bottom: -10%; right: -10%; width: 600px; height: 600px; background: #10b981; }
</style>
