<x-layout>

    <section class="custom-container nav-margin">
        <div class="card text-bg-dark mb-3" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    @if ($room->image)
                        <img src="{{ Storage::url($room->image) }}" class="card-img-top" alt="{{ $room->room_name }}">
                    @else
                        <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h2>{{ $room->room_name }}</h2>
                        <h5>Rp. {{ $room->room_price }} <small>/ Night</small>
                        </h5>
                        <p>Room Status : {{ $room->room_status }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-bg-dark mb-3" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <h2>Reservation Now</h2>
                        <form action="{{ route('reservations.store') }}" method="POST" class="text-white">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="hidden" name="room_id" value="{{ $room->room_id }}">
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label" for="check_in_date">Check-In Date</label>
                                    <input class="form-control" type="date" name="check_in_date" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label" for="check_out_date">Check-Out Date</label>
                                    <input class="form-control" type="date" name="check_out_date" required>
                                </div>
                            </div>
                            <div class="row px-2">
                                <button type="submit" class="btn card-btn fw-medium col-12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
