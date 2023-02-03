@include('layouts.head')
@include('layouts.nav')

<header class="relative z-0 h-80 -mb-40">
    <div class="overflow-hidden h-full relative z-0">
        <div class="absolute banner-image z-0" style="background-image: url('@foreach ($location->images->slice(0, 1) as $image){{$image->image_path}}@endforeach');"></div> 
        <div class="container mx-auto flex flex-column justify-between gap-1 h-full z-10 relative">
        </div>
    </div>
</header>
<div class="container mx-auto">
    <div class="flex justify-start items-center relative mb-5">
        <a href={{ route('location.index') }} class="w-fit bg-main py-3 px-10 font-bold rounded-lg text-white shadow-md"><i class="fa-solid fa-left-long"></i> Return</a>
    </div>
</div>
<div class="container mx-auto mb-5 h-fit p-5 bg-white rounded-xl relative shadow-md">
    <div class="flex justify-between items-start flex-wrap flex-column lg:flex-row gap-5 relative mb-5">
        <div class="flex-1 py-3">
            <h1>{{$location->name}}</h1>
            <p>{{$location->description}}</p>
        </div>
        <div class="flex-1">
            @foreach ($location->images->slice(0, 1) as $image)
            <img src={{$image->image_path}}>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 grid-rows-1 gap-x-3 h-48 overflow-hidden">
        @foreach ($location->images->slice(0, 4) as $image)
        <div class="">
            <img src={{$image->image_path}}>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')