<template>
  <div class="bg-surface-variant py-12 mt-10 border-top border-bottom border-white border-opacity-20" style="background: rgba(0,0,0,0.3) !important;">
     <v-container style="max-width: 1200px;">
         <v-row class="text-center">
            <v-col cols="6" md="3" class="mb-4 mb-md-0">
               <h2 class="text-h3 font-weight-black gradient-text outfit-font">3+</h2>
               <p class="text-subtitle-1 text-grey font-weight-medium">Years Experience</p>
            </v-col>
            <v-col cols="6" md="3" class="mb-4 mb-md-0">
               <h2 class="text-h3 font-weight-black gradient-text outfit-font">{{ projectCount }}</h2>
               <p class="text-subtitle-1 text-grey font-weight-medium">Projects Built</p>
            </v-col>
            <v-col cols="6" md="3">
               <h2 class="text-h3 font-weight-black gradient-text outfit-font">20+</h2>
               <p class="text-subtitle-1 text-grey font-weight-medium">Tools & Skills</p>
            </v-col>
            <v-col cols="6" md="3">
               <h2 class="text-h3 font-weight-black gradient-text outfit-font">100%</h2>
               <p class="text-subtitle-1 text-grey font-weight-medium">Dedication</p>
            </v-col>
         </v-row>
     </v-container>
  </div>
</template>

<script setup>
defineProps({
    projectCount: {
        type: Number,
        default: 0
    }
});
</script>

<style scoped>
.gradient-text {
    background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
