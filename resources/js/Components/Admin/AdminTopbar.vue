<template>
  <v-app-bar elevation="0" class="glass-nav px-4">
    <v-app-bar-nav-icon @click="$emit('toggle-drawer')" class="d-lg-none"></v-app-bar-nav-icon>
    
    <v-app-bar-title class="font-weight-bold outfit-font text-h5 text-white hidden-sm-and-down">
       <slot name="header"></slot>
    </v-app-bar-title>
    
    <v-spacer></v-spacer>
    
    <div class="d-flex align-center gap-4">
        <span class="font-weight-medium text-body-2 text-grey-lighten-1 hidden-sm-and-down">{{ user.name }}</span>
        
        <v-menu offset-y transition="slide-y-transition" rounded="xl">
          <template v-slot:activator="{ props }">
            <v-btn icon v-bind="props" variant="tonal" color="primary" class="bg-surface-variant">
              <v-icon>mdi-account</v-icon>
            </v-btn>
          </template>
          <v-card class="glass-card mt-2 border-0" min-width="200" elevation="10">
            <v-list bg-color="transparent" class="pa-2">
              <Link :href="route('account.edit')" class="text-decoration-none text-white">
                 <v-list-item prepend-icon="mdi-cog" title="Settings" rounded="lg" class="hover-lift"></v-list-item>
              </Link>
              <v-divider class="my-2 border-opacity-25"></v-divider>
              <Link :href="route('logout')" method="post" as="button" class="text-decoration-none w-100 text-left text-error">
                 <v-list-item prepend-icon="mdi-logout" title="Logout" rounded="lg" class="hover-lift text-error"></v-list-item>
              </Link>
            </v-list>
          </v-card>
        </v-menu>
    </div>
  </v-app-bar>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    user: Object
});

defineEmits(['toggle-drawer']);
</script>

<style scoped>
.glass-nav {
  background: rgba(13, 17, 23, 0.7) !important;
  backdrop-filter: blur(16px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
}
.glass-card {
  background: rgba(31, 28, 44, 0.9) !important;
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.15) !important;
}
.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.hover-lift:hover {
    transform: translateX(4px);
    background: rgba(99, 102, 241, 0.1) !important;
}
</style>
