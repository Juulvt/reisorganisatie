<footer class="pt-4">
    <div class="container mx-auto flex flex-wrap gap-1 pb-4">
        <div class="flex-1">
            <h2>Locatie</h2>
            <ul class="pl-0">
                <li><a href={{ route('index.index') }}>Home</a><li>
                <li><a href={{ route('about.index') }}>Over ons</a><li>
                <li><a href={{ route('contact.index') }}>Contact</a><li>
            </ul>
        </div>
        <div class="flex-1">
            <h2>Socials</h2>
            <ul class="pl-0">
                <li><a>Instagram</a><li>
                <li><a>Facebook</a><li>
                <li><a>LinkedIn</a><li>
            </ul>
        </div>
        <div class="flex-1">
            <h2>Over ons</h2>
            <p>Tekst over hoe geweldig dit bedrijf is. Waarom je bij ons wil boeken.</p>
        </div>
    </div>
    <div class="footer-extend py-2">
        <div class="container">
            <a>Privacy Policy</a>
            <a>Algemene voorwaarden</a>
        </div>
    </div>
</footer>
<script>
function toggleDropdown(idname) {
    document.getElementById(idname).classList.toggle("hidden");
}
</script>