@include('layouts.head')
@include('layouts.nav')

<header id="trip-page">
    <div class="overflow-hidden h-full relative">
        <div class="absolute banner-image z-0" style="background-image: url('./images/banner.png');"></div>
    </div>
</header>
<div class="container mx-auto flex justify-center mb-5 relative">
    <div class="fixed left-0 top-0 w-screen h-screen left-0 z-50 hidden" id="bookingmodel">
        <form action="{{route('index.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mx-auto my-20 w-3/5 flex flex-col justify-between items-center gap-16 bg-white rounded-xl px-14 py-20 h-fit relative shadow">
                @if ($errors->any())
                    <div class="p-2 bg-red-400 text-red-100 leading-none rounded-lg" role="alert">
                        <div class="flex flex-grow items-center pb-2">
                            <span class="flex rounded-full bg-red-300 uppercase px-2 py-1 text-xs font-bold mr-3">Alert</span>
                            <span class="font-semibold mr-2 text-left flex-auto">Input not correct</span>
                        </div>
                        <ul class="pl-16">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div onclick="toggleModel();" class="hover:cursor-pointer absolute right-6 top-4"><i class="fa-solid fa-xmark font-bold text-xl"></i></div>
                <div>    
                    <h3 class="font-bold mb-3">Choose date</h3>
                    <div date-rangepicker class="flex items-center">
                        <div class="relative">
                            <input name="startdate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <input name="enddate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                        </div>
                    </div>
                </div>
                <input name="trip_id" type="text" value="{{$trip->id}}" class="hidden">
                <button class="inline-block bg-main p-2.5 text-center font-bold rounded text-white shadow-md mb-3" type="submit">Submit booking</button>
            </div>
        </form>
    </div>
    <div class="w-2/3 grid grid-cols-1 lg:grid-cols-2 gap-5 bg-white rounded-xl px-14 py-8">
        <div>
            <h4>{{$trip->name}}</h4>
            <span>{{$trip->accomodation->min_amount_visitors}}-{{$trip->accomodation->max_amount_visitors}} visitors</span>
        </div>
        <div>
            <h5>P.P.P.N.</h5>
            <h4>€{{$trip->accomodation->cost}}</h4>
        </div>
        <div class="text-left">
            <div onclick="toggleModel();" class="hover:cursor-pointer inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3">Book now</div>
        </div>
    </div>
</div>
<main class="mb-5">
    <div class="container mx-auto px-50">
        <div class="flex justify-between items-center flex-col lg:flex-row flex-wrap gap-5 relative py-4">
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
        <div class="flex justify-between items-center flex-col lg:flex-row flex-wrap gap-5 relative py-4">
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
        <h2>Reviews<h2>
        @if (Route::has('login'))
        @auth
        <form action="{{route('review.store', ['tripid' => $trip->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
            <input class="hidden" value="{{$trip->id}}" name='id'>
            <div class="flex justify-start flex-wrap gap-3 py-3">
                <div class="basis-full flex-1 md:basis-2/6">
                <textarea placeholder="Enter review..." name="description" rows="4" class="flex-1 block p-2.5 w-full h-32 text-sm text-gray-900 bg-slate-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
            <button class="inline-block bg-main mb-5 py-2.5 w-28 text-center font-bold rounded text-white shadow-md text-base" type="submit">Create</button>
        </form>
        @endauth
        @endif
        @if (!empty($reviews))
        @foreach ($reviews as $review)
        <div class="mb-3 shadow rounded-2xl overflow-hidden">
            <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-slate-100 bg-opacity-40 flex justify-between">
                <div class="flex flex-wrap flex-col gap-3 items-start justify-center">
                    <div class="flex gap-3 items-center">
                            @if (isset($review->user->image_path))
                            <div class="w-14 h-10 rounded-lg overflow-hidden">
                                <img src="{{route('index.index')}}{{$review->user->image_path}}" class="min-h-full min-w-full" alt="Avatar">
                            </div>
                            @else
                            <div class="w-14 h-10 rounded-lg overflow-hidden flex justify-center items-center bg-slate-200 font-bold">
                                <span>{{ substr($review->user->name,0,1) }}</span>
                            </div>
                            @endif
                        <h4 class="w-full md:w-auto text-xl font-heading font-medium">{{$review->user->name}}</h4>
                    </div>
                    <p class="text-sm text-gray-400">{{$review->created_at->diffForHumans()}}</p>
                </div>
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->hasRole('Admin'))
                <div class="">
                    <form class="" action="{{ route('review.destroy', ['id' => $review->id, 'tripid' => $trip->id]) }}" method="POST" id="review{{$review->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" type="submit"> Delete</button>
                    </form>
                </div>
                @endif
                @endauth
                @endif
            </div>
            <div class="px-4 overflow-hidden md:px-16 pt-8 pb-12 bg-white">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 mb-6 md:mb-0">
                        <p class="mb-8 max-w-2xl text-slate-700 font-normal text-base leading-loose">{{$review->description}}</p>   
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <span class="text-base font-normal">No reviews<span>
        @endif
    </div>
</main>
<script>
    function toggleModel() {
        document.getElementById('bookingmodel').classList.toggle('hidden');
    }
</script>
@include('layouts.footer')