@extends('layouts.app')

@section('content')
<section id="mainBanner" class="relative h-[calc(100vh-115px)] md:h-[calc(100vh-84px)] w-full bg-green-600 bg-[url('/img/floating.jpg')] bg-center bg-cover overflow-hidden">
    <div class="container mx-auto pt-40">
        <div id="bannerText" class="pl-5 sm:pl-10 md:pl-20">
            <h3 class="md:leading-0 font-bold text-5xl sm:text-7xl text-white font-['Inter'] leading-[50px] ml-48">Experience</h3> 
            <h3 class="font-['Gotcha_Standup'] font-normal text-[160px] md:!text-[275px] text-yellow-300 -mt-14 md:-mt-24 mr-3 -rotate-3">Ternate</h3>
            <h3 class="leading-0 font-bold text-3xl sm:text-5xl text-white font-['Inter'] leading-[50px] -mt-14 md:-mt-24 ml-24">Unveiling Nature's Treasures</h3>
        </div>
    </div>
    <div id="man" class="absolute md:w-auto z-20 -bottom-7 -right-32 md:-bottom-36 transition-transform duration-300 ease-out transform translate-x-0 translate-y-0 hover:translate-x-[-10px] hover:translate-y-[-10px]">
        <img src="/img/man1.png" class="" alt="">
    </div>
    <div id="landscape" class="absolute z-10 bottom-0">
        <img src="/img/landscape.png" class="" alt="">
    </div>
</section>

<section id="marketing">
    <h3 class="font-semibold text-9xl">Hello</h3>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainBanner = document.querySelector('#mainBanner');
        const man = document.querySelector('#man');

        mainBanner.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            man.style.transform = `translate(${xAxis}px, ${yAxis}px)`;
        });

        mainBanner.addEventListener('mouseleave', () => {
            man.style.transform = 'translate(0, 0)';
        });

        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || window.pageYOffset;
            const translateY = scrollY / 5; // Adjust the value based on your preference
            man.style.transform = `translateY(${translateY}px)`;
        });
    });
    
</script>
@endsection
