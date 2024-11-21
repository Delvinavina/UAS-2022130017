<x-layout-admin>
    <section class="dashboard custom-container nav-margin">
        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Dashboard Room</p>
        </div>
        <div class="dashboard-content">
            <a class="btn btn-secondary mb-3" href="{{ route('admin.rooms.create') }}">Tambah Data</a>
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Room Name</th>
                        <th scope="col">Hotel Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->room_name }}</td>
                            <td>{{ $room->hotel->hotel_name ?? 'No Hotel Assigned' }}</td>
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

                                    <button class="link-danger " style="background-color: transparent">Delete</button>
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
