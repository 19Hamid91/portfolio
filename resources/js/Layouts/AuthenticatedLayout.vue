<template>
  <v-app theme="dark" class="app-background">
    <!-- Sidebar -->
    <AdminSidebar v-model="drawer" />

    <!-- Topbar -->
    <AdminTopbar :user="$page.props.auth.user" @toggle-drawer="drawer = !drawer">
       <template #header v-if="$slots.header">
          <slot name="header"></slot>
       </template>
    </AdminTopbar>

    <v-main class="main-content">
      <v-container fluid class="pa-4 pa-md-8">
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useDisplay } from 'vuetify';
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminTopbar from '@/Components/Admin/AdminTopbar.vue';

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
.main-content {
  position: relative;
  z-index: 1;
}
</style>
