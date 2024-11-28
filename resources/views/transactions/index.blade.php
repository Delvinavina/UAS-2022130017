<x-layout>
    <section class="custom-container nav-margin">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-white">Transactions</h2>
        <form method="POST" action="{{ route('transactions.store', $reservation->id) }}">
            @csrf
            <div class="mb-3 text-white">
                <label for="exampleInputEmail1" class="form-label">Nama Kamar</label>
                <input class="form-control" id="disabledInput" type="text" name="reser_id"
                    value="{{ $reservation->room->room_name }}"
                    placeholder="{{ old('reser_id', $reservation->room->room_name) }}" disabled>
            </div>
            <div class="mb-3 text-white">
                <label for="exampleInputEmail1" class="form-label">Harga Kamar</label>
                <input class="form-control" id="disabledInput" type="text" name="room_price"
                    value="{{ $reservation->room->room_price }}"
                    placeholder="{{ old('reser_id', $reservation->room->room_price) }}" disabled>
            </div>
            <input type="hidden" name="reser_id" value="{{ $reservation->id }}">
            <input type="hidden" name="room_price" value="{{ $reservation->room->room_price }}">
            <div class="mb-3 text-white">
                <label for="method" class="form-label text-white">Metode Bayar:</label>
                <select class="form-select" id="method" name="method" required>
                    @foreach ($payment_methods as $method)
                        <option value="{{ $method->method_name }}">{{ $method->method_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn card-btn fw-2">Submit</button>
        </form>
    </section>
</x-layout>
