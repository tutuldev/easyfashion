
@extends('frontend.app')
@section('title', 'how to order')
@section('content')
   <section class="py-32 px-4 bg-white">
 @php
    $youtubeId = '-OGgfYsM0Ac';
    $thumbnailUrl = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
@endphp

<div class="max-w-screen-xl mx-auto">
    <h1 class="py-10 text-xl ">How to Order Item </h1>
    <div class="relative w-full pb-[56.25%] overflow-hidden">
        <img src="{{ $thumbnailUrl }}" alt="Video Thumbnail" class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 flex items-center justify-center z-10">
            <button id="playButton" class="flex items-center justify-center w-16 h-16 rounded-full border-[3px] border-white text-white bg-black bg-opacity-50 transition-all duration-300">
                <span class="material-icons text-4xl">play_arrow</span>
            </button>
        </div>
    </div>
</div>

</section>



<div id="videoPopup" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
    <div class="relative w-screen h-[90vh] ">
        <button id="closePopupButton" class="absolute -top-10 right-0 text-white text-3xl md:-right-10 md:top-0 md:text-5xl z-50 focus:outline-none">
            ×
        </button>

        <div class="w-full h-full">
            <iframe id="youtubeIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>



@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const playButton = document.getElementById('playButton');
        const videoPopup = document.getElementById('videoPopup');
        const closePopupButton = document.getElementById('closePopupButton');
        const youtubeIframe = document.getElementById('youtubeIframe');


        const videoEmbedUrl = 'https://www.youtube.com/embed/-OGgfYsM0Ac';

        playButton.addEventListener('click', function() {
            videoPopup.classList.remove('hidden');
            youtubeIframe.src = videoEmbedUrl + '?autoplay=1';
        });

        closePopupButton.addEventListener('click', function() {
            videoPopup.classList.add('hidden');
            youtubeIframe.src = '';
        });

        videoPopup.addEventListener('click', function(event) {
            if (event.target === videoPopup) {
                videoPopup.classList.add('hidden');
                youtubeIframe.src = '';
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !videoPopup.classList.contains('hidden')) {
                videoPopup.classList.add('hidden');
                youtubeIframe.src = '';
            }
        });
    });
</script>


@endpush
