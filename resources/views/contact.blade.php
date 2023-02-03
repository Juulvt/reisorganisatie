@include('layouts.head')
@include('layouts.nav')

<div class="container mx-auto py-5">
    <div class="flex flex-wrap gap-5">
        <div class="flex-1  py-5">
            <h2 class="mb-4">Contact Us</h2>
            <form name="contact" id="contact">
            <div class="flex gap-3 flex-wrap mb-3"> 
                <div class="flex-1"> 
                    <label for="firstname">First name</label>
                    <input class="placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " type="text" id="firstname" name="firstname" placeholder="Enter firstname...">
                </div>
                <div class="flex-1">
                    <label for="lastname">Last name</label>
                    <input class="placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " type="text" id="lastname" name="lastname" placeholder="Enter lastname...">
                </div>
            </div>
            <div class="flex gap-3 flex-wrap mb-3">
                <div class="flex-1"> 
                    <label for="email">E-mail</label>
                    <input class="placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " type="text" id="email" name="email" placeholder="youremail@gmail.com">
                </div>
                <div class="flex-1">
                    <label for="phone">Phone Number</label>
                    <input class="placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " type="text" id="phone" name="phone" placeholder="06 23547699">
                </div>
            </div>
            <div class="flex gap-3 flex-wrap mb-3">
                <div class="flex-1"> 
                    <label for="message">Message</label>
                    <textarea class="placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " rows="4" cols="50" name="message" form="contact" placeholder="Write your message..."></textarea>
                </div>
            </div>
            <input type="submit" value="Send Message">
            </form>
        </div>
        <div class="flex-1  py-5 contact-info">
            <div class="flex flex-col justify-between h-full px-5">
                <div class="flex-1">
                    <h2 class="mb-4">Contact information</h2>
                    <p><i class="fa-solid fa-phone"></i> {{$contact?->phone}}</p>
                    <p><i class="fa-solid fa-envelope"></i> {{$contact?->email}}</p>
                    <p><i class="fa-solid fa-location-dot"></i> {{$contact?->address}}</p>
                </div>
                <div class="socials">
                    <a href="{{$contact?->pinterest}}"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href="{{$contact?->facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{$contact?->instagram}}"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{$contact?->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')