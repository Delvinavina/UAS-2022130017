<x-layout-admin>
    <section class="dashboard custom-container nav-margin">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Dashboard Room</p>
            <form action="{{ route('admin.rooms') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Find room name here"
                        aria-describedby="button-addon2" value="{{ $keyword ?? '' }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="dashboard-content">
            <a class="btn card-btn fw-2 mb-3" href="{{ route('admin.rooms.create') }}">Add Room</a>
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Room Name</th>
                        <th scope="col">Hotel Name</th>
                        <th scope="col">Room Price</th>
                        <th scope="col">Room Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->room_name }}</td>
                            <td>{{ $room->hotel->hotel_name ?? 'No Hotel Assigned' }}</td>
                            <td>{{ $room->room_price }}</td>
                            <td>{{ $room->room_status }}</td>
                            <td class="d-flex custom-gap">
                                <p>
                                    <a href="{{ route('admin.rooms.edit', $room->room_id) }}" class="link-light"
                                        style="text-decoration: none">
                                        Edit
                                    </a>
                                </p>
                                <p>
                                <form action="{{ route('admin.rooms.delete', $room) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="link-danger" style="background-color: transparent">Delete</button>
                                </form>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $rooms->links() }}
        </div>
    </section>
</x-layout-admin>
