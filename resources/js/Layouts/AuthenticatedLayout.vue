<template>
  <v-app theme="dark" class="app-background">
    
    <v-navigation-drawer v-model="drawer" class="glass-drawer border-0" elevation="10" width="280">
      <div class="pa-6 text-center">
         <h2 class="font-weight-black outfit-font text-h5 mb-1 logo-text">Port<span class="text-primary">folio.</span> CMS</h2>
      </div>
      
      <v-divider class="mb-4 border-opacity-25"></v-divider>
      
      <v-list class="px-3" nav>
        <Link :href="route('admin.projects.index')" class="text-decoration-none text-white">
          <v-list-item
            prepend-icon="mdi-rocket-launch"
            title="Projects"
            :active="route().current('admin.projects.*')"
            color="primary"
            rounded="xl"
            class="mb-2 hover-lift font-weight-medium"
          ></v-list-item>
        </Link>
        <Link :href="route('admin.technologies.index')" class="text-decoration-none text-white">
          <v-list-item
            prepend-icon="mdi-layers"
            title="Technologies"
            :active="route().current('admin.technologies.*')"
            color="primary"
            rounded="xl"
            class="mb-2 hover-lift font-weight-medium"
          ></v-list-item>
        </Link>
        <Link :href="route('admin.profile.edit')" class="text-decoration-none text-white">
          <v-list-item
            prepend-icon="mdi-account-circle"
            title="Portfolio Profile"
            :active="route().current('admin.profile.*')"
            color="primary"
            rounded="xl"
            class="mb-2 hover-lift font-weight-medium"
          ></v-list-item>
        </Link>
      </v-list>
      
      <div class="pa-4 position-absolute text-center w-100" style="bottom: 0;">
          <Link href="/" class="text-decoration-none w-100">
             <v-btn block variant="tonal" rounded="pill" color="primary" class="font-weight-bold hover-lift text-none" prepend-icon="mdi-web">
                View Public Site
             </v-btn>
          </Link>
      </div>
    </v-navigation-drawer>

    <v-app-bar elevation="0" class="glass-nav px-4">
      <v-app-bar-nav-icon @click="drawer = !drawer" class="d-lg-none"></v-app-bar-nav-icon>
      
      <v-app-bar-title v-if="$slots.header" class="font-weight-bold outfit-font text-h5 text-white hidden-sm-and-down">
         <slot name="header"></slot>
      </v-app-bar-title>
      
      <v-spacer></v-spacer>
      
      <div class="d-flex align-center gap-4">
          <span class="font-weight-medium text-body-2 text-grey-lighten-1 hidden-sm-and-down">{{ $page.props.auth.user.name }}</span>
          
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

    <v-main class="main-content">
      <v-container fluid class="pa-4 pa-md-8">
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

import { onMounted } from 'vue';
import { useDisplay } from 'vuetify';
const { lgAndUp } = useDisplay();

const drawer = ref(true);

onMounted(() => {
    if (!lgAndUp.value) {
        drawer.value = false;
    }
});
</script>

<style scoped>
.app-background {
  background: radial-gradient(circle at top left, #1f1c2c 0%, #0d1117 40%, #0d1117 100%) !important;
  min-height: 100vh;
}
.glass-nav {
  background: rgba(13, 17, 23, 0.7) !important;
  backdrop-filter: blur(16px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
}
.glass-drawer {
  background: rgba(13, 17, 23, 0.6) !important;
  backdrop-filter: blur(20px);
  border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
}
.glass-card {
  background: rgba(31, 28, 44, 0.9) !important;
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.05) !important;
}
.logo-text {
  background: linear-gradient(to right, #ffffff, #a5b4fc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.hover-lift {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.hover-lift:hover {
    transform: translateX(4px);
    background: rgba(99, 102, 241, 0.1) !important;
}
</style>
