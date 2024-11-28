<x-layout>
    <section class="custom-container nav-margin">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-white">Reservations</h2>
        <form action="{{ route('reservations.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Reservasi Anda Disini"
                    aria-describedby="button-addon2" value="{{ $keyword ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <div class="d-flex gap-2">

            @foreach ($reservations as $reservation)
                <div class="card text-bg-dark" style="width: 18rem;">
                    <div class="card-body">
                        <div class="mb-3 ">
                            <h4>{{ $reservation->room->hotel->hotel_name }}</h4>
                            <small class="text-secondary">{{ $reservation->room->hotel->hotel_address }}</small>
                        </div>
                        <h6 class="pb-3">Room: {{ $reservation->room->room_name }}</h6>
                        <ul>
                            <li>
                                <p>Check-in: {{ $reservation->check_in_date }}</p>
                            </li>
                            <li>
                                <p>Check-out: {{ $reservation->check_out_date }}</p>
                            </li>
                            <li>
                                <p>Transaction Status: {{ $reservation->status }}</p>
                            </li>
                        </ul>

                        @if ($reservation->status === 'Pending')
                            <a href="{{ route('transactions.index', $reservation->id) }}" class="btn btn-success w-100"
                                type="button" id="button-addon2">Pay Now</a>
                        @endif

                        @if ($reservation->status === 'Confirmed')
                            <form action="{{ route('reservations.checkout', $reservation->id) }}" method="POST">
                                @csrf
                                <button class="btn card-btn w-100">Checkout</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
