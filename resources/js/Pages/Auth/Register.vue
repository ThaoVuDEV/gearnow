<template>
    <div class="letter-glitch-container">
        <LetterGlitch
            :glitch-colors="['#2b4539', '#61dca3', '#61b3dc']"
            :glitch-speed="50"
            :center-vignette="false"
            :outer-vignette="false"
            :smooth="true"
            class="w-full h-full bg-black"
        />
        <Transition name="success-fade">
            <div
                v-if="showSuccess"
                class="fixed inset-0 flex items-center justify-center z-50 px-4"
            >
                <!-- Backdrop với blur mạnh -->
                <div
                    class="absolute inset-0 bg-black/70 backdrop-blur-md"
                    @click="confirmSuccess"
                ></div>

                <!-- Modal Card -->
                <div class="relative max-w-sm w-full transform">
                    <!-- Success Card -->
                    <div
                        class="bg-white rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.5)] overflow-hidden"
                    >
                        <!-- Top Gradient Background -->
                        <div
                            class="relative bg-gradient-to-br from-emerald-400 via-green-500 to-teal-500 px-8 pt-12 pb-8"
                        >
                            <!-- Animated circles decoration -->
                            <div
                                class="absolute top-4 right-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"
                            ></div>
                            <div
                                class="absolute bottom-4 left-4 w-32 h-32 bg-white/10 rounded-full blur-3xl"
                            ></div>

                            <!-- Success Icon -->
                            <div class="relative flex justify-center mb-4">
                                <div
                                    class="success-icon-wrapper bg-white rounded-full p-4 shadow-xl"
                                >
                                    <svg
                                        class="w-16 h-16 text-green-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="3"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <!-- Title -->
                            <h3
                                class="relative text-3xl font-black text-white text-center mb-2"
                            >
                                Thành công!
                            </h3>
                            <p
                                class="relative text-white/90 text-center text-sm"
                            >
                                Tài khoản đã được tạo thành công
                            </p>
                        </div>

                        <!-- White Content Area -->
                        <div class="px-8 py-6">
                            <!-- Button -->
                            <button
                                @click="confirmSuccess"
                                class="w-full py-4 px-6 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl active:scale-95"
                            >
                                Tiếp tục
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
        <div
            class="absolute inset-0 flex flex-col items-center justify-center gap-8 z-10"
        >
            <div class="">
                <GlitchText
                    children="Gear Now"
                    :speed="0.5"
                    :enable-shadows="true"
                    :enable-on-hover="true"
                />
            </div>
            <div
                class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl shadow-2xl w-full max-w-sm text-white"
            >
                <h1 class="text-3xl font-bold text-center mb-6">
                    Đăng Ký Tài Khoản
                </h1>

                <!-- 🧩 Form -->
                <form class="space-y-5" @submit.prevent="submitRegister">
                    <!-- Họ tên -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Họ và tên</label
                        >
                        <input
                            v-model="formRegister.name"
                            type="text"
                            placeholder="Nguyễn Văn A"
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="formRegister.errors.name"
                            class="text-red-400 text-sm mt-1"
                        >
                            {{ formRegister.errors.name[0] }}
                        </p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Email</label
                        >
                        <input
                            v-model="formRegister.email"
                            type="email"
                            placeholder="you@example.com"
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="formRegister.errors.email"
                            class="text-red-400 text-sm mt-1"
                        >
                            {{ formRegister.errors.email[0] }}
                        </p>
                    </div>

                    <!-- Số điện thoại -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Số điện thoại</label
                        >
                        <input
                            v-model="formRegister.phone"
                            type="tel"
                            pattern="[0-9]{9,11}"
                            placeholder="0901234567"
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="formRegister.errors.phone"
                            class="text-red-400 text-sm mt-1"
                        >
                            {{ formRegister.errors.phone[0] }}
                        </p>
                    </div>

                    <!-- Mật khẩu -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Mật khẩu</label
                        >
                        <input
                            v-model="formRegister.password"
                            type="password"
                            placeholder="********"
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="formRegister.errors.password"
                            class="text-red-400 text-sm mt-1"
                        >
                            {{ formRegister.errors.password[0] }}
                        </p>
                    </div>

                    <!-- Xác nhận mật khẩu -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Xác nhận mật khẩu</label
                        >
                        <input
                            v-model="formRegister.password_confirmation"
                            type="password"
                            placeholder="********"
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                    </div>

                    <!-- Nút submit -->
                    <button
                        type="submit"
                        :disabled="formRegister.processing"
                        class="w-full py-2 mt-4 rounded-md bg-green-500 hover:bg-green-600 text-black font-semibold transition"
                    >
                        <span v-if="formRegister.processing">Đang gửi...</span>
                        <span v-else>Đăng ký</span>
                    </button>
                </form>

                <p class="mt-4 text-center text-sm text-gray-400">
                    Đã có tài khoản?
                    <a
                        href="/dang-nhap"
                        class="text-green-400 hover:underline"
                        >Đăng nhập</a
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import LetterGlitch from "@/components/auth/LetterGlitch.vue";
import GlitchText from "@/components/text/GlitchText.vue";

import { useForm, usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const formRegister = useForm({
    name: "",
    email: "",
    phone: "",
    password: "",
    password_confirmation: "",
});

const showSuccess = ref(false);
const redirectUrl = ref("");

const page = usePage();

onMounted(() => {
    if (page.props.flash?.success) {
        showSuccess.value = true;
        redirectUrl.value = page.props.flash.redirect || "/";
    }
});

const submitRegister = () => {
    formRegister.post("/dang-ky", {
        preserveScroll: true,
        onSuccess: (page) => {
            if (page.props.flash?.success) {
                showSuccess.value = true;
                redirectUrl.value = page.props.flash.redirect || "/";
            }
        },
        onError: (errors) => {
            console.log("Validation errors:", errors);
        },
    });
};

const confirmSuccess = () => {
    showSuccess.value = false;
    window.location.href = redirectUrl.value; // redirect khi bấm OK
};
</script>

<style scoped>
.letter-glitch-container {
    width: 100%;
    height: 900px;
    position: relative;
    overflow: hidden;
}
</style>
