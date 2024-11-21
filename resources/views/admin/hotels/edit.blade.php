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

        <form method="POST" action="{{ route('admin.hotels.update', $hotel->id) }}" class="text-white">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Hotel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hotel_name" value="{{ old('hotel_name', $hotel->hotel_name) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat Hotel</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_address"
                    value="{{ old('hotel_address', $hotel->hotel_address) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Kontak Hotel</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_contact"
                    value="{{ old('hotel_contact', $hotel->hotel_contact) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Deskripsi Hotel</label>
                <textarea class="form-control" id="exampleInputtext1" name="hotel_desc">{{ old('hotel_desc', $hotel->hotel_desc) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </section>
</x-layout-admin>
