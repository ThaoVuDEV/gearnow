<template>
    <div class="admin-layout flex h-screen">
        <aside class="relative z-20">
            <Sidebar />
        </aside>

        <main class="flex-1 bg-gray-100 p-6 overflow-y-auto">
            <slot />
        </main>
    </div>
</template>

<script setup>
import Sidebar from "../components/admin/Sidebar.vue";
</script>
