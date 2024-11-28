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

        <form method="POST" action="{{ route('admin.hotels.store') }}" class="text-white" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Hotel Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hotel_name" value="{{ old('hotel_name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-white">Hotel Address</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_address"
                    value="{{ old('hotel_address') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label text-white">Hotel Contact</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="hotel_contact"
                    value="{{ old('hotel_contact') }}">
            </div>
            <div class="mb-3">
                <label for="image" for="exampleInputtext1" class="form-label text-white">Hotel Image</label>
                <input type="file" class="form-control" id="exampleInputtext1" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label text-white">Hotel Description</label>
                <textarea class="form-control" id="exampleInputtext1" name="hotel_desc">{{ old('hotel_desc') }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </section>
</x-layout-admin>
