@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto mt-5">
    <div class="bg-white rounded-lg shadow-sm p-5 whitespace-pre-line">
        <h1 class="m-0">Terms & Conditions</h1>
        <p>Last updated: {{$terms?->updated_at->toDateString()}}</p>
        <p>{{$terms?->description}}</p>
    </div>
</div>

@include('layouts.footer')