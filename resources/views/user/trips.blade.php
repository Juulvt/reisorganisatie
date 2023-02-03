@include('layouts.head')
@include('layouts.nav')
<script type="text/javascript">
    function deleteConfirmation(id) {
        form = $("form#" + id + "");
        Swal.fire({
            title: "Do you wish to cancel booking?",
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
        <h2 class="m-4">Your bookings</h2>
        @foreach ($user->bookings as $booking)
        @if ($booking->startdate > date('Y-m-d') && $booking->status == 'active')
        <div class="flex justify-between items-center gap-5 bg-slate-100 rounded-lg overflow-hidden mb-3 min-h-fit pr-5">
            <div class="flex-1 self-stretch relative overflow-hidden">
                @foreach ($booking->trip->images->slice(0, 1) as $image)
                    <img class="absolute -translate-y-1/2 -translate-x-1/2 left-1/2 top-1/2 min-h-full min-w-full" src={{$image->image_path}}>
                @endforeach
            </div>
            <div class="flex-1 flex flex-column gap-1 py-3">
                <h5>{{$booking->trip->name}}</h5>
                <span>{{$booking->startdate}} - {{$booking->enddate}}</span>
                <span>{{$booking->trip->accomodation->min_amount_visitors}}-{{$booking->trip->accomodation->max_amount_visitors}} visitors</span>
            </div>
            <div class="flex-1 flex flex-column gap-1 py-3">
                <span>price p.n.</span>
                <span>{{$booking->trip->accomodation->cost}}</span>
            </div>
            <div class="flex-1 flex gap-3">
                <form id="booking{{$booking->id}}" class="flex-1 basis-1/3" action="{{route('trips.update', $booking->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                </form>
                <button class="btn btn-remove inline-block width-full min-w-fit show-alert-delete-box" type="submit" onclick="deleteConfirmation('booking{{$booking->id}}')"> Cancel</button>
                <a href="{{ route('index.show', $booking->trip->id) }}" class="btn btn-secondary basis-1/3 min-w-fit flex-1">Show</a>
            </div>
        </div>
        @endif
        @endforeach

        <h2 class="my-4">History</h2>
        @foreach ($user->bookings as $booking)
        @if ($booking->startdate < date('Y-m-d') || $booking->status != 'active')
        <div class="flex justify-between items-center gap-5 bg-slate-100 rounded-lg overflow-hidden mb-3 min-h-fit pr-5">
            <div class="flex-1 self-stretch relative overflow-hidden">
                @foreach ($booking->trip->images->slice(0, 1) as $image)
                    <img class="absolute -translate-y-1/2 -translate-x-1/2 left-1/2 top-1/2 min-h-full min-w-full" src={{$image->image_path}}>
                @endforeach
            </div>
            <div class="flex-1 flex flex-column gap-1 py-3">
                <h5>{{$booking->trip->name}}</h5>
                <span>{{$booking->startdate}} - {{$booking->enddate}}</span>
                <span>{{$booking->trip->accomodation->min_amount_visitors}}-{{$booking->trip->accomodation->max_amount_visitors}} visitors</span>
            </div>
            <div class="flex-1 flex flex-column gap-1 py-3">
                <span>price p.n.</span>
                <span>{{$booking->trip->accomodation->cost}}</span>
            </div>
            <div class="flex-1 flex gap-10">
                <div class="basis-1/3 flex-1 bg-slate-200 flex items-center justify-center px-3">
                    <span>@if ($booking->status == 'canceled') Canceled @else Expired @endif</span>
                </div>
                <a href="{{ route('index.show', $booking->trip->id) }}" class="btn btn-secondary basis-1/3 min-w-fit flex-1">Show</a>
            </div>
        </div>
        @endif
        @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')