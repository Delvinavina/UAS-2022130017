<x-layout-admin>
    <section class="dashboard custom-container nav-margin">
        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Reservation Room</p>
            <form action="{{ route('admin.reservations') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Find reservation here"
                        aria-describedby="button-addon2" value="{{ $keyword ?? '' }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="dashboard-content">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Check-In</th>
                        <th scope="col">Check-Out</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->room->room_name }}</td>
                            <td>{{ $reservation->check_in_date }}</td>
                            <td>{{ $reservation->check_out_date }}</td>
                            <td>{{ $reservation->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $reservations->links() }}
        </div>
    </section>
</x-layout-admin>
