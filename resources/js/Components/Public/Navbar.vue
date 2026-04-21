<template>
  <v-app-bar 
    app 
    elevation="0" 
    class="glass-nav px-md-10" 
    height="80"
  >
    <v-toolbar-title class="font-weight-black outfit-font text-h4">
      <Link href="/" class="text-decoration-none logo-text">
        Port<span class="text-primary">folio.</span>
      </Link>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <div v-if="$page.props.auth.user" class="hidden-sm-and-down">
       <Link :href="route('admin.projects.index')" class="text-decoration-none">
          <v-btn variant="outlined" color="primary" rounded="pill" class="px-6 font-weight-bold">
             CMS Dashboard
          </v-btn>
       </Link>
    </div>
  </v-app-bar>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
.glass-nav {
  background: rgba(13, 17, 23, 0.7) !important;
  backdrop-filter: blur(16px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
}
.logo-text {
  background: linear-gradient(to right, #ffffff, #a5b4fc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: all 0.3s ease;
}
.logo-text:hover {
  filter: brightness(1.2);
}
</style>
