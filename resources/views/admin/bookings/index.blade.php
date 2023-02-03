@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-xl">Bookings</h2>
                </div>
                @if (!empty($bookings))
                <table class="w-full rounded-lg overflow-hidden">
                    <tr class="bg-slate-100">
                        <th>ID</th>
                        <th>Trip</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>User</th>
                        <th>Starting Date</th>
                        <th>End Date</th>
                        <th></th>
                    </tr>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{$booking->id}}</td>
                        <td>{{$booking->trip->name}}</td>
                        <td>{{$booking->trip->accomodation->location->name}}</td>
                        <td>{{$booking->trip->accomodation->location->country->name}}</td>
                        <td>{{$booking->user->name}}</td>
                        <td>{{$booking->startdate}}</td>
                        <td>{{$booking->enddate}}</td>
                        <td>
                        <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" id="booking{{$booking->id}}">
                        @csrf
                        @method('DELETE')
                        </form>
                        <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $booking->id }}" data-action="{{ route('admin.booking.destroy',$booking->id) }}" onclick="deleteConfirmation('booking{{$booking->id}}')"> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @else
                <p>No Bookings</p>
                @endif
            </div>
        </div>
    </div>
</div>