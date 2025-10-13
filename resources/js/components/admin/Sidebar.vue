<template>
  <aside class="w-60 bg-gray-800 text-white p-4 h-screen relative z-50">
    <h2 class="text-lg font-bold mb-4">Admin Panel</h2>
    <ul class="space-y-2">
      <li><Link class="hover:text-blue-400" :href="route('dashboard')">Dashboard</Link></li>
      <li><Link class="hover:text-blue-400" :href="route('userManager')">Users</Link></li>
      <li><Link class="hover:text-blue-400" href="/admin/settings">Settings</Link></li>
    </ul>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
</script>
