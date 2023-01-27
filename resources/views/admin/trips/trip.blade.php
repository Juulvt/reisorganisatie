@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <a href={{ route('admin.trip.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
        <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">New Trip</h2>
                    <a href="{{ route('admin.trip.edit', $trip->id) }}" class="min-w-10 btn btn-primary">
                        Edit
                    </a>
                </div>
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
                    <h3>Trip</h3>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="name">Name</label>
                            <p>{{$trip->name}}</p>
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="location">Location</label>
                            <p>{{$trip->accomodation->location?->name}}</p>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1">
                            <label class="block" for="name">Attributes</label>
                            <div class="basis-full flex-1">
                                @foreach ($trip->attributes as $attribute)
                                <p>{{$attribute->description}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3">Accomodation</h3>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="name">Name</label>
                            <p>{{$trip->accomodation->name}}</p>
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="type">Type</label>
                            <p>{{$trip->accomodation->type->name}}</p>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="address">Address</label>
                            <p>{{$trip->accomodation->address}}</p>
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="city">City</label>
                            <p>{{$trip->accomodation->city}}</p>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Minimum amount of visitors</label>
                            <p>{{$trip->accomodation->min_amount_visitors}}</p>
                        </div>
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Maximum amount of visitors</label>
                            <p>{{$trip->accomodation->max_amount_visitors}}</p>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3 mb-3">
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Price</label>
                            <p>{{$trip->accomodation->cost}}</p>
                        </div>
                    </div>
                    <h3>Page content</h3>
                    <p>Content on visitor page</p>
                    <div class="w-full">
                        <div class="flex flex-col gap-3">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-8 gap-5">
                                <div class="flex flex-col gap-1">
                                    <h4>Trip</h4>
                                    <label>Desctription</label>
                                    <p>{{$trip->description}}</p>
                                </div>
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <img id="image1" class="w-full h-full aboslute" src="{{ route('index.index')}}{{$trip->images?->where('order', 0)->first()->image_path }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 mt-5">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-8 gap-5">
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <img id="image1" class="w-full h-full aboslute" src="{{ route('index.index')}}{{$trip->images?->where('order', 1)->first()->image_path }}">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h4>Accomodation</h4>
                                    <label>Desctription</label>
                                    <p>{{$trip->accomodation->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>