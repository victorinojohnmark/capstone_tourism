@extends('layouts.app')

@section('content')
<div class="w-full my-5">
    <div class="container mx-auto px-3 md:px-0">

        @if ($user->information)
        <section class="bg-white dark:bg-gray-900">
            <div class="gap-16 mx-auto lg:grid lg:grid-cols-2 lg:px-6">
                <div class="" id="aboutUsContent">
                   {!! $user->information->about_us_content !!}
                </div>
                <div class="8">
                    <img class="w-full rounded-lg aspect-square object-cover object-center" src="/storage/gallery/{{ $user->defaultImage->filename }}">
                </div>
            </div>
        </section>
        @else
        <p>No information posted yet.</p>
        @endif

        <section id="contactInformation" class="relative mx-auto lg:px-6 flex flex-col md:flex-row gap-6 py-6">
          <div class="flex flex-col w-full md:w-1/2">
            @if (isset($user->information->map_url))
            <div id="vendorMap" class="mb-12">
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Map Location</h4>
                {!! $user->information->map_url !!}
            </div>
            @endif

            @if ($user->information)
            <div class="py-3">
                <div class="flex flex-row justify-between">
                  <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Contact Details</h4>
                  <a href="/inbox/{{ $user->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Message Us</a>
                </div>
                
                <ul class="mb-4">
                    <li><strong>Contact Person: </strong>{{ $user->information->contact_person }}</li>
                    <li><strong>Contact No: </strong>{{ $user->information->contact_no }}</li>
                    <li><strong>Email Address: </strong>{{ $user->information->email_address }}</li>
                    <li><strong>Address: </strong>{{ $user->information->address }}</li>
                </ul>
                
            </div>
            @endif
          </div>

          <div class="w-full md:w-1/2">
            <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Book your reservation</h4>
            <booking-calendar />
          </div>
        </section>
    
        <div class="relative block">
            <hr class="block my-3">
            <h3 class="text-gray-700 text-xl my-3">Gallery</h3>

            <div class="row">
                @forelse ($user->galleries as $gallery)
                    <div class="column">
                        <img src="/storage/gallery/{{ $gallery->filename }}" class="w-full aspect-video object-cover hover:cursor-pointer" onclick="openModal();currentSlide({{ $loop->index + 1 }})" class="hover-shadow cursor">
                    </div>
                @empty
                <div>
                    <img src="https://placehold.co/600x400?text=No%20upload%20image%20yet" alt="">
                </div>
                @endforelse
                
              </div>
            
              <div id="myModal" class="modal backdrop-blur-sm bg-gray-800/50">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                    
                    @forelse ($user->galleries as $gallery)
                        <div class="mySlides">
                            <img src="/storage/gallery/{{ $gallery->filename }}" class="w-full aspect-video object-cover">
                        </div>
                    @empty
                    
                    @endforelse
            
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
                  <div class="caption-container">
                    <p id="caption"></p>
                  </div>

                  @forelse ($user->galleries as $gallery)
                    <div class="column">
                        <img class="demo cursor w-full aspect-video object-cover" src="/storage/gallery/{{ $gallery->filename }}" onclick="currentSlide({{ $loop->index + 1 }})">
                    </div>
                    @empty
                
                @endforelse
            
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        // Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  captionText.innerHTML = dots[slideIndex - 1].alt;
}

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
    
@endsection
