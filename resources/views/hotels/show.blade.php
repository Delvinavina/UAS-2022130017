<x-layout>
    <section class="custom-container nav-margin text-white" style="height: 100vh; width: 100%;">
        <div class="card text-bg-dark mb-3" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    @if ($hotel->image)
                        <img src="{{ Storage::url($hotel->image) }}" class="card-img-top" alt="{{ $hotel->hotel_name }}">
                    @else
                        <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h2>{{ $hotel->hotel_name }}</h2>
                        <p class="card-text"><small class="text-body-white">{{ $hotel->hotel_address }}</small></p>
                        <p class="card-text">{{ $hotel->hotel_desc }}</p>
                        <div class="d-flex gap-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Available Rooms</h3>
        @if ($hotel->rooms->isEmpty())
            <p>No rooms available for this hotel.</p>
        @else
            <div class="card-group">
                <div class="row w-100">
                    @foreach ($hotel->rooms as $room)
                        <div class="col-md-3 pb-2">
                            <div class="card text-bg-dark">
                                @if ($room->image)
                                    <img src="{{ Storage::url($room->image) }}" class="card-img-top"
                                        alt="{{ $room->room_name }}" height="200px">
                                @else
                                    <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="card-img-top"
                                        alt="Default Image" height="200px">
                                @endif
                                <div class="card-body">
                                    <h4>{{ $room->room_name }}</h4>
                                    <h6>Rp. {{ $room->room_price }} <small>/ Night</small>
                                    </h6>
                                    <p>Room Status : {{ $room->room_status }}</p>
                                    <a href="{{ route('rooms.show', $room->room_id) }}" class="btn fw-medium"
                                        type="button">
                                        View Room
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layout>
