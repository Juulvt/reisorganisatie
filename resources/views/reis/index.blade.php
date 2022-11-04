@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto px-50 py-5">
    
    <div class="flex flex-wrap gap-5">
        @forelse ($locations as $location)
        <div class="flex-1 flex flex-column bg-white rounded overflow-hidden">
            <div class="flex-1 image-container">
                <img src={{$location->image_path}}>
            </div>
            <div class="flex-1 p-3">
                <div>
                    <h5>{{ $location->name }}</h5>
                </div>
                <div>
                    <a class="btn primary" href={{ route('reis.show', ['id' => $location->id])}}>Bekijk Reis</a>
                </div>
            </div>
        </div>
        @empty
            <p>No Locations available</p>
        @endforelse
    </div>

</div>

@include('layouts.footer')