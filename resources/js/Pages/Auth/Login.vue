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
                <h1 class="text-3xl font-bold text-center mb-6">Đăng nhập</h1>

                <form class="space-y-5" @submit.prevent="submitLogin">
                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Email / Số điện thoại</label
                        >
                        <input
                            v-model="form.login"
                            type="text"
                            required
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="form.errors.login"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors.login[0] }}
                        </p>
                    </div>

                    <div>
                        <label class="block mb-1 text-sm text-gray-200"
                            >Mật khẩu</label
                        >
                        <input
                            v-model="form.password"
                            type="password"
                            required
                            class="w-full px-4 py-2 rounded-md bg-black/50 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-400"
                        />
                        <p
                            v-if="form.errors.password"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="w-full py-2 mt-4 rounded-md bg-green-500 hover:bg-green-600 text-black font-semibold transition"
                    >
                        Đăng nhập
                    </button>
                </form>

                <p class="mt-4 text-center text-sm text-gray-400">
                    Chưa có tài khoản?
                    <a href="/dang-ky" class="text-green-400 hover:underline"
                        >Đăng ký</a
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import LetterGlitch from "@/components/auth/LetterGlitch.vue";
import GlitchText from "@/components/text/GlitchText.vue";
const form = useForm({
    login: "",
    password: "",
    errors: {},
});

const submitLogin = () => {
    form.post("/dang-nhap", {
        onSuccess: () => {},
        onError: (errors) => {
            form.errors = errors;
        },
    });
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
