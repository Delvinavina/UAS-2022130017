<x-layout-admin>
    <section class="custom-container nav-margin">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.rooms.update', ['room' => $room->room_id]) }}" method="POST" class="text-white">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="room_name" class="form-label text-white">Nama Room</label>
                <input type="text" class="form-control" id="room_name" name="room_name"
                    value="{{ old('room_name', $room->room_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="hotel_id" class="form-label text-white">Hotel:</label>
                <select class="form-select" id="hotel_id" name="hotel_id" required>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->hotel_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>


    </section>
</x-layout-admin>
