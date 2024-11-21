<x-layout>
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

        <form method="POST" action="{{ route('rooms.update', $room->room_id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kamar</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="room_name" value="{{ old('room_name', $room->room_name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </section>
</x-layout>
