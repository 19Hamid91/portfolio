<template>
  <v-navigation-drawer v-model="drawerModel" class="glass-drawer border-0" elevation="10" width="280">
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
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    modelValue: Boolean
});

const emit = defineEmits(['update:modelValue']);

const drawerModel = computed({
    get: () => props.modelValue,
    set: (val) => emit('update:modelValue', val)
});
</script>

<style scoped>
.glass-drawer {
  background: rgba(13, 17, 23, 0.6) !important;
  backdrop-filter: blur(20px);
  border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
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
