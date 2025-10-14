<script setup lang="ts">
import { ref, onMounted, onUnmounted, Directive } from "vue";
import ClientLayout from "../Layouts/ClientLayout.vue";

defineOptions({ layout: ClientLayout });

const slides = ref([
    { image: "https://minhancomputer.com/media/news/1506_dan-pc-gaming.jpg", title: "BUILD PC CẤU HÌNH KHỦNG", subtitle: "Tự xây dựng dàn máy trong mơ của bạn với những linh kiện hàng đầu.", buttonText: "Build PC Ngay" },
    { image: "https://cdn.hstatic.net/files/200000637319/article/san-pham-razer_29666dac65f14925ad0273f3961226f1.jpg", title: "GAMING GEAR MỚI NHẤT", subtitle: "Nâng tầm trải nghiệm game với bàn phím, chuột và tai nghe chuyên nghiệp.", buttonText: "Khám Phá Ngay" },
]);

const smallBanners = ref([
    { image: "https://file.hstatic.net/200000536009/file/02_9d5f55a0ed4e4a5e8494670cf7ae3495.jpg", alt: "Sale Màn Hình" },
    { image: "https://www.phucanh.vn/media/news/0908_900x600gaminggearthih.png", alt: "Gear Giá Sốc" },
    { image: "https://images2.thanhnien.vn/528068263637045248/2024/7/16/image1-17211234370561654046313.png", alt: "Laptop Sinh Viên" },
    { image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNQSWIqyvd8Ux2pPo8oMD8OUOL3zMxHFyIDQ&s", alt: "Ưu Đãi Thanh Toán" },
]);

import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

const flashSaleProducts = ref([
    { id: 1, name: 'Màn hình LG UltraGear 27"', image: "https://product.hstatic.net/200000722513/product/large01_c6adf3377eb1458d9b04ad0655dd24ec.jpg", oldPrice: "8.990.000đ", newPrice: "6.990.000đ", sold: 35, total: 50 },
    { id: 2, name: 'Bàn phím cơ Razer BlackWidow V4', image: "https://bizweb.dktcdn.net/thumb/1024x1024/100/329/122/products/ban-phim-co-razer-blackwidow-v4-pro-rgb-1.jpg?v=1723032011420", oldPrice: "4.590.000đ", newPrice: "3.790.000đ", sold: 15, total: 40 },
    { id: 3, name: 'Chuột Logitech G Pro X Superlight', image: "https://tanphat.com.vn/media/product/4106_46859_logitech_g_pro_x_superlight_wireless_pink_h2.jpg", oldPrice: "3.390.000đ", newPrice: "2.890.000đ", sold: 68, total: 100 },
    { id: 4, name: 'Tai nghe SteelSeries Arctis Nova Pro', image: "https://tanphat.com.vn/media/product/5244_49398_steelseries_arctis_nova_pro_wireless_61520_a5.jpg", oldPrice: "7.490.000đ", newPrice: "6.490.000đ", sold: 8, total: 20 },
    { id: 5, name: 'Card màn hình NVIDIA RTX 4070 Ti', image: "https://product.hstatic.net/1000288298/product/card-man-hinh-zotac-4070-ti-super-solid7_pcm_6_30ca8c5cab9a459ba8a16e3d325d997a_master.jpg", oldPrice: "22.990.000đ", newPrice: "20.490.000đ", sold: 5, total: 10 },
    { id: 6, name: 'Case NZXT H5 Flow RGB', image: "https://www.tncstore.vn/media/product/250-11524-vo-case-nzxt-h5-flow-rgb-all-black-cc-h52fb-r1--1-.jpg", oldPrice: "2.790.000đ", newPrice: "2.290.000đ", sold: 22, total: 40 },
    { id: 7, name: 'Chuột Gaming bán chạy nhất', image: "https://images.tokopedia.net/img/cache/700/VqbcmM/2022/10/19/56333449-c63a-4443-a333-324a99065aa0.jpg", oldPrice: "1.290.000đ", newPrice: "990.000đ", sold: 120, total: 150 },
    { id: 8, name: 'Bàn phím cơ không dây', image: "https://theme.hstatic.net/200000421063/1001226155/14/ms_banner_img2.jpg?v=102", oldPrice: "2.190.000đ", newPrice: "1.890.000đ", sold: 45, total: 70 },
    { id: 9, name: 'Case Build Sẵn Gaming', image: "https://nguyencongpc.vn/media/product/25383-h5-flow-white-1.jpg", oldPrice: "35.990.000đ", newPrice: "32.990.000đ", sold: 12, total: 20 },
]);

const productCategories = [
    { name: "Laptop", image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=150&h=150&fit=crop" },
    { name: "PC Gaming", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_rUxCf7zEX6Z0K7-pRwrxs5zH2D0b7DpCYw&s" },
    { name: "Màn hình", image: "https://minhancomputercdn.com/media/product/11418_huntkey_rrb2713e_a_9.jpg" },
    { name: "Bàn phím", image: "https://laptop88.vn/media/news/2806_cau-tao-ban-phim-co.jpg" },
    { name: "Chuột", image: "https://cdn.tgdd.vn/Products/Images/86/310086/chuot-gaming-zadez-g156m-2-750x500.jpg" },
    { name: "Tai nghe", image: "https://cdn.ankhang.vn/media/product/23540_tai_nghe_choi_game_razer_barracuda_rz04_03790100_r3m1_4.jpg" },
    { name: "Ghế Gaming", image: "https://noithatthienhoaloi.com/wp-content/uploads/2021/04/ghegame48.jpg" },
    { name: "Linh kiện", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrXL1jRNV3Qw1_eCwhSKEm4ogZIMr54PrD2g&s" },
    { name: "Phụ kiện", image: "https://maytinhdalat.vn/Images/Product/maytinhdalat_gaming-gear-3.jpg" },
    { name: "Showroom", image: "https://file.hstatic.net/200000722513/article/image1-66_07c186dd0a2e4d77928371a609b431d5.jpg" },
];

const brands = ref([
    "asus", "msi", "gigabyte", "logitech", "razer", "acer", "lenovo", "corsair", "nzxt", "lianli", "coolermaster", "phanteks"
]);

const laptopProducts = ref([
    { id: 7, name: "Laptop ASUS ROG Strix Scar 17", image: "https://nguyencongpc.vn/media/product/18557-asus-rog-strix-scar-17-g733qs-hg021t-4.jpg", price: "68.990.000đ" },
    { id: 8, name: "Laptop Acer Predator Helios 300", image: "https://laptopbaoloc.vn/wp-content/uploads/2022/05/Acer-Predator-Helios-300-PH315-54-758S.jpg", price: "45.490.000đ" },
    { id: 9, name: "Laptop MSI GE76 Raider", image: "https://mac24h.vn/images/detailed/94/gaming-msi-raider-ge76-mac24h-1.webp", price: "55.990.000đ" },
    { id: 10, name: "Laptop Lenovo Legion 7", image: "https://laptopaz.vn/media/lib/3000_9935_lenovo_legion_7_16achg6_3.jpg", price: "51.990.000đ" },
    { id: 11, name: "Laptop Dell Alienware M15 R7", image: "https://laptopaz.vn/media/lib/2538_61xja1VPlXL._AC_SL1500_.jpg", price: "53.490.000đ" },
]);

const caseProducts = ref([
    { id: 15, name: "Case Corsair 4000D Airflow", image: "https://hoanglongcomputer.vn/media/product/2207-z4650307287768_2a72b5e23d7af1ef3a212fba35cd823b.jpg", price: "2.590.000đ" },
    { id: 16, name: "Case Lian Li O11 Dynamic EVO", image: "https://gosuzone.com/wp-content/uploads/2024/02/Vo-Case-Lian-Li-O11-Dynamic-EVO-RGB-Mid-TowerMau-DenKhong-Kem-Quat-Gosuzone_0001_Layer-5.jpg", price: "4.290.000đ" },
    { id: 17, name: "Case Cooler Master MasterBox TD500 Mesh", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNsGFUaQQal84lWR2vdtmEkX3L8LikNEkaOQ&s", price: "2.490.000đ" },
    { id: 18, name: "Case Phanteks Eclipse G360A", image: "https://files.pccasegear.com/UserFiles/PH-EC360ATG-DBK02-phanteks-eclipse-g360a-airflow-d-rgb-tempered-glass-black-ftr1.jpg", price: "2.190.000đ" },
    { id: 19, name: "Case HYTE Y60", image: "https://product.hstatic.net/1000288298/product/dsc06859_bc58bfd1dc91483baf145efdc0551fca_master.jpg", price: "5.490.000đ" },
]);

const mouseProducts = ref([
    { id: 20, name: "Chuột Razer Viper V2 Pro", image: "https://nguyencongpc.vn/media/lib/24-09-2022/chutrazerviperv2protrng5.jpeg", price: "3.890.000đ" },
    { id: 21, name: "Chuột Endgame Gear XM2we", image: "https://photo2.tinhte.vn/data/attachment-files/2023/06/6449694_DSC_0419.jpg", price: "2.490.000đ" },
    { id: 22, name: "Chuột Pulsar X2V2 Wireless", image: "https://www.phongcachxanh.vn/cdn/shop/articles/Pulsar_X2V2_Wireless_Mouse_Size2_Blac_Gallery-009_copy_67dbae95-ff82-4f07-91ab-444faeb80030.jpg?v=1741535698&width=2048", price: "2.690.000đ" },
    { id: 23, name: "Chuột Lamzu Atlantis Mini Pro", image: "https://www.phongcachxanh.vn/cdn/shop/files/chu-t-khong-day-sieu-nh-lamzu-atlantis-og-v2-pro-h-tr-4khz-40441559154933.jpg?v=1712914353&width=800", price: "2.590.000đ" },
    { id: 24, name: "Chuột Glorious Model O 2 Wireless", image: "https://owlgaming.vn/wp-content/uploads/2023/08/chuot-khong-day-glorious-model-o-2-matte-black.jpg", price: "2.790.000đ" },
]);

const newArrivals = ref([
  { id: 25, name: "NVIDIA RTX 4080 Super", image: "https://khoavang.vn/resources/cache/800xx1/A-Khoi-Hinh-anh/NewFolder/GeekPro-2024/9836-gigabyte-geforce-rtx-4080-super-windforce-16g-vl0iywtt-1714809279.webp", price: "30.990.000đ" },
  { id: 26, name: "AMD Ryzen 9 7950X3D", image: "https://laptopbaoloc.vn/wp-content/uploads/2023/03/AMD-Ryzen-9-7950X3D-%E2%80%93-CPU-gaming-co-hieu-nang-cao-nhat.jpg", price: "18.990.000đ" },
  { id: 27, name: "Màn hình Samsung Odyssey OLED G9", image: "https://anphat.com.vn/media/product/45852_m__n_h__nh_samsung_odyssey_oled_g9_g95sc_ls49cg954sexxv__6_.jpg", price: "49.990.000đ" },
  { id: 28, name: "Bàn phím Keychron Q1 HE", image: "https://cdn-media.sforum.vn/storage/app/media/nhatquang519/danh-gia-keychron-q1-he/danh-gia-keychron-q1-he-1.jpg", price: "5.290.000đ" },
  { id: 29, name: "Tai nghe Audeze Maxwell", image: "https://3kshop.vn/wp-content/uploads/2022/12/3kshop-audeze-maxwell-3-1.png", price: "8.990.000đ" },
]);



const addToCart = (product: { name: string }) => {
    alert(`Đã thêm sản phẩm "${product.name}" vào giỏ hàng!`);
};

const currentSlide = ref(0);
let slideInterval: ReturnType<typeof setInterval> | null = null;
const nextSlide = () => { currentSlide.value = (currentSlide.value + 1) % slides.value.length; };
const startSlideShow = () => { if (slideInterval) clearInterval(slideInterval); slideInterval = setInterval(nextSlide, 5000); };
const stopSlideShow = () => { if (slideInterval) clearInterval(slideInterval); slideInterval = null; };

const countdown = ref({ hours: "00", minutes: "00", seconds: "00" });
let countdownInterval: ReturnType<typeof setInterval> | null = null;
const setupCountdown = () => {
    const now = new Date();
    const endTime = new Date();
    endTime.setHours(22, 0, 0, 0);
    if (now.getTime() > endTime.getTime()) {
        endTime.setDate(endTime.getDate() + 1);
    }
    const updateTimer = () => {
        const distance = endTime.getTime() - new Date().getTime();
        if (distance < 0) {
            countdown.value = { hours: "00", minutes: "00", seconds: "00" };
            if (countdownInterval) clearInterval(countdownInterval);
            setTimeout(setupCountdown, 1000);
            return;
        }
        countdown.value = {
            hours: Math.floor(distance / (1000 * 60 * 60)).toString().padStart(2, "0"),
            minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, "0"),
            seconds: Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, "0"),
        };
    };
    updateTimer();
    if (countdownInterval) clearInterval(countdownInterval);
    countdownInterval = setInterval(updateTimer, 1000);
};

const vScrollFadeIn: Directive<HTMLElement> = {
    mounted: (el) => {
        el.classList.add('before-fade-in');
        const observer = new IntersectionObserver(entries => {
            if (entries[0].isIntersecting) {
                el.classList.add('fade-in');
                observer.unobserve(el);
            }
        }, { threshold: 0.1 });
        observer.observe(el);
    }
};

onMounted(() => {
    startSlideShow();
    setupCountdown();
});

onUnmounted(() => {
    stopSlideShow();
    if (countdownInterval) clearInterval(countdownInterval);
});
</script>

<template>
    <div class="bg-gray-100 font-sans">
        <main class="max-w-screen-xl mx-auto px-4 mt-4 overflow-hidden">
            <!-- Hero Slideshow & Banners -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4" v-scroll-fade-in>
                <!-- Main Slideshow -->
                <div class="lg:col-span-2 relative w-full h-64 md:h-96 overflow-hidden rounded-lg shadow-lg" @mouseenter="stopSlideShow" @mouseleave="startSlideShow">
                    <div class="w-full h-full flex transition-transform duration-700 ease-in-out" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                        <div v-for="(slide, index) in slides" :key="index" class="w-full h-full flex-shrink-0 relative">
                            <img :src="slide.image" class="w-full h-full object-cover bg-gray-200" :alt="slide.title" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-8 text-white">
                                <h2 class="text-4xl font-bold drop-shadow-lg">{{ slide.title }}</h2>
                                <p class="mt-2 text-lg max-w-lg drop-shadow-md">{{ slide.subtitle }}</p>
                                <a href="#" class="mt-4 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">
                                    {{ slide.buttonText }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Small Banners -->
                <div class="grid grid-cols-2 gap-4">
                    <a v-for="banner in smallBanners" :key="banner.alt" href="#" class="block rounded-lg shadow-lg overflow-hidden group">
                        <img :src="banner.image" :alt="banner.alt" class="w-full h-full object-cover bg-gray-200" />
                    </a>
                </div>
            </div>

            <!-- Flash Sale -->
            <section class="bg-white rounded-lg shadow-lg mt-8 py-4" v-scroll-fade-in>
                <div class="bg-red-600 rounded-lg p-4 mx-4">
                    <div class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-4">
                            <h2 class="text-2xl font-bold uppercase">⚡ FLASH SALE</h2>
                            <div class="flex items-center gap-2">
                                <span class="bg-white text-red-600 font-bold px-2 py-1 rounded text-lg">{{ countdown.hours }}</span>:
                                <span class="bg-white text-red-600 font-bold px-2 py-1 rounded text-lg">{{ countdown.minutes }}</span>:
                                <span class="bg-white text-red-600 font-bold px-2 py-1 rounded text-lg">{{ countdown.seconds }}</span>
                            </div>
                        </div>
                        <a href="#" class="bg-white text-red-600 font-semibold px-4 py-2 rounded-lg hover:bg-red-100 transition">Xem tất cả</a>
                    </div>
                </div>
                <div class="relative p-4">
                    <swiper
                        :modules="[Autoplay, Navigation]"
                        :slides-per-view="5"
                        :space-between="16"
                        :loop="true"
                        :autoplay="{ delay: 3000, disableOnInteraction: false }"
                        :navigation="{ nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }"
                        :breakpoints="{
                            320: { slidesPerView: 1 },
                            640: { slidesPerView: 3 },
                            1024: { slidesPerView: 5 }
                        }"
                        class="pb-4"
                    >
                        <swiper-slide v-for="product in flashSaleProducts" :key="product.id">
                            <div class="group relative flex-shrink-0 w-full bg-white rounded-lg border border-gray-200 text-sm transform transition-transform hover:-translate-y-2 duration-300 h-full">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center z-10">
                                    <button @click="addToCart(product)" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">Thêm vào giỏ</button>
                                </div>
                                <div class="relative">
                                    <a href="#" class="block"><img :src="product.image" class="w-full h-44 object-cover rounded-t-lg bg-gray-200" /></a>
                                    <div class="absolute top-0 left-0 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-tl-lg rounded-br-lg">GIẢM SỐC</div>
                                </div>
                                <div class="p-3 flex flex-col">
                                    <a href="#"><h3 class="font-semibold text-gray-800 h-10 truncate">{{ product.name }}</h3></a>
                                    <div class="mt-2"><span class="text-red-600 font-bold text-lg">{{ product.newPrice }}</span></div>
                                    <div><span class="text-gray-400 line-through text-xs">{{ product.oldPrice }}</span></div>
                                    <div class="mt-auto pt-2 h-6">
                                        <div class="w-full bg-red-100 rounded-full h-5 relative overflow-hidden">
                                            <div class="bg-red-500 h-5 rounded-full" :style="{ width: `${(product.sold / product.total) * 100}%` }"></div>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <span class="text-white text-[10px] font-bold">🔥 Đã bán {{ product.sold }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                    <div class="swiper-button-prev absolute top-1/2 -translate-y-1/2 left-0 bg-white/80 p-2 rounded-full shadow-md hover:bg-white transition z-20 cursor-pointer"><svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></div>
                    <div class="swiper-button-next absolute top-1/2 -translate-y-1/2 right-0 bg-white/80 p-2 rounded-full shadow-md hover:bg-white transition z-20 cursor-pointer"><svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
                </div>
            </section>

            <!-- Product Categories -->
            <section class="mt-8" v-scroll-fade-in>
                <h2 class="text-2xl font-bold mb-4">DANH MỤC SẢN PHẨM</h2>
                <div class="grid grid-cols-5 lg:grid-cols-10 gap-4 bg-white p-4 rounded-lg shadow-lg">
                    <a v-for="category in productCategories" :key="category.name" href="#" class="flex flex-col items-center text-center group">
                        <div class="w-20 h-20 p-2 bg-gray-100 rounded-full flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-300">
                            <img :src="category.image" class="w-full h-full object-contain rounded-full bg-gray-200" />
                        </div>
                        <span class="mt-2 text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ category.name }}</span>
                    </a>
                </div>
            </section>

            <!-- New Arrivals -->
            <section class="bg-white rounded-lg shadow-lg mt-8 p-4" v-scroll-fade-in>
                <div class="bestselling-header">
                    <h2 class="text-2xl font-bold text-white">SẢN PHẨM MỚI</h2>
                    <a href="#" class="text-white font-semibold hover:underline">Xem tất cả >></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
                    <div v-for="product in newArrivals" :key="product.id" class="group relative rounded-lg border-2 border-gray-200 p-3 transition-all duration-300 hover:shadow-xl hover:border-blue-500">
                         <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center z-10">
                            <button @click="addToCart(product)" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">Thêm vào giỏ</button>
                        </div>
                        <a href="#" class="block overflow-hidden rounded-md"><img :src="product.image" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300 bg-gray-200" /></a>
                        <a href="#"><h3 class="mt-3 font-semibold text-gray-800 h-12 truncate group-hover:text-blue-600">{{ product.name }}</h3></a>
                        <div class="mt-2"><span class="text-red-600 font-bold text-lg">{{ product.price }}</span></div>
                    </div>
                </div>
            </section>

            <!-- Laptop Gaming Bán Chạy -->
            <section class="bg-white rounded-lg shadow-lg mt-8 p-4" v-scroll-fade-in>
                <div class="bestselling-header">
                    <h2 class="text-2xl font-bold text-white">LAPTOP GAMING BÁN CHẠY</h2>
                    <a href="#" class="text-white font-semibold hover:underline">Xem tất cả >></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
                    <div v-for="product in laptopProducts" :key="product.id" class="group relative rounded-lg border-2 border-gray-200 p-3 transition-all duration-300 hover:shadow-xl hover:border-blue-500">
                         <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center z-10">
                            <button @click="addToCart(product)" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">Thêm vào giỏ</button>
                        </div>
                        <a href="#" class="block overflow-hidden rounded-md"><img :src="product.image" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300 bg-gray-200" /></a>
                        <a href="#"><h3 class="mt-3 font-semibold text-gray-800 h-12 truncate group-hover:text-blue-600">{{ product.name }}</h3></a>
                        <div class="mt-2"><span class="text-red-600 font-bold text-lg">{{ product.price }}</span></div>
                    </div>
                </div>
            </section>

            <!-- Case Bán Chạy -->
            <section class="bg-white rounded-lg shadow-lg mt-8 p-4" v-scroll-fade-in>
                <div class="bestselling-header">
                    <h2 class="text-2xl font-bold text-white">CASE BÁN CHẠY</h2>
                    <a href="#" class="text-white font-semibold hover:underline">Xem tất cả >></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
                    <div v-for="product in caseProducts" :key="product.id" class="group relative rounded-lg border-2 border-gray-200 p-3 transition-all duration-300 hover:shadow-xl hover:border-blue-500">
                         <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center z-10">
                            <button @click="addToCart(product)" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">Thêm vào giỏ</button>
                        </div>
                        <a href="#" class="block overflow-hidden rounded-md"><img :src="product.image" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300 bg-gray-200" /></a>
                        <a href="#"><h3 class="mt-3 font-semibold text-gray-800 h-12 truncate group-hover:text-blue-600">{{ product.name }}</h3></a>
                        <div class="mt-2"><span class="text-red-600 font-bold text-lg">{{ product.price }}</span></div>
                    </div>
                </div>
            </section>

            <!-- Chuột Bán Chạy -->
            <section class="bg-white rounded-lg shadow-lg mt-8 p-4" v-scroll-fade-in>
                <div class="bestselling-header">
                    <h2 class="text-2xl font-bold text-white">CHUỘT BÁN CHẠY</h2>
                    <a href="#" class="text-white font-semibold hover:underline">Xem tất cả >></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
                    <div v-for="product in mouseProducts" :key="product.id" class="group relative rounded-lg border-2 border-gray-200 p-3 transition-all duration-300 hover:shadow-xl hover:border-blue-500">
                         <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center z-10">
                            <button @click="addToCart(product)" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-transform hover:scale-105">Thêm vào giỏ</button>
                        </div>
                        <a href="#" class="block overflow-hidden rounded-md"><img :src="product.image" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300 bg-gray-200" /></a>
                        <a href="#"><h3 class="mt-3 font-semibold text-gray-800 h-12 truncate group-hover:text-blue-600">{{ product.name }}</h3></a>
                        <div class="mt-2"><span class="text-red-600 font-bold text-lg">{{ product.price }}</span></div>
                    </div>
                </div>
            </section>

            <!-- Brands -->
            <section class="mt-8" v-scroll-fade-in>
                <h2 class="text-3xl font-bold text-center mb-8">THƯƠNG HIỆU HÀNG ĐẦU</h2>
                <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-4 bg-white p-6 rounded-lg shadow-lg">
                    <a v-for="brand in brands" :key="brand" href="#" class="flex justify-center items-center p-4 bg-gray-100 rounded-lg transition-transform transform hover:scale-110 hover:shadow-xl">
                        <img :src="`https://logo.clearbit.com/${brand}.com`" class="h-10 object-contain" :alt="`${brand} Logo`" onerror="this.onerror=null;this.src='https://via.placeholder.com/150x50.png?text='+brand.toUpperCase()" />
                    </a>
                </div>
            </section>

        </main>
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

.before-fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
}

.fade-in {
    opacity: 1;
    transform: translateY(0);
}

.bestselling-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* margin-bottom: 1rem; */
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    background: linear-gradient(to right, #4f46e5, #818cf8);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}
</style>