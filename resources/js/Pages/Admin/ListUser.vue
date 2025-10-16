<script setup>
import { ref } from "vue";
import { defineProps } from "vue";
import AdminLayout from "../Layouts/AdminLayout.vue";

const { users } = defineProps({
    users: Array,
});

const showModal = ref(false);
const isEditing = ref(false);

const newUser = ref({
    id: null,
    name: "",
    email: "",
    password: "",
    phone: "",
    role: "customer",
});

const openAddModal = () => {
    isEditing.value = false;
    newUser.value = {
        id: null,
        name: "",
        email: "",
        password: "",
        phone: "",
        role: "customer",
    };
    showModal.value = true;
};

const openEditModal = (user) => {
    isEditing.value = true;
    newUser.value = { ...user };
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

</script>

<template>
    <AdminLayout>
        <div class="p-6 space-y-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Quản lý người dùng</h1>
                <button
                    @click="openAddModal"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                >
                    + Thêm người dùng
                </button>
            </div>

            <table
                class="min-w-full bg-white border border-gray-200 rounded-lg text-gray-800"
            >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Tên</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Vai trò</th>
                        <th class="px-4 py-2 text-left">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="user in users" :key="user.id" class="border-t">
                        <td class="px-4 py-2">{{ user.name }}</td>
                        <td class="px-4 py-2">{{ user.email }}</td>
                        <td class="px-4 py-2 capitalize">{{ user.role }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <button
                                @click="openEditModal(user)"
                                class="bg-yellow-500 text-white px-3 py-1 rounded"
                            >
                                Sửa
                            </button>
                            <button
                                @click="deleteUser(user.id)"
                                class="bg-red-600 text-white px-3 py-1 rounded"
                            >
                                Xóa
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 🧱 Modal -->
        <div
            v-if="showModal"
            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
        >
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
                <h2 class="text-xl font-semibold mb-4">
                    {{ isEditing ? "Sửa người dùng" : "Thêm người dùng" }}
                </h2>

                <div class="space-y-3">
                    <input
                        v-model="newUser.name"
                        placeholder="Tên"
                        class="w-full border rounded p-2"
                    />
                    <input
                        v-model="newUser.email"
                        placeholder="Email"
                        class="w-full border rounded p-2"
                    />
                    <input
                        v-if="!isEditing"
                        type="password"
                        v-model="newUser.password"
                        placeholder="Mật khẩu"
                        class="w-full border rounded p-2"
                    />
                    <input
                        v-model="newUser.phone"
                        placeholder="Số điện thoại"
                        class="w-full border rounded p-2"
                    />
                    <select
                        v-model="newUser.role"
                        class="w-full border rounded p-2"
                    >
                        <option value="customer">Customer</option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                    >
                        Hủy
                    </button>
                    <button
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                    >
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
