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

        <form method="POST" action="{{ route('admin.hotels.update', $hotel->id) }}" class="text-white"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hotel_name" value="{{ old('hotel_name', $hotel->hotel_name) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Hotel Address</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_address"
                    value="{{ old('hotel_address', $hotel->hotel_address) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Hotel Contact</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_contact"
                    value="{{ old('hotel_contact', $hotel->hotel_contact) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Hotel Image</label>
                @if ($hotel->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" width="150">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" value="{{ old('image', $hotel->image) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Hotel Description</label>
                <textarea class="form-control" id="exampleInputtext1" name="hotel_desc">{{ old('hotel_desc', $hotel->hotel_desc) }}</textarea>
            </div>
            <button type="submit" class="btn card-btn fw-2">Edit Hotel</button>
        </form>
    </section>
</x-layout-admin>
