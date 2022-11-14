@include('layouts.head')
@include('layouts.nav')

<header>
    <div class="overflow-hidden h-full relative">
        <div class="absolute banner-image z-0" style="background-image: url('./images/banner.png');"></div> 
        <div class="container mx-auto flex flex-column justify-between gap-1 h-full z-10 relative">
            <h1 class="w-1/3 pt-36 text-white">The place to find your perfect vacation!</h1>
        </div>
    </div>
</header>
<div class="container mx-auto px-50 mb-5 margin-negative-3">
    <div class="flex justify-between items-center flex-wrap gap-5 bg-white rounded-xl relative px-6 py-4">
        <div class="flex-1">
            <label>Where do you want to go?</label>
                <select class="rounded" name="location" id="location">
                    <option value="Nederland">Nederland</option>
                    <option value="Duitsland">Duitsland</option>
                    <option value="Frankrijk">Frankrijk</option>
                    <option value="Spanje">Spanje</option>
                </select>
            </div>
            <div class="flex-1">
                <label>Where do you want to go?</label>
                <select class="rounded" name="location" id="location">
                    <option value="Nederland">Nederland</option>
                    <option value="Duitsland">Duitsland</option>
                    <option value="Frankrijk">Frankrijk</option>
                    <option value="Spanje">Spanje</option>
                </select>
            </div>
            <div class="flex-1">
                <label>Where do you want to go?</label>                    
                <select class="rounded" name="location" id="location">
                    <option value="Nederland">Nederland</option>
                    <option value="Duitsland">Duitsland</option>
                    <option value="Frankrijk">Frankrijk</option>
                    <option value="Spanje">Spanje</option>
                </select>
            </div>
            <div class="flex-none">
                <button class="btn primary search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-50 my-5">
    <div class="grid grid-cols-3 gap-x-3 gap-y-8">
        @foreach ($trips as $trip)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div>
                <img class="rounded-lg" src="./images/locations/amsterdam.jpg">
            </div>
            <div class="flex flex-col justify-between p-3">
                <div class="flex-1">
                    <h4 class="text-lg">{{ $trip->name }}<h4>
                    <ul class="p-0">
                        <li class="text-sm">Awesome view</li>
                        <li class="text-sm">Close to city</li>
                        <li class="text-sm">Nice food</li>
                    </ul>
                </div>
                <div class="flex-none">
                    <div class="flex justify-between items-center">
                        <span class="text-sm">$79,99</span>
                        <a href={{ route('index.show', ['id' => $trip->id])}} class="btn primary">View trip</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <a href='/reis/1'>Amsterdam</a>
 
   
</div>

@include('layouts.footer')