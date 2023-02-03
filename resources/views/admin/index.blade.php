@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
            <div class="flex gap-5 mb-5">
                <div class="basis-3/5 grid grid-cols-2 grid-rows-2 gap-3">
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Trips</h3>
                        <span>{{$trips->count()}}</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Revenue</h3>
                        <span>€{{$revenue}}</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Bookings</h3>
                        <span>{{$bookings->count()}}</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Users</h3>
                        <span>{{$users->count()}}</span>
                    </div>
                </div>
                <div class="basis-2/5 bg-white rounded-lg shadow-sm p-5">
                    <h2 class="text-xl">Newest Members</h2>
                    <table>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user?->name}}</td>
                            <td>{{$user?->email}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-5">
                <h2 class="pb-3 text-xl">Latest Bookings</h2>
                <table class="w-full rounded-lg overflow-hidden">
                    <tr class="bg-slate-100">
                        <th>ID</th>
                        <th>Trip</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>User</th>
                        <th>Starting Date</th>
                        <th>End Date</th>
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
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>