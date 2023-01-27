@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto">
    <div class="flex gap-5 about-container">
        <div class="flex-1 pr-5">
            <img src="{{route('index.index')}}{{$about?->image_path1}}">
        </div>
        <div class="flex-1 pl-5 flex flex-col items-start justify-center">
            <h2>{{$about?->title}}</h2>
            <p>{{$about?->description}}</p>
        </div>
    </div>
    <div class="relative columns-4 sm:columns-4 gap-8">
        <img class="w-full object-cover aspect-square rounded-lg" src="{{route('index.index')}}{{$about?->image_path2}}">
        <img class="w-full object-cover aspect-square rounded-lg" src="{{route('index.index')}}{{$about?->image_path3}}">
        <img class="w-full object-cover aspect-square rounded-lg" src="{{route('index.index')}}{{$about?->image_path4}}">
        <img class="w-full object-cover aspect-square rounded-lg" src="{{route('index.index')}}{{$about?->image_path5}}">
    </div>
    <div class="about-container">
        <div>
            <h2>{{$about?->subtitle}}</h2>
            <div class="relative columns-2 sm:columns-2 gap-8">
                <p>{{$about?->text}}</p>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')