<template>
  <div class="client-layout">
    <ClientNavbar />
    <main>
      <RouterView />
    </main>
    <ClientFooter />
  </div>
</template>

<script setup>
import ClientNavbar from '../components/client/ClientNavbar.vue'
import ClientFooter from '../components/client/ClientFooter.vue'
import { RouterView } from 'vue-router'
</script>
