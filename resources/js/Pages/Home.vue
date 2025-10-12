<script setup lang="ts">
import { ref, onMounted, onUnmounted, DirectiveBinding } from "vue";
const open = ref(false);

import { usePage } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const page = usePage();
const authUser = page.props.authUser;

const logout = () => {
    router.post("/dang-xuat");
};
// --- Dữ liệu động cho toàn bộ trang ---

const slides = ref([
    {
        image: "https://placehold.co/1920x600/1a202c/4a5568?text=GAMING+WEEK",
        title: "TUẦN LỄ GAMING",
        subtitle:
            "Build PC mơ ước, nhận ngay quà khủng. Giảm giá đến 40% cho linh kiện PC.",
        buttonText: "Build PC Ngay",
    },
    {
        image: "https://placehold.co/1920x600/2d3748/718096?text=LAPTOP+2025",
        title: "LAPTOP GAMING 2025",
        subtitle:
            "Các dòng laptop gaming mới nhất đã cập bến. Hiệu năng đỉnh cao, thiết kế ấn tượng.",
        buttonText: "Khám Phá",
    },
]);

const smallBanners = ref([
    {
        image: "https://placehold.co/400x200/4299e1/ffffff?text=SALE+MAN+HINH",
        alt: "Sale Màn Hình",
    },
    {
        image: "https://placehold.co/400x200/f56565/ffffff?text=GEAR+GIA+SOC",
        alt: "Gear Giá Sốc",
    },
    {
        image: "https://placehold.co/400x200/48bb78/ffffff?text=LAPTOP+SINH+VIEN",
        alt: "Laptop Sinh Viên",
    },
    {
        image: "https://placehold.co/400x200/ed8936/ffffff?text=UU+DAI+THANH+TOAN",
        alt: "Ưu Đãi Thanh Toán",
    },
]);

const flashSaleProducts = ref([
    {
        name: 'Màn hình Viewsonic VA2432-H 24" IPS',
        image: "https://placehold.co/200x200/ffffff/000000?text=Viewsonic",
        oldPrice: "3.590.000đ",
        newPrice: "2.450.000đ",
        sold: 50,
        total: 80,
    },
    {
        name: "Màn hình ASUS TUF Gaming VG249QESA",
        image: "https://placehold.co/200x200/ffffff/000000?text=ASUS+TUF",
        oldPrice: "3.990.000đ",
        newPrice: "3.190.000đ",
        sold: 4,
        total: 20,
    },
    {
        name: 'Màn hình ASUS VY279HGR 27" IPS 120Hz',
        image: "https://placehold.co/200x200/ffffff/000000?text=ASUS+VY279",
        oldPrice: "3.790.000đ",
        newPrice: "3.290.000đ",
        sold: 10,
        total: 30,
    },
    {
        name: 'Màn hình Acer KG240Y-X1 24" IPS',
        image: "https://placehold.co/200x200/ffffff/000000?text=Acer+KG240Y",
        oldPrice: "3.790.000đ",
        newPrice: "2.990.000đ",
        sold: 62,
        total: 100,
    },
    {
        name: 'Màn hình ASUS VZ279HEG 27" IPS 120Hz',
        image: "https://placehold.co/200x200/ffffff/000000?text=ASUS+VZ279",
        oldPrice: "3.790.000đ",
        newPrice: "3.090.000đ",
        sold: 0,
        total: 50,
    },
    {
        name: 'Màn hình ViewSonic VX2528J 25" IPS 180Hz',
        image: "https://placehold.co/200x200/ffffff/000000?text=Viewsonic+VX25",
        oldPrice: "4.290.000đ",
        newPrice: "3.590.000đ",
        sold: 15,
        total: 25,
    },
]);

const productCategories = [
    {
        name: "Laptop Gaming",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Laptop",
    },
    {
        name: "PC Gaming",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=PC",
    },
    {
        name: "Màn hình",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Monitor",
    },
    {
        name: "Bàn phím",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Keyboard",
    },
    {
        name: "Chuột",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Mouse",
    },
    {
        name: "Tai nghe",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Headset",
    },
    {
        name: "Ghế Gaming",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Chair",
    },
    {
        name: "Linh kiện PC",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=VGA",
    },
    {
        name: "Phụ kiện",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Accesories",
    },
    {
        name: "Showroom",
        image: "https://placehold.co/150x150/e2e8f0/4a5568?text=Store",
    },
];

