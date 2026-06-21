<template>
  <v-app-bar elevation="0" class="bg-black border-b border-brand-border px-4">
    <v-app-bar-nav-icon @click="$emit('toggle-drawer')" class="d-lg-none text-white"></v-app-bar-nav-icon>
    
    <v-app-bar-title class="font-serif font-black text-xl text-white hidden-sm-and-down">
       <slot name="header"></slot>
     </v-app-bar-title>
     
     <v-spacer></v-spacer>
     
     <div class="d-flex align-center gap-4">
         <span class="font-mono text-xs text-brand-muted uppercase tracking-wider hidden-sm-and-down">{{ user.name }}</span>
         
         <v-menu offset-y transition="slide-y-transition">
           <template v-slot:activator="{ props }">
             <v-btn icon v-bind="props" variant="outlined" class="border border-brand-border text-white">
               <v-icon>mdi-account</v-icon>
             </v-btn>
           </template>
           <v-card class="bg-black border border-brand-border mt-2 rounded-none" min-width="200">
             <v-list bg-color="transparent" class="pa-2">
               <Link :href="route('account.edit')" class="no-underline text-white">
                  <v-list-item title="Settings" class="text-xs font-mono uppercase tracking-widest text-brand-muted hover:text-white hover:bg-brand-subtle transition-colors"></v-list-item>
               </Link>
               <v-divider class="my-2 border-brand-border"></v-divider>
               <Link :href="route('logout')" method="post" as="button" class="no-underline w-full text-left text-red-500">
                  <v-list-item title="Logout" class="text-xs font-mono uppercase tracking-widest text-red-500 hover:bg-brand-subtle transition-colors"></v-list-item>
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
</style>
