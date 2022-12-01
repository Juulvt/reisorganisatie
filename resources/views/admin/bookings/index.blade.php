@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Trips</h2>
                    <div class="btn btn-primary">
                        Add Location
                    </div>
                </div>
                <div class="flex justify-end gap-3 py-3">
                    <div class="basis-1/4">
                        <label>Country</label>
                        <select class="rounded bg-slate-100" name="location" id="location">
                                <option value="Nederland">Nederland</option>
                                <option value="Nederland">Nederland</option>
                                <option value="Nederland">Nederland</option>
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