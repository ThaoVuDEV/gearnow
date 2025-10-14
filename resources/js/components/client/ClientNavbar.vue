<script setup lang="ts">
import { ref } from "vue";
import { usePage, router } from "@inertiajs/vue3";
import CartFlyout from "./CartFlyout.vue";

const open = ref(false);
const isCartOpen = ref(false);
const page = usePage();
const authUser = page.props.auth;

const logout = () => {
    router.post("/logout");
};

const toggleCart = () => {
    isCartOpen.value = !isCartOpen.value;
};
</script>

<template>
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-2xl transform transition-transform duration-300 group-hover:scale-110">
                        G
                    </div>
                    <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 hidden lg:block">
                        GEARNOW
                    </span>
                </a>

                <div class="flex-1 px-8">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Tìm kiếm sản phẩm..."
                            class="w-full pl-12 pr-4 py-3 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500 transition"
                        />
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-semibold hidden lg:block">Tư vấn cấu hình</span>
                    </a>
                    <button @click="toggleCart" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition relative">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="font-semibold hidden lg:block">Giỏ hàng</span>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center lg:-right-2">3</span>
                    </button>
                    <div class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="font-semibold hidden lg:block">Tài khoản</span>
                        </button>

                        <div v-if="open" @click.away="open = false" class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-xl z-50">
                            <div class="p-2">
                                <div v-if="authUser" class="px-3 py-2 border-b border-gray-200">
                                    <p class="text-sm">Xin chào,</p>
                                    <p class="font-semibold">{{ authUser.name }}</p>
                                </div>

                                <ul v-if="authUser" class="mt-2 text-gray-700">
                                    <li>
                                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                            <span>Đơn hàng của tôi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                            <span>Đã xem gần đây</span>
                                        </a>
                                    </li>
                                    <hr class="my-2 border-gray-100" />
                                    <li>
                                        <button @click="logout" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                            <span>Đăng xuất</span>
                                        </button>
                                    </li>
                                </ul>

                                <div v-else class="flex flex-col space-y-2 mt-4">
                                    <a href="/login" class="w-full px-4 py-2 text-center bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                        Đăng nhập
                                    </a>
                                    <a href="/register" class="w-full px-4 py-2 text-center border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition">
                                        Đăng ký
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <CartFlyout v-if="isCartOpen" @close="isCartOpen = false" /> -->
    </header>
</template>