@include('layouts.head')
@include('layouts.nav')
<script type="text/javascript">
    function deleteConfirmation(id) {
        form = $("form#" + id + "");
        Swal.fire({
            title: "Do you wish to delete your account?",
            text: "Please ensure and then confirm!",
            showCancelButton: true,
            showConfirmButton: true,
            focusConfirm: false,
            confirmButtonColor: '#FE556C',
            cancelButtonColor: '#3E557E',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function (e) {
            if (e.value === true) {
                console.log("submitting form");
                form.submit();
            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
<div class="container mx-auto py-5">
    <div class="flex flex-wrap justify-between gap-5">
        <div class="basis-1/4 h-full rounded-lg shadow-md bg-white">
            <div class="pt-4 pb-2 px-6">
                <div class="flex items-center">
                    <div class="shrink-0">
                    <img src="{{route('index.index')}}{{$user->image_path}}" class="rounded-full w-10" alt="Avatar">
                    </div>
                    <div class="grow ml-3">
                    <p class="text-sm font-semibold p-0 m-0">{{$user->name}}</p>
                    </div>
                </div>
            </div>
            <ul class="relative px-1">
                <li class="relative">
                <a href={{ route('user.account') }} class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">
                    <i class="fa-solid fa-user mr-3"></i>
                    <span>Account</span>
                </a>
                </li>
                <li class="relative">
                <a href={{ route('user.trips') }} class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">
                    <i class="fa-solid fa-suitcase-rolling mr-3"></i>
                    <span>Bookings</span>
                </a>
                </li>
            </ul>
        </div>
        <div class="flex-1 rounded-lg shadow-md bg-white basis-2/4 p-6">
            <h2 class="mb-4">Account Settings</h2>
            <form action="{{route('account.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex gap-3 flex-wrap mb-3"> 
                    <div class="flex-none w-30"> 
                        <div class="flex flex-column items-start justify-center w-full">
                            <label for="firstname">Profile picture</label>
                            <label class="block w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="dropzone flex flex-col items-center justify-center py-5 px-4 relative " style="background-size: cover; background-image: url({{route('index.index')}}{{$user->image_path}});">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-white text-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-white text-shadow-md"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-white text-shadow-md">PNG, JPG or JPEG (MAX. 800x400px)</p>
                                    <input type="file" name="image"
                                    class="w-full file:hidden file:border-0 bg-blue-50 rounded-3xl py-2 px-4 text-blue-700 font-semibold" />
                                </div>
                                @error('image')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3 flex-wrap mb-3"> 
                    <div class="flex-1"> 
                        <label for="name">Username</label>
                        <input value="{{$user->name}}" class="bg-slate-100 placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                        invalid:border-pink-500 invalid:text-pink-600
                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                        " type="text" id="name" name="name" placeholder="Enter username...">
                    </div>
                </div>
                <div class="flex gap-3 flex-wrap mb-3">
                    <div class="flex-1"> 
                        <label for="email">E-mail</label>
                        <input value="{{$user->email}}" class="bg-slate-100 placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                        invalid:border-pink-500 invalid:text-pink-600
                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                        " type="text" id="email" name="email" placeholder="youremail@gmail.com">
                    </div>
                    <div class="flex-1">
                        <label for="phone">Phone Number</label>
                        <input value="{{$user->phone}}" class="bg-slate-100 placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                        invalid:border-pink-500 invalid:text-pink-600
                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                        " type="text" id="phone" name="phone" placeholder="06 23547699">
                    </div>
                </div>
                <button class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md" type="submit">Save</button>
            </form>

            <h3 class="mt-5 font-lg">Want to delete your account?</h3>
            <p>Deleting your account is permanent</p>
            <button class="inline-block bg-red-500 py-2.5 w-28 text-center font-bold rounded text-white shadow-md" data-id="{{ $user->id }}" data-action="{{ route('account.destroy',$user->id) }}" onclick="deleteConfirmation('account{{$user->id}}')"> Delete</button>
        </div>
    </div>
</div>

@include('layouts.footer')