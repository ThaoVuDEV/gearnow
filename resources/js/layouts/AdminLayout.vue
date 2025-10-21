<template>
  <div class="min-h-screen bg-gray-100">
    <Sidebar />
    <main class="ml-64 p-8">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Sidebar from "../components/admin/Sidebar.vue";
</script>
