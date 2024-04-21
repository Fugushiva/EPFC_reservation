<form id="redirectForm" action="{{ route('reservation.post') }}" method="POST">
    @csrf
    <input type="hidden" name="representation_id" value="{{ Session::get('reservation_data.representation_id') }}">
    <input type="hidden" name="price_id" value="{{ Session::get('reservation_data.price_id') }}">
    <input type="hidden" name="quantity" value="{{ Session::get('reservation_data.quantity') }}">
    <!-- Soumettre automatiquement le formulaire -->
    <script>
        document.getElementById('redirectForm').submit();
    </script>
</form>
