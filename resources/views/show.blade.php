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
        <div>
            <h5>P.P.P.N.</h5>
            <h4>€{{$trip->accomodation->cost}}</h4>
        </div>
        <div class="text-left">
            <a href={{ route('index.show', ['id' => $trip->id])}} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3">Book now</a>
        </div>
    </div>
</div>
<main class="mb-5">
    <div class="container mx-auto px-50">
        <div class="flex justify-between items-center flex-wrap gap-5 relative py-4">
            <div class="flex-1 w-full h-80 overflow-hidden relative">
                @foreach ($trip->images->slice(0, 1) as $image)
                <img class="absolute -translate-y-1/2 -translate-x-1/2 left-1/2 top-1/2 min-h-full min-w-full" src={{$image->image_path}}>
                @endforeach
            </div>
            <div class="flex-1">
                <h1>{{$trip->name}}</h1>
                <p>{{$trip->description}}</p>
            </div>
        </div>
        <div class="flex justify-between items-center flex-wrap gap-5 relative py-4">
            <div class="flex-1">
                <h1>{{$trip->accomodation->name}}</h1>
                <p>{{$trip->accomodation->description}}</p>
            </div>
            <div class="flex-1 w-full h-80 overflow-hidden relative">
                @foreach ($trip->images->slice(0, 1) as $image)
                <img class="absolute -translate-y-1/2 -translate-x-1/2 left-1/2 top-1/2 min-h-full min-w-full" src={{$image->image_path}}>
                @endforeach
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')