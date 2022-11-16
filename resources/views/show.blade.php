@include('layouts.head')
@include('layouts.nav')

<header id="trip-page">
    <div class="overflow-hidden h-full relative">
        <div class="absolute banner-image z-0" style="background-image: url('./images/banner.png');"></div>
    </div>
</header>
<div class="container mx-auto flex justify-center mb-5 relative">
    <div class="w-2/3 grid grid-cols-2 gap-5 bg-white rounded-xl px-14 py-8">
        <div>
            <h4>{{$trip->name}}</h4>
            <span>{{$trip->accomodation->min_amount_visitors}}-{{$trip->accomodation->max_amount_visitors}} visitors</span>
        </div>
        <div class="text-right">
            <i class="fa-solid fa-plane"></i>
            <i class="fa-solid fa-plus"></i>
            <i class="fa-solid fa-car-side"></i>
            <i class="fa-solid fa-plus"></i>
            <i class="fa-solid fa-house"></i>
        </div>
        <div>
            <h5>P.P.P.N.</h5>
            <h4>€{{$trip->accomodation->cost}}</h4>
        </div>
        <div class="text-right">
            <a href={{ route('index.show', ['id' => $trip->id])}} class="btn primary big">Book now</a>
        </div>
    </div>
</div>
<main class="mb-5">
    <div class="container mx-auto px-50">
        <div class="flex justify-between items-center flex-wrap gap-5 relative py-4">
            <div class="flex-1">
                <h1>{{$trip->name}}</h1>
                <p>{{$trip->description}}</p>
            </div>
            <div class="flex-1">
                @foreach ($trip->images->slice(0, 1) as $image)
                <img src={{$image->image_path}}>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-3 grid-rows-1 gap-x-3 h-36 overflow-hidden">
            @foreach ($trip->images->slice(0, 4) as $image)
            <div class="row-start-1">
                <img src={{$image->image_path}}>
            </div>
            @endforeach
        </div>
    </div>
</main>

@include('layouts.footer')