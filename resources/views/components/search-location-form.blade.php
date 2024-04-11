<div class="mb-16 mt-8">
    <form method="post" action="{{route('location.search')}}">
        @csrf
        <div class="container flex gap-5 items-center">
            <div class="flex items-center gap-3">
                <label for="designation">Nom</label>
                <input type="text" id="designation" name="designation" class="input-text">
            </div>
            <div class="flex items-center gap-3">
                <label for="address">adresse</label>
                <input type="text" id="address" name="address" class="input-text">
            </div>
            <div class="flex items-center gap-3">
                <label for="postcode">Code postal</label>
                <input type="number" id="postcode" name="postcode" class="input-checkbox">
            </div>
            <button class="button-validate">Valider</button>
        </div>
    </form>
</div>
