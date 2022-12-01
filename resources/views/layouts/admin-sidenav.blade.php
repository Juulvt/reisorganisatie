<div class="basis-1/6 py-5 pl-10 pr-0 bg-white min-h-full">
    <h1 class="text-2xl pb-3">Admin Panel</h1>
    <ul class="pl-0 text-sm">
        <li class="py-3 {{ Request::is('admin') ? 'active' : '' }}"><a href={{ route('admin.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-house"></i></div> <div class="inline-block">Dashboard</div></a><li>
        <li class="py-3 {{ Request::is('admin/booking') ? 'active' : '' }}"><a href={{ route('admin.booking.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-calendar-week"></i></div> <div class="inline-block">Bookings</div></a><li>
        <li class="py-3 {{ Request::is('admin/trip') ? 'active' : '' }}"><a href={{ route('admin.trip.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-suitcase-rolling"></i></div> <div class="inline-block">Trips</div></a><li>
        <li class="py-3 {{ Request::is('admin/location') ? 'active' : '' }}"><a href={{ route('admin.location.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-location-dot"></i></div> <div class="inline-block">Locations</div></a><li>
        <li class="py-3 {{ Request::is('admin/user') ? 'active' : '' }}"><a href={{ route('admin.user.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-user"></i></div> <div class="inline-block">Users</div></a><li>
        <li class="py-3 {{ Request::is('admin/settings') ? 'active' : '' }}"><a href={{ route('admin.setting.index') }} class="flex justify-start items-center gap-3"><div class="inline-block w-1/6 text-xl"><i class="fa-solid fa-gear"></i></div> <div class="inline-block">General Settings</div></a><li>

    </ul>
</div>
