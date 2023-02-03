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
                
                <form action="{{route('admin.trip.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h3>Trip</h3>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="name">Name</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="text" id="name" name="name" placeholder="Enter trip name...">
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="location">Location</label>
                            <select class="rounded bg-slate-100" name="location" id="location">
                                @foreach ($locations as $location)
                                    <option value={{$location->id}}>{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1">
                            <label class="block" for="name">Attributes</label>
                            <div class="basis-full flex-1 grid grid-cols-4">
                                @foreach ($attributes as $attribute)
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="attribute[]" value="{{ $attribute->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="mb-0 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $attribute->description }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3">Accomodation</h3>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="name">Name</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="text" id="accomodationname" name="accomodationname" placeholder="Enter accomodation name...">
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="type">Type</label>
                            <select class="rounded bg-slate-100" name="type" id="type">
                                @foreach ($types as $type)
                                    <option value={{$type->id}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="address">Address</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="text" id="address" name="address" placeholder="Enter address...">
                        </div>
                        <div class="basis-full flex-1 md:basis-3/6">
                            <label for="city">City</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="text" id="city" name="city" placeholder="Enter city name...">
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Minimum amount of visitors</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="number" value="1" id="minvisitors" name="minvisitors" placeholder="1" step="1">
                        </div>
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Maximum amount of visitors</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="number" value="1" id="maxvisitors" name="maxvisitors" placeholder="1" step="1">
                        </div>
                    </div>
                    <div class="flex justify-start flex-wrap gap-3 py-3 mb-3">
                        <div class="basis-full flex-none md:basis-2/6">
                            <label for="name">Price</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="number" value="" data-type="currency" id="price" name="price" placeholder="0.00" step="0.01">
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
                                    <textarea id="description" name="description" rows="4" class="flex-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter location descrtiption..."></textarea>
                                </div>
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                    <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                            <img id="image1" class="w-full h-full aboslute">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                            <input type="file" name="image1"
                                            class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                        </div>
                                        @error('image1')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 mt-5">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-8 gap-5">
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                    <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                            <img id="image2" class="w-full h-full aboslute">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                            <input type="file" name="image2"
                                            class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                        </div>
                                        @error('image2')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h4>Accomodation</h4>
                                    <label>Desctription</label>
                                    <textarea id="accomodationdescription" name="accomodationdescription" rows="4" class="flex-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter location descrtiption..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="inline-block bg-main mt-2 py-2.5 w-28 text-center font-bold rounded text-white shadow-md" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>