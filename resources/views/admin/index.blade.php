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
                        <span>31</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Revenue</h3>
                        <span>€10.200</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Bookings</h3>
                        <span>221</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-5 pb-3">
                        <h3 class="text-lg">Users</h3>
                        <span>{{count($users)}}</span>
                    </div>
                </div>
                <div class="basis-2/5 bg-white rounded-lg shadow-sm p-5">
                    <h2 class="text-xl">Newest Members</h2>
                    <table>
                        <tr>
                            <td>Juul van Tilburg</td>
                            <td>jt@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Juul van Tilburg</td>
                            <td>jt@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Juul van Tilburg</td>
                            <td>jt@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Juul van Tilburg</td>
                            <td>jt@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Juul van Tilburg</td>
                            <td>jt@gmail.com</td>
                        </tr>
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
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tripje naar Amsterdam</td>
                        <td>Amsterdam</td>
                        <td>Nederland</td>
                        <td>Juul van Tilburg</td>
                        <td>03-12-2023</td>
                        <td>23-12-2023</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>