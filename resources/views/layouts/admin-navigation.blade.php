<nav class="bg-white shadow-sm">
    <div class="px-5 flex justify-between gap-1 h-24 py-4">
        <a class="logo h-full" href={{ route('index.index') }}>
            <img class="h-full" src="{{ route('index.index') }}/images/logoalt.png" alt="logo">
        </a>
        <div>
            <h4>{{Auth::user()->name}}</h4>
        </div>
    </div>
</nav>