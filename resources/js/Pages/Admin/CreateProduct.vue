<template>
  <AdminLayout>
    <h1 class="text-2xl font-bold mb-4">Create Product</h1>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" v-model="form.name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
        <input type="text" v-model="form.slug" id="slug" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <select v-model="form.category_id" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea v-model="form.description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
          <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
          <input type="number" v-model="form.price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
          <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
          <input type="number" v-model="form.discount" id="discount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
          <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
          <input type="number" v-model="form.stock" id="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
      </div>
      <div class="flex items-center justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Save
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'

defineProps({
  categories: Array,
})

const form = useForm({
  name: '',
  slug: '',
  category_id: null,
  description: '',
  price: 0,
  discount: 0,
  stock: 0,
})

const submit = () => {
  form.post(route('storeProduct'))
}
</script>
