@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto px-50 py-5">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-8">
        @foreach ($countries as $country)
            <h2>{{ $country->name }}</h2>
            @foreach ($country->locations as $location)
            <div class="flex-1 flex flex-column bg-white rounded overflow-hidden">
                <div class="flex-1 image-container relative">
                    @foreach ($location->images->slice(0, 1) as $image)
                    <img src={{$image->image_path}}>
                    @endforeach
                    <div class="absolute -translate-x-1/2 left-1/2 top-1/2 text-center">
                        <h5 class="text-xl font-bold text-white text-shadow-black">{{ $location->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>

@include('layouts.footer')