<x-layout-admin>
    <section class="dashboard custom-container nav-margin">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Dashboard Hotels</p>
        </div>
        <div class="dashboard-content">
            <form action="{{ route('admin.hotels') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Find hotel name here"
                        aria-describedby="button-addon2" value="{{ $keyword ?? '' }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <a class="btn card-btn fw-2 mb-3" href="{{ route('admin.hotels.create') }}">Add Data</a>
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Hotel Name</th>
                        <th scope="col">Hotel Address</th>
                        <th scope="col">Hotel Contact</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->hotel_name }}</td>
                            <td>{{ $hotel->hotel_address }}</td>
                            <td>{{ $hotel->hotel_contact }}</td>
                            <td class="d-flex custom-gap">
                                <p>
                                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="link-light"
                                        style="text-decoration: none">
                                        Edit
                                    </a>
                                </p>
                                <p>
                                <form action="{{ route('admin.hotels.delete', $hotel) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="link-danger " style="background-color: transparent">Delete</button>
                                </form>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $hotels->links() }}
        </div>
    </section>
</x-layout-admin>
