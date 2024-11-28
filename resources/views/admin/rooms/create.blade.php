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

        <form method="POST" action="{{ route('admin.rooms.store') }}" class="text-white" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Room Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="room_name" value="{{ old('room_name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Room Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="room_price" value="{{ old('room_price') }}">
            </div>
            <div class="mb-3">
                <label for="image" for="exampleInputtext1" class="form-label text-white">Room Image</label>
                <input type="file" class="form-control" id="exampleInputtext1" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Hotel For This Room</label>
                <select class="form-select" name="hotel_id" required>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn card-btn fw-2">Submit</button>
        </form>
    </section>
</x-layout-admin>
