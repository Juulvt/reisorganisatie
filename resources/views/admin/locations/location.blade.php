@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <a href={{ route('admin.location.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
        <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">{{$location->name}}</h2>
                    <a href="{{ route('admin.location.edit', $location->id) }}" class="min-w-10 btn btn-primary">
                        Edit
                    </a>
                </div>
                    <h3>Location</h3>
                    <p>Details about location</p>
                    <div class="flex flex-wrap gap-x-36 flex-start">
                        <div class="flex-none">
                            <label>Name</label>
                            <p>{{$location->name}}</p>
                        </div>
                        <div class="flex-none">
                            <label>Country</label>
                            <p>{{$location->country?->name}}</p>
                        </div>
                    </div>
                    <h3>Page content</h3>
                    <p>Content on visitor page</p>
                    <div class="w-full">
                        <div class="flex flex-col gap-3">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-8 gap-5">
                                <div class="flex flex-col gap-1">
                                    <label>Desctription</label>
                                    <p id="description" name="description" rows="4" class="flex-1 block w-full text-sm text-gray-900">{{$location->description}}</p>
                                </div>
                                <div>
                                    <div class="h-full w-full aspect-video">
                                        <div class="h-full w-full flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$location->images->where('order', 0)->first()->image_path}});">
   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-none grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-8 gap-2">
                                <div>
                                    <div class="h-full w-full aspect-square">
                                        <div class="h-full w-full flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$location->images->where('order', 0)->first()->image_path}});">
   
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="h-full w-full aspect-square">
                                        <div class="h-full w-full flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$location->images->where('order', 0)->first()->image_path}});">
   
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="h-full w-full aspect-square">
                                        <div class="h-full w-full flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$location->images->where('order', 0)->first()->image_path}});">
   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>