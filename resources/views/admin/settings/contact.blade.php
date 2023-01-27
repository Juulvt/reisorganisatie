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
                
                <form action="{{route('admin.setting.updatecontact')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                    <div class="w-full">
                        <h3>Contact info</h3>
                        <p>Contact info for visitors</p>
                        <div class="flex flex-col gap-3">
                            <div>
                                <label for="email">Email</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="email" name="email" placeholder="Enter email..." value="{{$contact?->email}}">
                            </div>
                            <div>
                                <label for="phone">Phone</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="phone" name="phone" placeholder="Enter phone..." value="{{$contact?->phone}}">
                            </div>
                            <div>
                                <label for="address">Address</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="address" name="address" placeholder="Enter address..." value="{{$contact?->address}}">
                            </div>
                        </div>
                        <h3 class="mt-5">Socials</h3>
                        <p>Social links for visitors</p>
                        <div class="flex flex-col gap-3">
                            <div>
                                <label for="pinterest">Pinterest</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="pinterest" name="pinterest" placeholder="Enter Pinterest link..." value="{{$contact?->pinterest}}">
                            </div>
                            <div>
                                <label for="facebook">Facebook</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="facebook" name="facebook" placeholder="Enter Facebook link..." value="{{$contact?->facebook}}">
                            </div>
                            <div>
                                <label for="instagram">Instagram</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="instagram" name="instagram" placeholder="Enter Instagram link..." value="{{$contact?->instagram}}">
                            </div>
                            <div>
                                <label for="linkedin">LinkedIn</label>
                                    <input class="placeholder-slate-400 bg-slate-100
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " type="text" id="linkedin" name="linkedin" placeholder="Enter LinkedIn link..." value="{{$contact?->linkedin}}">
                            </div>
                        </div>
                    </div>
                    <button class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>