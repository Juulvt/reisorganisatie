@include('layouts.head')
@include('layouts.nav')

<header class="relative z-0 h-96">
    <div class="overflow-hidden h-full relative z-0">
        <div class="absolute banner-image z-0" style="background-image: url('./images/banner.png');"></div> 
        <div class="container mx-auto flex flex-column justify-between gap-1 h-full z-10 relative">
            <h1 class="w-1/3 pt-36 text-white">Visit the most beautiful locations!</h1>
        </div>
    </div>
</header>
<div class="container mx-auto mb-5">
    <div class="flex justify-between items-center flex-wrap gap-5 bg-white rounded-xl relative px-6 py-4">
        <div class="flex-1">
            <label>Country</label>
            <select class="rounded" name="location" id="location">
                @foreach ($countries as $country)
                    <option value={{$country->name}}>{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-none">
            <button class="bg-main h-fit py-3 px-5 rounded text-white font-bold"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </div>
    </div>
</div>
<div class="container mx-auto px-50 py-5">
        @foreach ($countries as $country)
            <h2 class="capitalize mb-3">{{ $country->name }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-8 mb-5">
            @foreach ($country->locations as $location)
            <a href={{ route('location.show', ['id' => $location->id])}} class="flex-1 flex flex-column bg-white rounded overflow-hidden">
                <div class="flex-1 image-container relative">
                    @foreach ($location->images->slice(0, 1) as $image)
                    <img src={{$image->image_path}}>
                    @endforeach
                    <div class="absolute -translate-x-1/2 left-1/2 top-1/2 text-center">
                        <h5 class="text-xl font-bold text-white text-shadow-black">{{ $location->name }}</h5>
                    </div>
                </div>
            </a>
            @endforeach
            </div>
        @endforeach
</div>

@include('layouts.footer')