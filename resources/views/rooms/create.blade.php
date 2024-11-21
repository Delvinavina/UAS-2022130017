<form action="{{ route('rooms.store') }}" method="POST">
    @csrf
    <label for="room_name">Room Name:</label>
    <input type="text" id="room_name" name="room_name" required><br>

    <label for="hotel_id">Hotel:</label>
    <select id="hotel_id" name="hotel_id" required>
        @foreach ($hotels as $hotel)
            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
        @endforeach
    </select><br>

    <button type="submit">Add Room</button>
</form>