const brands = ref([
    "https://placehold.co/150x80/ffffff/cbd5e0?text=ASUS",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=MSI",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=GIGABYTE",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=LOGITECH",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=RAZER",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=ACER",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=LENOVO",
    "https://placehold.co/150x80/ffffff/cbd5e0?text=CORSAIR",
]);

const laptopProducts = ref([
    {
        name: "Laptop ASUS TUF Gaming F15",
        image: "https://placehold.co/250x250/ffffff/000000?text=ASUS+TUF",
        price: "21.990.000đ",
    },
    {
        name: "Laptop Acer Nitro 5 Tiger",
        image: "https://placehold.co/250x250/ffffff/000000?text=Acer+Nitro",
        price: "19.490.000đ",
    },
    {
        name: "Laptop MSI Katana GF66",
        image: "https://placehold.co/250x250/ffffff/000000?text=MSI+Katana",
        price: "25.990.000đ",
    },
    {
        name: "Laptop Lenovo Legion 5",
        image: "https://placehold.co/250x250/ffffff/000000?text=Lenovo+Legion",
        price: "31.990.000đ",
    },
    {
        name: "Laptop Dell G15 5520",
        image: "https://placehold.co/250x250/ffffff/000000?text=Dell+G15",
        price: "23.490.000đ",
    },
]);

// --- Logic và state của các component động ---

// Slideshow chính
const currentSlide = ref(0);
let slideInterval;
const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};
const startSlideShow = () => {
    slideInterval = setInterval(nextSlide, 5000);
};
const stopSlideShow = () => {
    clearInterval(slideInterval);
};

