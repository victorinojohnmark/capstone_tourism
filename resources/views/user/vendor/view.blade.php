@extends('layouts.app')

@section('content')
<div class="w-full my-5">
    <div class="container mx-auto px-3 md:px-0">
        {{-- <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $user->name }}</h2> --}}
        {{-- <a href="/messenger/{{ $user->id }}" target="_blank" class="table text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Message Us</a><br> --}}
        {{-- <div class="w-full block font-light text-gray-500 text-base dark:text-gray-400 mb-6">{!! $user->information?->about_us_content !!}</div> --}}

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

        <section id="contactInformation" class="relative flex flex-col md:flex-row gap-4">
            @if ($user->information)
            <div class="w-full md:w-1/4">
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Contact Details</h4>
                <ul class="mb-4">
                    <li><strong>Contact Person: </strong>{{ $user->information->contact_person }}</li>
                    <li><strong>Contact No: </strong>{{ $user->information->contact_no }}</li>
                    <li><strong>Email Address: </strong>{{ $user->information->email_address }}</li>
                    <li><strong>Address: </strong>{{ $user->information->address }}</li>
                </ul>
                <a href="/inbox/{{ $user->id }}" class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Message Us</a>
            </div>
            @endif

            @if (isset($user->information->map_url))
            <div id="vendorMap" class="w-full md:w-3/4 mb-12">
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Map Location</h4>
                {!! $user->information->map_url !!}
            </div>
            @endif
        </section>
        
        
        
        <div class="relative block">
            <hr class="block my-3">
            <h3 class="text-gray-700 text-xl my-3">Gallery</h3>
            {{-- <div class="columns-2 md:columns-3 lg:columns-4 mt-6">
                @forelse ($user->galleries as $gallery)
                <div class="relative">
                    <img class="mb-4 max-w-full hover:cursor-pointer" src="/storage/gallery/{{ $gallery->filename }}" alt="">
                </div>
                @empty
                <div>
                    <img src="https://placehold.co/600x400?text=No%20upload%20image%20yet" alt="">
                </div>
                @endforelse
                
            </div> --}}

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
                {{-- <div class="column">
                  <img src="https://www.w3schools.com/howto/img_nature.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                </div>
                <div class="column">
                  <img src="https://www.w3schools.com/howto/img_snow.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
                </div>
                <div class="column">
                  <img src="https://www.w3schools.com/howto/img_mountains.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                </div>
                <div class="column">
                  <img src="https://www.w3schools.com/howto/img_lights.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
                </div> --}}
              </div>
            
              <div id="myModal" class="modal backdrop-blur-sm bg-gray-800/50">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                    
                    @forelse ($user->galleries as $gallery)
                        <div class="mySlides">
                            {{-- <div class="numbertext">1 / 4</div> --}}
                            <img src="/storage/gallery/{{ $gallery->filename }}" class="w-full aspect-video object-cover">
                        </div>
                    @empty
                    
                    @endforelse
                  {{-- <div class="mySlides">
                    <div class="numbertext">1 / 4</div>
                    <img src="https://www.w3schools.com/howto/img_nature_wide.jpg" style="width:100%">
                  </div>
            
                  <div class="mySlides">
                    <div class="numbertext">2 / 4</div>
                    <img src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width:100%">
                  </div>
            
                  <div class="mySlides">
                    <div class="numbertext">3 / 4</div>
                    <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%">
                  </div>
            
                  <div class="mySlides">
                    <div class="numbertext">4 / 4</div>
                    <img src="https://www.w3schools.com/howto/img_lights_wide.jpg" style="width:100%">
                  </div> --}}
            
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
            
                  
                  {{-- <div class="column">
                    <img class="demo cursor" src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                  </div>
                  <div class="column">
                    <img class="demo cursor" src="https://www.w3schools.com/howto/img_lights_wide.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                  </div> --}}
                </div>
              </div>
        </div>
    </div>
</div>

{{-- <div class="w-full">
    <iframe src="{{ $user->map_url }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> --}}

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
