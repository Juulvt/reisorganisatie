@include('layouts.head')
@include('layouts.nav')

<header class="relative z-0">
    <div class="overflow-hidden h-full relative z-0">
        <div class="absolute banner-image z-0" style="background-image: url('./images/banner.png');"></div> 
        <div class="container mx-auto flex flex-column justify-between gap-1 h-full z-10 relative">
            <h1 class="w-1/3 pt-36 text-white">The place to find your perfect vacation!</h1>
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
        <div class="flex-1">
            <label>Type of accomodation</label>
            <select class="rounded" name="location" id="location">
                @foreach ($types as $type)
                    <option value={{$type->name}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-none">
            <button class="bg-main h-fit py-3 px-5 rounded text-white font-bold"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </div>
    </div>
</div>
<main>
    <div class="container mx-auto my-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-8 mb-5">
            @foreach ($trips as $trip)
            <div class="flex flex-col justify-between bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="flex-none">
                    <img class="rounded-lg" src="./images/locations/amsterdam.jpg">
                </div>
                <div class="flex-1 flex flex-col justify-between p-3">
                    <div class="flex-1">
                        <h4 class="text-lg">{{ $trip->name }}<h4>
                        <ul class="p-0">
                            @foreach($trip->attributes->slice(0, 3) as $attribute)
                            <li class="text-sm">{{$attribute->description}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flex-none">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">€{{$trip->accomodation->cost}}</span>
                            <a href={{ route('index.show', ['id' => $trip->id])}} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3">View trip</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{ $trips->links() }}
    </div>
</main>
@include('layouts.footer')