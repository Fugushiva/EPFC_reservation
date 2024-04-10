<div class="mb-16 mt-8">
    <form method="post" action="{{route('show.search')}}">
        @csrf
        <div class="container flex gap-5 items-center">
            <div class="flex items-center gap-3">
                <label for="title">titre</label>
                <input type="text" id="title" name="title" class="input-text">
            </div>
            <div class="flex items-center gap-3">
                <label for="duration">durée</label>
                <input type="number" id="duration" name="duration" class="input-text">
            </div>
            <div class="flex items-center gap-3">
                <label for="bookable">Réservable</label>
                <input type="checkbox" id="bookable" name="bookable" class="input-checkbox">
            </div>
            <button class="button-validate">Valider</button>
        </div>
    </form>
</div>