// Đồng hồ đếm ngược Flash Sale
const countdown = ref({ hours: "00", minutes: "00", seconds: "00" });
let countdownInterval;
const setupCountdown = () => {
    const now = new Date();
    const endTime = new Date(
        now.getFullYear(),
        now.getMonth(),
        now.getDate(),
        22,
        0,
        0
    ); // 22:00 hôm nay

    const updateTimer = () => {
        const distance = endTime - new Date().getTime();
        if (distance < 0) {
            countdown.value = { hours: "00", minutes: "00", seconds: "00" };
            clearInterval(countdownInterval);
            return;
        }
        const hours = Math.floor(distance / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        countdown.value = {
            hours: hours.toString().padStart(2, "0"),
            minutes: minutes.toString().padStart(2, "0"),
            seconds: seconds.toString().padStart(2, "0"),
        };
    };
    updateTimer();
    countdownInterval = setInterval(updateTimer, 1000);
};

// Logic cho Flash Sale carousel
const flashSaleContainer = ref(null);
let flashSaleInterval;

const scrollFlashSale = (direction) => {
    const container = flashSaleContainer.value;
    if (container) {
        const scrollAmount =
            (container.querySelector("div").clientWidth + 16) * 3; // Cuộn 3 sản phẩm
        container.scrollBy({
            left: scrollAmount * direction,
            behavior: "smooth",
        });
    }
};

const startFlashSaleAutoScroll = () => {
    stopFlashSaleAutoScroll();
    flashSaleInterval = setInterval(() => {
        const el = flashSaleContainer.value;
        if (el) {
            const halfWidth = el.scrollWidth / 2;

            if (el.scrollLeft >= halfWidth) {
                el.scrollLeft = 0;
            }

            el.scrollLeft += 1;
        }
    }, 20);
};

const stopFlashSaleAutoScroll = () => {
    clearInterval(flashSaleInterval);
};

// Vòng đời component
onMounted(() => {
    startSlideShow();
    setupCountdown();
    startFlashSaleAutoScroll();
});

onUnmounted(() => {
    stopSlideShow();
    clearInterval(countdownInterval);
    stopFlashSaleAutoScroll();
});
</script>

<template>
    <div class="bg-gray-100 font-sans">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="flex items-center justify-between h-20">
                    <a href="#" class="flex items-center gap-2">
                        <div
                            class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-2xl"
                        >
                            G
                        </div>
                        <span
                            class="text-3xl font-bold text-blue-600 hidden lg:block"
                        >
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
                            <svg
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <a
                            href="#"
                            class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                ></path>
                            </svg>
                            <span class="font-semibold hidden lg:block"
                                >Tư vấn cấu hình</span
                            >
                        </a>
                        <a
                            href="#"
                            class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition relative"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            <span class="font-semibold hidden lg:block"
                                >Giỏ hàng</span
                            >
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center lg:-right-2"
                                >3</span
                            >
                        </a>
                        <div class="relative">
                            <button
                                @click="open = !open"
                                class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition"
                            >
                                <svg
                                    class="w-8 h-8"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                <span class="font-semibold hidden lg:block"
                                    >Tài khoản</span
                                >
                            </button>

                            <div
                                v-if="open"
                                class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-xl z-50"
                            >
                                <div class="p-2">
                                    <div
                                        class="px-3 py-2 border-b border-gray-200"
                                    >
                                        <p class="text-sm">Xin chào,</p>
                                        <p v-if="authUser">
                                            Xin chào, {{ authUser.name }}
                                        </p>
                                    </div>

                                    <template v-if="authUser">
                                        <ul class="mt-2 text-gray-700">
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors"
                                                >
                                                    <svg
                                                        class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                                        />
                                                    </svg>
                                                    <span
                                                        >Đơn hàng của tôi</span
                                                    >
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors"
                                                >
                                                    <svg
                                                        class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                        />
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                        />
                                                    </svg>
                                                    <span>Đã xem gần đây</span>
                                                </a>
                                            </li>
                                            <hr class="my-2 border-gray-100" />
                                            <li>
                                                <button
                                                    @click="logout"
                                                    class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors"
                                                >
                                                    <svg
                                                        class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                                        />
                                                    </svg>
                                                    <span>Đăng xuất</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </template>

                                    <template v-else>
                                        <div
                                            class="flex flex-col space-y-2 mt-4"
                                        >
                                            <a
                                                href="/dang-nhap"
                                                class="w-full px-4 py-2 text-center bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                                            >
                                                Đăng nhập
                                            </a>
                                            <a
                                                href="/dang-ky"
                                                class="w-full px-4 py-2 text-center border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition"
                                            >
                                                Đăng ký
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-screen-xl mx-auto px-4 mt-4">
            <!-- Hero Slideshow & Banners -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- Main Slideshow -->
                <div
                    class="lg:col-span-2 relative w-full h-64 md:h-96 overflow-hidden rounded-lg shadow-lg"
                    @mouseenter="stopSlideShow"
                    @mouseleave="startSlideShow"
                >
                    <div
                        class="w-full h-full flex transition-transform duration-700 ease-in-out"
                        :style="{
                            transform: `translateX(-${currentSlide * 100}%)`,
                        }"
                    >
                        <div
                            v-for="(slide, index) in slides"
                            :key="index"
                            class="w-full h-full flex-shrink-0 relative"
                        >
                            <img
                                :src="slide.image"
                                class="w-full h-full object-cover"
                                :alt="slide.title"
                                onerror="this.onerror=null;this.src='https://placehold.co/1200x400/cccccc/444444?text=Image+Error';"
                            />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"
                            ></div>
                            <div
                                class="absolute bottom-0 left-0 p-8 text-white"
                            >
                                <h2 class="text-4xl font-bold">
                                    {{ slide.title }}
                                </h2>
                                <p class="mt-2 text-lg max-w-lg">
                                    {{ slide.subtitle }}
                                </p>
                                <a
                                    href="#"
                                    class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition"
                                >
                                    {{ slide.buttonText }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Small Banners -->
                <div class="grid grid-cols-2 gap-4">
                    <a
                        v-for="banner in smallBanners"
                        :key="banner.alt"
                        href="#"
                        class="block rounded-lg shadow-lg overflow-hidden"
                    >
                        <img
                            :src="banner.image"
                            :alt="banner.alt"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x200/cccccc/444444?text=Image+Error';"
                        />
                    </a>
                </div>
            </div>

            <!-- Flash Sale -->
            <section class="bg-white rounded-lg shadow-lg mt-8 py-4">
                <div class="bg-blue-600 rounded-lg p-4 mx-4">
                    <div class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-4">
                            <h2 class="text-2xl font-bold uppercase">
                                ⚡ FLASH SALE
                            </h2>
                            <div class="flex items-center gap-2">
                                <span
                                    class="bg-white text-blue-600 font-bold px-2 py-1 rounded text-lg"
                                    >{{ countdown.hours }}</span
                                >
                                :
                                <span
                                    class="bg-white text-blue-600 font-bold px-2 py-1 rounded text-lg"
                                    >{{ countdown.minutes }}</span
                                >
                                :
                                <span
                                    class="bg-white text-blue-600 font-bold px-2 py-1 rounded text-lg"
                                    >{{ countdown.seconds }}</span
                                >
                            </div>
                        </div>
                        <a
                            href="#"
                            class="bg-white text-blue-600 font-semibold px-4 py-2 rounded-lg hover:bg-blue-100 transition"
                            >Xem tất cả</a
                        >
                    </div>
                </div>
                <div
                    class="relative p-4"
                    @mouseenter="stopFlashSaleAutoScroll"
                    @mouseleave="startFlashSaleAutoScroll"
                >
                    <div
                        ref="flashSaleContainer"
                        class="flex space-x-4 overflow-x-auto pb-4 hide-scrollbar"
                    >
                        <div
                            v-for="product in flashSaleProducts"
                            :key="product.name"
                            class="flex-shrink-0 w-52 bg-white rounded-lg border border-gray-200 text-sm transform transition-transform hover:-translate-y-1"
                        >
                            <div class="relative">
                                <a href="#" class="block"
                                    ><img
                                        :src="product.image"
                                        class="w-full h-44 object-cover rounded-t-lg"
                                        onerror="this.onerror=null;this.src='https://placehold.co/200x200/cccccc/444444?text=Image+Error';"
                                /></a>
                                <div
                                    class="absolute top-0 left-0 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-tl-lg rounded-br-lg"
                                >
                                    GIẢM SỐC
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="#"
                                    ><h3
                                        class="font-semibold text-gray-800 h-10 truncate"
                                    >
                                        {{ product.name }}
                                    </h3></a
                                >
                                <div class="mt-2">
                                    <span
                                        class="text-red-600 font-bold text-lg"
                                        >{{ product.newPrice }}</span
                                    >
                                </div>
                                <div>
                                    <span
                                        class="text-gray-400 line-through text-xs"
                                        >{{ product.oldPrice }}</span
                                    >
                                </div>
                                <div class="mt-2 h-6">
                                    <div
                                        class="w-full bg-red-100 rounded-full h-5 relative overflow-hidden"
                                    >
                                        <div
                                            class="bg-red-500 h-5 rounded-full"
                                            :style="{
                                                width: `${
                                                    (product.sold /
                                                        product.total) *
                                                    100
                                                }%`,
                                            }"
                                        ></div>
                                        <div
                                            class="absolute inset-0 flex items-center justify-center"
                                        >
                                            <span
                                                class="text-white text-[10px] font-bold"
                                                >🔥 Đã bán
                                                {{ product.sold }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation Buttons -->
                    <button
                        @click="scrollFlashSale(-1)"
                        class="absolute top-1/2 -translate-y-1/2 left-0 bg-white/80 p-2 rounded-full shadow-md hover:bg-white transition opacity-0 hover:opacity-100"
                    >
                        <svg
                            class="w-6 h-6 text-gray-700"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="scrollFlashSale(1)"
                        class="absolute top-1/2 -translate-y-1/2 right-0 bg-white/80 p-2 rounded-full shadow-md hover:bg-white transition opacity-0 hover:opacity-100"
                    >
                        <svg
                            class="w-6 h-6 text-gray-700"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            ></path>
                        </svg>
                    </button>
                </div>
            </section>

            <!-- Product Categories -->
            <section class="mt-8">
                <h2 class="text-2xl font-bold mb-4">DANH MỤC SẢN PHẨM</h2>
                <div
                    class="grid grid-cols-5 lg:grid-cols-10 gap-4 bg-white p-4 rounded-lg shadow-lg"
                >
                    <a
                        v-for="category in productCategories"
                        :key="category.name"
                        href="#"
                        class="flex flex-col items-center text-center group"
                    >
                        <div
                            class="w-20 h-20 p-2 bg-gray-100 rounded-full flex items-center justify-center"
                        >
                            <img
                                :src="category.image"
                                class="w-full h-full object-contain"
                            />
                        </div>
                        <span
                            class="mt-2 text-sm font-semibold text-gray-700 group-hover:text-blue-600"
                            >{{ category.name }}</span
                        >
                    </a>
                </div>
            </section>

            <!-- Laptop Gaming Bán Chạy -->
            <section class="bg-white rounded-lg shadow-lg mt-8 p-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">LAPTOP GAMING BÁN CHẠY</h2>
                    <a
                        href="#"
                        class="text-blue-600 font-semibold hover:underline"
                        >Xem tất cả >></a
                    >
                </div>
                <div
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
                >
                    <div
                        v-for="product in laptopProducts"
                        :key="product.name"
                        class="rounded-lg border border-gray-200 p-3 group"
                    >
                        <a href="#" class="block overflow-hidden rounded-md"
                            ><img
                                :src="product.image"
                                class="w-full h-40 object-cover group-hover:scale-105 transition-transform"
                                onerror="this.onerror=null;this.src='https://placehold.co/250x250/cccccc/444444?text=Image+Error';"
                        /></a>
                        <a href="#"
                            ><h3
                                class="mt-3 font-semibold text-gray-800 h-12 truncate"
                            >
                                {{ product.name }}
                            </h3></a
                        >
                        <div class="mt-2">
                            <span class="text-red-600 font-bold text-lg">{{
                                product.price
                            }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Brands -->
            <section class="mt-8">
                <h2 class="text-2xl font-bold mb-4">THƯƠNG HIỆU HÀNG ĐẦU</h2>
                <div
                    class="grid grid-cols-4 lg:grid-cols-8 gap-4 bg-white p-4 rounded-lg shadow-lg"
                >
                    <a
                        v-for="(brand, index) in brands"
                        :key="index"
                        href="#"
                        class="flex justify-center items-center p-2 border border-gray-200 rounded-lg hover:shadow-md"
                    >
                        <img :src="brand" class="h-10 object-contain" />
                    </a>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white mt-8 border-t-4 border-blue-600">
            <div class="max-w-screen-xl mx-auto py-12 px-4">
                <div class="grid grid-cols-4 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            CÔNG TY TNHH GEARNOW
                        </h3>
                        <ul class="mt-4 space-y-2 text-gray-600 text-sm">
                            <li>
                                Showroom: 182 Lê Đại Hành, P.15, Q.11, TP.HN
                            </li>
                            <li>Điện thoại: 1800 1234</li>
                            <li>Email: support@gearnow.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            CHÍNH SÁCH
                        </h3>
                        <ul class="mt-4 space-y-2 text-gray-600 text-sm">
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Chính sách bảo hành</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Chính sách thanh toán</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Chính sách giao hàng</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Chính sách bảo mật</a
                                >
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            THÔNG TIN
                        </h3>
                        <ul class="mt-4 space-y-2 text-gray-600 text-sm">
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Về chúng tôi</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Tuyển dụng</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Tin công nghệ</a
                                >
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600"
                                    >Hỏi đáp</a
                                >
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            TỔNG ĐÀI HỖ TRỢ
                        </h3>
                        <ul class="mt-4 space-y-2 text-gray-600 text-sm">
                            <li>
                                Gọi mua hàng: <strong>1800 1234</strong> (8:00 -
                                21:00)
                            </li>
                            <li>
                                Hỗ trợ kỹ thuật:
                                <strong>1800 5678</strong> (9:00 - 18:00)
                            </li>
                        </ul>
                        <div class="mt-4">
                            <h3 class="text-lg font-bold text-gray-800">
                                KẾT NỐI VỚI CHÚNG TÔI
                            </h3>
                            <div class="flex space-x-4 mt-2">
                                <a
                                    href="#"
                                    class="text-gray-500 hover:text-blue-600"
                                    ><span class="sr-only">Facebook</span
                                    ><svg
                                        class="h-6 w-6"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            clip-rule="evenodd"
                                        /></svg
                                ></a>
                                <a
                                    href="#"
                                    class="text-gray-500 hover:text-blue-600"
                                    ><span class="sr-only">Youtube</span
                                    ><svg
                                        class="h-6 w-6"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.78 22 12 22 12s0 3.22-.42 4.814a2.506 2.506 0 0 1-1.768 1.768c-1.594.42-7.812.42-7.812.42s-6.218 0-7.812-.42a2.506 2.506 0 0 1-1.768-1.768C2 15.22 2 12 2 12s0-3.22.42-4.814a2.506 2.506 0 0 1 1.768-1.768C5.782 5 12 5 12 5s6.218 0 7.812.418zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                                            clip-rule="evenodd"
                                        /></svg
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-8 border-t border-gray-200 pt-8 text-center text-sm text-gray-500"
                >
                    <p>&copy; 2025 GEARNOW. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
