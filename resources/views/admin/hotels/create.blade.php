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

        <form method="POST" action="{{ route('admin.hotels.store') }}" class="text-white">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Nama Hotel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hotel_name" value="{{ old('hotel_name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-white">Alamat Hotel</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_address"
                    value="{{ old('hotel_address') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label text-white">Kontak Hotel</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_contact"
                    value="{{ old('hotel_contact') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label text-white">Deskripsi Hotel</label>
                <textarea class="form-control" id="exampleInputtext1" name="hotel_desc">{{ old('hotel_desc') }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </section>
</x-layout-admin>
