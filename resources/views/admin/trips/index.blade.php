@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <a href={{ route('admin.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Trips</h2>
                    <a href="{{ route('admin.trip.create') }}" class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md">
                        Add Trip
                    </a>
                </div>
                <div class="flex justify-end gap-3 py-3">
                    <div class="basis-1/4">
                        <label>Country</label>
                        <select class="rounded bg-slate-100" name="location" id="location">
                            @foreach ($countries as $country)
                                <option value={{$country->name}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="basis-1/4">
                        <label for="firstname">Trip</label>
                        <input class="placeholder-slate-400 bg-slate-100
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                        invalid:border-pink-500 invalid:text-pink-600
                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                        " type="text" id="tripname" name="tripname" placeholder="Enter trip name...">
                    </div>
                </div>
                @if (!empty($trips))
                <table class="w-full rounded-lg overflow-hidden">
                    <tr class="bg-slate-100">
                        <th>ID</th>
                        <th>Trip</th>
                        <th>Accomodation</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th></th>
                    </tr>
                    <tr>
                    @foreach ($trips as $trip)
                    <tr>
                        <td>{{$trip->id}}</td>
                        <td>{{$trip->name}}</td>
                        <td>{{$trip->accomodation->name}}</td>
                        <td>{{$trip->accomodation->location?->name}}</td>
                        <td>{{$trip->accomodation->location?->country?->name}}</td>
                        <td class="text-right min-w-fit">
                        <a href="{{ route('admin.trip.show', $trip->id) }}" class="btn btn-secondary w-1/3 min-w-fit">Show</a>
                            <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.trip.destroy', $trip->id) }}" method="POST" id="trip{{$trip->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $trip->id }}" data-action="{{ route('admin.trip.destroy',$trip->id) }}" onclick="deleteConfirmation('trip{{$trip->id}}')"> Delete</button>
                            </td>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </table>
                @else
                <p>No trips</p>
                @endif
            </div>
        </div>
    </div>
</div>