<template>
  <AdminLayout>
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Category Management</h1>
      <Link :href="route('createCategory')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create Category
      </Link>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Name
            </th>
            <th scope="col" class="px-6 py-3">
              Slug
            </th>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ category.name }}
            </th>
            <td class="px-6 py-4">
              {{ category.slug }}
            </td>
            <td class="px-6 py-4 text-right">
              <Link :href="route('editCategory', category.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</Link>
              <button @click="destroy(category.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineProps({
  categories: Array,
})

const destroy = (id) => {
  if (confirm('Are you sure you want to delete this category?')) {
    router.delete(route('destroyCategory', id))
  }
}
</script>
