<template>
  <AdminLayout>
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Product Management</h1>
      <Link :href="route('createProduct')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create Product
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
              Price
            </th>
            <th scope="col" class="px-6 py-3">
              Stock
            </th>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ product.name }}
            </th>
            <td class="px-6 py-4">
              {{ product.price }}
            </td>
            <td class="px-6 py-4">
              {{ product.stock }}
            </td>
            <td class="px-6 py-4 text-right">
              <Link :href="route('editProduct', product.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</Link>
              <button @click="destroy(product.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
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
  products: Array,
})

const destroy = (id) => {
  if (confirm('Are you sure you want to delete this product?')) {
    router.delete(route('destroyProduct', id))
  }
}
</script>
