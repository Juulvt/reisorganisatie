@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto">
    <div class="flex gap-5 about-container">
        <div class="flex-1 pr-5">
            <img src="../images/about.png">
        </div>
        <div class="flex-1 pl-5 flex flex-col items-start justify-center">
            <h2>Nice to meet you!</h2>
            <p>Here is text about this company and how amazing we are and how much we like our customers</p>
        </div>
    </div>
    <div class="relative columns-4 sm:columns-4 gap-8">
        <img class="w-full object-cover aspect-square rounded-lg" src="../images/about/group.jpg">
        <img class="w-full object-cover aspect-square rounded-lg" src="../images/about/pilot.jpg">
        <img class="w-full object-cover aspect-square rounded-lg" src="../images/about/women.jpg">
        <img class="w-full object-cover aspect-square rounded-lg" src="../images/about/plane.jpg">
    </div>
    <div class="about-container">
        <div>
            <h2>Our Story</h2>
            <div class="relative columns-2 sm:columns-2 gap-8">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et.</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et.</p>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')