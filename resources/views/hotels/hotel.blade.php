<x-layout>
    <section class="hotels custom-container nav-margin">
        <div class="hotels-header">
            <p class="fs-2 text-light fw-bold">Hotel List</p>
            <form action="{{ route('hotels') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari User Disini"
                        aria-describedby="button-addon2" value="{{ $keyword ?? '' }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="hotels-list">

            <div class="card-group">
                <div class="row w-100">
                    @foreach ($hotels as $hotel)
                        <div class="col-md-3 pb-2">
                            <div class="card mb-2">
                                @if ($hotel->image)
                                    <img src="{{ Storage::url($hotel->image) }}" class="card-img-top"
                                        alt="{{ $hotel->hotel_name }}">
                                @else
                                    <img src="{{ asset('Image/hotel-content-1.jpg') }}" class="card-img-top"
                                        alt="Default Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $hotel->hotel_name }}</h5>
                                    <p class="card-title">{{ $hotel->hotel_address }}</p>
                                    <a href="{{ route('hotel.show', $hotel->id) }}" class="btn fw-medium" type="button"
                                        id="button-addon2">Book a Room</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $hotels->links() }}
        </div>
        {{-- <a class="btn btn-outline-secondary" href="{{ route('hotel.create') }}"><i class="bi bi-search"></i></a> --}}
    </section>
</x-layout>
