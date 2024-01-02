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
        <SwiperSlide v-for="(item, index) in [1,2,3,4,5,6,7,8,9]" class=" rounded-lg overflow-hidden">
            <img src="https://placehold.co/300x400" class="object-cover" alt="">
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