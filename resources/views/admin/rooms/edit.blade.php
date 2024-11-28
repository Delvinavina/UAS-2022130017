<x-layout-admin>
    <section class="custom-container nav-margin">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.rooms.update', ['room' => $room->room_id]) }}" method="POST" class="text-white"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="room_name" class="form-label text-white">Room Name</label>
                <input type="text" class="form-control" id="room_name" name="room_name"
                    value="{{ old('room_name', $room->room_name) }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Room Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="room_price" value="{{ old('room_price', $room->room_price) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Hotel Image</label>
                @if ($room->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $room->image) }}" alt="Hotel Image" width="150">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" value="{{ old('image', $room->image) }}">
            </div>
            <div class="mb-3">
                <label for="hotel_id" class="form-label text-white">Hotel For This Room</label>
                <select class="form-select" id="hotel_id" name="hotel_id" required>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->hotel_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn card-btn fw-2">Edit Room</button>
        </form>


    </section>
</x-layout-admin>
