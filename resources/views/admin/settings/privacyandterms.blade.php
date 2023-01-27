@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <a href={{ route('admin.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
        <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Contact page</h2>
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
                
                <form action="{{route('admin.setting.updateprivacy')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                    <div class="w-full">
                        <h3>Privacy policy</h3>
                        <p>Privacy policy for visitors</p>
                        <div class="flex flex-col gap-3">
                            <div>
                                <label>Description</label>
                                <textarea id="text" name="privacy" rows="4" class="flex-1 block p-2.5 w-full h-64 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{$privacy?->description}}</textarea>
                            </div>
                        </div>
                        <h3 class="mt-5">Terms & Conditions</h3>
                        <p>Terms & Conditions for visitors</p>
                        <div class="flex flex-col gap-3">
                            <div>
                                <label>Description</label>
                                <textarea id="text" name="terms" rows="4" class="flex-1 block p-2.5 w-full h-64 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{$terms?->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>