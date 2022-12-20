@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-4 lg:p-5 basis-5/6 max-w-full overflow-hidden">
            <div class="bg-white rounded-lg shadow-sm p-3 lg:p-5 w-full mb-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Countries</h2>
                    <a href="{{ route('admin.country.create') }}" class="btn btn-primary">
                        Add Country
                    </a>
                </div>
                @if (!empty($locations))
                <div class="max-w-full w-full overflow-x-auto relative mx-auto mt-3">
                    <table class="w-full rounded-lg">
                        <tr class="bg-slate-100">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        @foreach ($countries as $country)
                        <tr>
                            <th scope="row whitespace-nowrap">{{$country->id}}</th>
                            <td>{{$country->name}}</td>
                            <td class="text-right min-w-fit whitespace-nowrap">
                                <form class="inline-block w-1/3 min-w-fit" action="{{ route('admin.country.destroy', $country->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-remove w-full show-alert-delete-box" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <p>No countries</p>
                @endif
            </div>
            <div class="bg-white rounded-lg shadow-sm p-3 lg:p-5 w-full">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Locations</h2>
                    <a href="{{ route('admin.location.create') }}" class="btn btn-primary">
                        Add Location
                    </a>
                </div>
                <div class="flex justify-end gap-3 py-3">
                    <div class="basis-full lg:basis-1/4">
                        <label>Country</label>
                        <select class="rounded bg-slate-100" name="location" id="location">
                            @foreach ($countries as $country)
                                <option value={{$country->name}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="basis-full lg:basis-1/4">
                        <label for="firstname">location</label>
                        <input class="placeholder-slate-400 bg-slate-100
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                        invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                        " type="text" id="locationname" name="locationname" placeholder="Enter location name...">
                    </div>
                </div>
                @if (!empty($locations))
                <div class="max-w-full w-full overflow-x-auto relative mx-auto">
                    <table class="w-full rounded-lg">
                        <tr class="bg-slate-100">
                            <th scope="col">ID</th>
                            <th scope="col">Location</th>
                            <th scope="col">Country</th>
                            <th scope="col"></th>
                        </tr>
                        @foreach ($locations as $location)
                        <tr>
                            <th scope="row whitespace-nowrap">{{$location->id}}</th>
                            <td>{{$location->name}}</td>
                            <td>{{$location->country?->name}}</td>
                            <td class="text-right min-w-fit whitespace-nowrap">
                                <a href="{{ route('admin.location.show', $location->id) }}" class="btn btn-secondary w-1/3 min-w-fit">Show</a>
                                <form class="inline-block w-1/3 min-w-fit" action="{{ route('admin.location.destroy', $location->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-remove w-full" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <p>No Locations</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  event.target.form;
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            showConfirmButton: true,
            focusConfirm: false,
            confirmButtonColor: '#FE556C',
            cancelButtonColor: '#3E557E',
            confirmButtonText: 'Confirm Delete'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'success'
                )
            }
            }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>