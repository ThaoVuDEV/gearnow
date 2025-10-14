<script setup lang="ts">
import { ref } from 'vue';

const emit = defineEmits(['close']);

const cartItems = ref([
  { id: 1, name: 'Màn hình LG UltraGear 27"', price: '6.990.000đ', quantity: 1, image: 'https://product.hstatic.net/200000722513/product/large01_c6adf3377eb1458d9b04ad0655dd24ec.jpg' },
  { id: 2, name: 'Bàn phím cơ Razer BlackWidow V4', price: '3.790.000đ', quantity: 1, image: 'https://bizweb.dktcdn.net/thumb/1024x1024/100/329/122/products/ban-phim-co-razer-blackwidow-v4-pro-rgb-1.jpg?v=1723032011420' },
  { id: 3, name: 'Chuột Logitech G Pro X Superlight', price: '2.890.000đ', quantity: 2, image: 'https://tanphat.com.vn/media/product/4106_46859_logitech_g_pro_x_superlight_wireless_pink_h2.jpg' },
]);

const closeCart = () => {
  emit('close');
};
</script>

<template>
    <Transition name="slide">
        <div class="fixed top-0 right-0 h-full w-full max-w-sm bg-white shadow-xl flex flex-col z-50">
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-2xl font-bold">Giỏ hàng</h2>
                <button @click="closeCart" class="text-gray-500 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4">
                <div v-if="cartItems.length === 0" class="text-center text-gray-500 mt-8">
                    <p>Giỏ hàng của bạn đang trống.</p>
                </div>
                <div v-else v-for="item in cartItems" :key="item.id" class="flex items-center gap-4">
                    <img :src="item.image" class="w-20 h-20 object-cover rounded-lg" />
                    <div class="flex-1">
                        <h3 class="font-semibold">{{ item.name }}</h3>
                        <p class="text-gray-600">{{ item.price }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-sm">Số lượng: {{ item.quantity }}</span>
                        </div>
                    </div>
                    <button class="text-red-500 hover:text-red-700">
                        Xóa
                    </button>
                </div>
            </div>

            <div v-if="cartItems.length > 0" class="p-4 border-t">
                <div class="flex justify-between font-bold text-lg mb-4">
                    <span>Tổng cộng:</span>
                    <span>16.660.000đ</span>
                </div>
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Thanh toán
                </button>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}
</style>
