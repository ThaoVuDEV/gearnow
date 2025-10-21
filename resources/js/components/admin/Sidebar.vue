<template>
  <aside class="w-64 bg-gray-900 text-gray-300 flex flex-col h-screen fixed z-50">
    <div class="h-20 flex items-center justify-center border-b border-gray-800">
      <h1 class="text-2xl font-bold text-white">Admin</h1>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-2">
      <Link :href="route('dashboard')" 
            class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200"
            :class="{
              'bg-blue-600 text-white': route().current('dashboard'),
              'text-gray-400 hover:bg-gray-800 hover:text-white': !route().current('dashboard')
            }">
        <span class="mr-3">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
        </span>
        <span class="font-medium">Dashboard</span>
      </Link>

      <Link :href="route('userManager')" 
            class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200"
            :class="{
              'bg-blue-600 text-white': route().current('userManager'),
              'text-gray-400 hover:bg-gray-800 hover:text-white': !route().current('userManager')
            }">
        <span class="mr-3">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 21a6 6 0 006-6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197" />
          </svg>
        </span>
        <span class="font-medium">Users</span>
      </Link>

      <Link :href="route('categoryManager')" 
            class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200"
            :class="{
              'bg-blue-600 text-white': route().current('categoryManager') || route().current('createCategory') || route().current('editCategory'),
              'text-gray-400 hover:bg-gray-800 hover:text-white': !(route().current('categoryManager') || route().current('createCategory') || route().current('editCategory'))
            }">
        <span class="mr-3">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h5zm0 0v11a2 2 0 002 2h5a2 2 0 002-2V5a2 2 0 00-2-2h-5a2 2 0 00-2 2z" />
          </svg>
        </span>
        <span class="font-medium">Categories</span>
      </Link>

      <Link :href="route('productManager')" 
            class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200"
            :class="{
              'bg-blue-600 text-white': route().current('productManager') || route().current('createProduct') || route().current('editProduct'),
              'text-gray-400 hover:bg-gray-800 hover:text-white': !(route().current('productManager') || route().current('createProduct') || route().current('editProduct'))
            }">
        <span class="mr-3">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
        </span>
        <span class="font-medium">Products</span>
      </Link>

      <Link href="#" 
            class="flex items-center px-4 py-2.5 rounded-lg transition-colors duration-200 text-gray-400 hover:bg-gray-800 hover:text-white">
        <span class="mr-3">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </span>
        <span class="font-medium">Settings</span>
      </Link>
    </nav>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
</script>
