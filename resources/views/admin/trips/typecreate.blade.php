@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">New Type</h2>
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
                
                <form action="{{route('admin.type.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h3>Location</h3>
                    <div class="flex justify-start flex-wrap gap-3 py-3">
                        <div class="basis-full flex-1 md:basis-2/6">
                            <label for="name">Name</label>
                            <input class="placeholder-slate-400 bg-slate-100
                            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                            " type="text" id="name" name="name" placeholder="Enter type name...">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>