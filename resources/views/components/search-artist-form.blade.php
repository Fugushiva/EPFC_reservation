<div class="mb-16 mt-8">
    <form method="post" action="{{route('artist.search')}}">
        @csrf
        <div class="container flex items-center gap-10">
            <div class="flex items-center gap-3">
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" class="input-text">
            </div>
            <div class="flex items-center gap-3">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" class="input-text">
            </div>
            <button class="button-validate">Chercher</button>
        </div>
    </form>
</div>
