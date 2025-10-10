<template>
  <div class="admin-layout flex">
    <Sidebar />
    <div class="flex-1">
      <AdminNavbar />
      <main class="p-4">
        <RouterView />
      </main>
    </div>
  </div>
</template>

<script setup>
import Sidebar from '../components/admin/Sidebar.vue'
import AdminNavbar from '../components/admin/AdminNavbar.vue'
</script>
