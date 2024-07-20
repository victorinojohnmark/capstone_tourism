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

                <ul class="p-3 flex flex-row gap-3">
                  @if ($user->information->facebook_url)
                      <li>
                          <a href="{{ $user->information->facebook_url ?? '#' }}" target="_blank">
                              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                  <path fill-rule="evenodd" class="text-blue-600" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                              </svg>
                          </a>
                      </li>
                  @endif
                  @if ($user->information->instagram_url)
                  <li>
                      <a href="{{ $user->information->instagram_url ?? '#' }}" target="_blank">
                          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" class="text-purple-600" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                          </svg>
                      </a>
                  </li>
                  @endif
                  @if ($user->information->twitter_url)
                  <li>
                      <a href="{{ $user->information->twitter_url ?? '#' }}" target="_blank">
                          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path class="text-blue-700" d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                          </svg>
                      </a>
                  </li>
                  @endif
              </ul>
                
            </div>
            @endif
          </div>

          <div class="w-full md:w-1/2">
            
            @if (Auth::id())
              @if (Auth::user()->is_tourist)
                <h4 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Book your reservation</h4>
                <booking-calendar />
              @endif
            @else
              <p class="pl-5">Please <a href="/login" class=" text-blue-700 underline" rel="noopener noreferrer">login</a> to access the reservation feature</p>
            @endif
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
