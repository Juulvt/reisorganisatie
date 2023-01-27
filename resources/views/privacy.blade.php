@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto mt-5">
    <div class="bg-white rounded-lg shadow-sm p-5 whitespace-pre-line">
        <h1 class="m-0">Privacy Policy</h1>
        <p>Last updated: {{$privacy?->updated_at->toDateString()}}</p>
        <p>{{$privacy?->description}}</p>
    </div>
</div>

@include('layouts.footer')