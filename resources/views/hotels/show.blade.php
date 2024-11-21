<x-layout>
    <section class="custom-container nav-margin text-white" style="height: 100vh; width: 100%;">
        <div class="card text-bg-dark mb-3" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h2>{{ $hotel->hotel_name }}</h2>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-white">Last updated 3 mins ago</small></p>
                        <div class="d-flex gap-2">
                            {{-- <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-secondary fw-medium"
                                type="button" id="button-addon2">Edit</a>
                            <form action="{{ route('hotel.delete', $hotel) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-secondary fw-medium">Delete</button>
                            </form> --}}
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
                <div class="row g-0">
                    @foreach ($hotel->rooms as $room)
                        <div class="col-md-3 pe-2">
                            <div class="card text-bg-dark">
                                <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="card-img-top">
                                <div class="card-body">
                                    <h4>{{ $room->room_name }}</h4>
                                    <p>Room ID: {{ $room->room_id }}</p>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
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
