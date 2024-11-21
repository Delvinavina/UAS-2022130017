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

        <form method="POST" action="{{ route('admin.rooms.store') }}" class="text-white">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Nama Hotel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="room_name" value="{{ old('room_name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Hotel:</label>
                <select class="form-select" name="hotel_id" required>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </section>
</x-layout-admin>
