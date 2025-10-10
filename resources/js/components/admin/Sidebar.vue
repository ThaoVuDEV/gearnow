<template>
    <aside class="w-60 bg-gray-800 text-white p-4 h-screen">
        <h2 class="text-lg font-bold mb-4">Admin Panel</h2>
        <ul>
            <li><RouterLink to="/admin">Dashboard</RouterLink></li>
            <li><RouterLink to="/admin/users">Users</RouterLink></li>
            <li><RouterLink to="/admin/settings">Settings</RouterLink></li>
        </ul>
    </aside>
</template>

<script setup></script>
