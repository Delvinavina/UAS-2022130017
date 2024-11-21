<x-layout>

    <section class="custom-container nav-margin">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card text-bg-dark mb-3" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h2>{{ $room->room_name }}</h2>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-white">Last updated 3 mins ago</small></p>

                        <form action="{{ route('transactions.store') }}" method="POST" class="text-white">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="hidden" name="room_id" value="{{ $room->room_id }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="check_in_date">Check-In Date</label>
                                <input class="form-control" type="date" name="check_in_date" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="check_out_date">Check-Out Date</label>
                                <input class="form-control" type="date" name="check_out_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <div class="d-flex gap-2 d-none">
                            <a href="{{ route('rooms.edit', $room->room_id) }}" class="btn fw-medium" type="button"
                                id="button-addon2">Edit</a>

                            <form action="{{ route('rooms.delete', $room) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
