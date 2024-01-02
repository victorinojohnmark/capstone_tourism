@extends('layouts.app')

@section('content')
<section id="mainBanner" class="relative h-[calc(100vh-115px)] md:h-[calc(100vh-84px)] w-full bg-green-600 bg-[url('/img/floating.jpg')] bg-center bg-cover overflow-hidden">
    <div class="container mx-auto pt-40">
        <div id="bannerText" class="pl-5 sm:pl-10 md:pl-20">
            <h3 class="md:leading-0 font-bold text-5xl sm:text-7xl text-white font-['Inter'] leading-[50px] ml-48">Experience</h3> 
            <h3 class="font-['Gotcha_Standup'] font-normal text-[160px] md:!text-[275px] text-yellow-300 -mt-14 md:-mt-24 mr-3 -rotate-3 drop-shadow-xl">Ternate</h3>
            <h3 class="leading-0 font-bold text-3xl sm:text-5xl text-white font-['Inter'] leading-[50px] -mt-14 md:-mt-24 ml-24">Unveiling Nature's Treasures</h3>
        </div>
    </div>
    <div id="man" class="absolute w-3/4 sm:w-1/2 md:3/4 lg:w-auto z-20 -bottom-7 -right-32 md:-bottom-36 transition-transform duration-300 ease-out transform translate-x-0 translate-y-0 hover:translate-x-[-10px] hover:translate-y-[-10px]">
        <img src="/img/man1.png" class="" alt="">
    </div>
    <div id="landscape" class="absolute z-10 bottom-0">
        <img src="/img/landscape.png" class=" object-cover" alt="">
    </div>
    <img src="/img/paper-edge.png" class="absolute z-30 bottom-0 min-h-[42px] object-cover w-full -mt-9 shadow-2xl shadow-white" alt="">
</section>

<section id="marketing">
    <div class="container mx-auto py-20 px-3 md:px-0">
        <div class="flex flex-col ">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/4">
                    <h3 class="text-green-600 font-['Gotcha_Standup'] font-light text-7xl leading-7">Beach <br/><span class="font-['Bebas_Neue'] text-6xl text-neutral-900">&#38; Resort</span></h3>
                    <p class="text-neutral-600 leading-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem amet cum hic similique vero quidem. Mollitia.</p>
                    <div class="flex flex-row mt-3 items-center gap-x-3 mb-3">
                        <div class="text-white bg-green-600 rounded-full p-3">
                            <x-heroicon-o-arrow-right class="w-4 h-4"/>
                        </div>
                        <strong class="font-['Bebas_Neue'] text-2xl text-neutral-800">Explore all</strong>
                    </div>
                </div>

                <div class="w-full md:w-3/4">
                    <beach-slider></beach-slider>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainBanner = document.querySelector('#mainBanner');
        const man = document.querySelector('#man');
        const landscape = document.querySelector('#landscape');

        // mainBanner.addEventListener('mousemove', (e) => {
        //     const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
        //     const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
        //     man.style.transform = `translate(${xAxis}px, ${yAxis}px)`;
        // });

        // mainBanner.addEventListener('mouseleave', () => {
        //     man.style.transform = 'translate(0, 0)';
        // });

        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || window.pageYOffset;
            const manTranslateY = scrollY / 2;
            const landscapeTranslateY = scrollY / 5;
            man.style.transform = `translateY(${manTranslateY}px)`;
            landscape.style.transform = `translateY(${landscapeTranslateY}px)`;
        });
    });
    
</script>
@endsection
