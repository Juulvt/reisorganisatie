@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">About page</h2>
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
                
                <form action="{{route('admin.setting.updateabout')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                    <h3>About page content</h3>
                    <p>Content on visitor page</p>
                    <div class="w-full">
                        <div class="flex flex-col gap-3">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-8 gap-5">
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                            <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$about?->image_path1}});">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <input type="file" name="image_path1"
                                                class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                            </div>
                                            @error('image_path1')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="basis-full flex-none md:basis-2/6">
                                        <label for="title">Title</label>
                                        <input class="placeholder-slate-400 bg-slate-100
                                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                        invalid:border-pink-500 invalid:text-pink-600
                                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                        " type="text" id="title" name="title" value={{$about?->title}}>
                                    </div>
                                    <label>Desctription</label>
                                    <textarea id="description" name="description" rows="4" class="flex-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{$about?->description}}</textarea>
                                </div>
                            </div>
                            <div class="flex-none grid grid-cols-1 md:grid-cols-4 gap-x-3 gap-y-8 gap-2">
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100" style="background-size: cover; background-image: url({{route('index.index')}}{{$about?->image_path2}});">
                                            <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                                <img id="image_path2" class="w-full h-full aboslute">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <input type="file" name="image_path2"
                                                class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                            </div>
                                            @error('image_path2')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                    <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100" style="background-size: cover; background-image: url({{route('index.index')}}{{$about?->image_path3}});">
                                            <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                                <img id="image_path3" class="w-full h-full aboslute">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <input type="file" name="image_path3"
                                                class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                            </div>
                                            @error('image_path3')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100" style="background-size: cover; background-image: url({{route('index.index')}}{{$about?->image_path4}});">
                                            <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                                <img id="image_path4" class="w-full h-full aboslute">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <input type="file" name="image_path4"
                                                class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                            </div>
                                            @error('image_path4')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100" style="background-size: cover; background-image: url({{route('index.index')}}{{$about?->image_path5}});">
                                            <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative">
                                                <img id="image_path5" class="w-full h-full aboslute">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                                <input type="file" name="image_path5"
                                                class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                            </div>
                                            @error('image_path5')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="basis-full flex-none md:basis-2/6">
                                    <label for="subtitle">Title</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="subtitle" name="subtitle" value={{$about?->subtitle}}>
                                </div>
                                <label>Desctription</label>
                                <textarea id="text" name="text" rows="4" class="flex-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{$about?->text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>