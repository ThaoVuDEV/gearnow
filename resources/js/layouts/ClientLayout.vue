<script setup lang="ts">
import ClientNavbar from "../components/client/ClientNavbar.vue";
import ClientFooter from "../components/client/ClientFooter.vue";
</script>

<template>
    <div class="min-h-screen bg-gray-100 font-sans">
        <ClientNavbar />
        <main>
            <slot />
        </main>
        <ClientFooter />
    </div>
</template>