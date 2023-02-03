@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-4 lg:p-5 basis-5/6 max-w-full overflow-hidden">
        <a href={{ route('admin.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
            <div class="bg-white rounded-lg shadow-sm p-3 lg:p-5 w-full mb-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Countries</h2>
                    <a href="{{ route('admin.country.create') }}" class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md">
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
                                <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.country.destroy', $country->id) }}" method="POST" id="country{{$country->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $country->id }}" data-action="{{ route('admin.country.destroy',$country->id) }}" onclick="deleteConfirmation('country{{$country->id}}')"> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <p>No countries</p>
                @endif
            </div>
            <div class="bg-white rounded-lg mb-3 shadow-sm p-3 lg:p-5 w-full">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Locations</h2>
                    <a href="{{ route('admin.location.create') }}" class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md">
                        Add Location
                    </a>
                </div>
                @if (!empty($locations))
                <div class="max-w-full w-full mt-3 overflow-x-auto relative mx-auto">
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
                                <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.location.destroy', $location->id) }}" method="POST" id="location{{$location->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $location->id }}" data-action="{{ route('admin.location.destroy',$location->id) }}" onclick="deleteConfirmation('location{{$location->id}}')"> Delete</button>
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