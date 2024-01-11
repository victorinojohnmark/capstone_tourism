<template>
    <Swiper
      :slides-per-view="slidesPerView"
      :space-between="30"
      :navigation="true"
      :mousewheel="true"
      :keyboard="true"
      :modules="modules"
      :free-mode="true"
      :loop="true"
      :pagination="false"
      :grabCursor="true"
      class="beachSwiper"
    >
        <SwiperSlide v-for="(item, index) in beaches" class="!rounded-lg !overflow-hidden">
            <img :src="item.default_image ? `/storage/gallery/${item.default_image.filename}`: 'https://placehold.co/300x400'" class="object-cover object-center w-full max-w-[300px] h-[300px] md:h-[400px]" alt="">
        </SwiperSlide>
        <!-- <div class="swiper-button-next inline-flex p-5 px-[22px] rounded-full bg-yellow-300 hover:bg-yellow-400 transition text-white !text-xs"></div> -->
    </Swiper>
</template>
  
<script setup>
import { ref, onBeforeMount } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import { Navigation, Mousewheel, Pagination, Keyboard } from 'swiper/modules';

const modules = [Navigation, Mousewheel, Pagination, Keyboard];

const { beaches } = defineProps({
    beaches: {
        type: Object,
        required: true
    }
})
const slidesPerView = ref(4)
    
onBeforeMount(() => {
    if(window.innerWidth < 769) {
        slidesPerView.value = 2;
    }

    if(window.innerWidth < 426) {
        slidesPerView.value = 1;
    }
})


</script>