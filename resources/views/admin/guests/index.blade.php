<x-layout-admin>
    <section class="dashboard custom-container nav-margin">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Dashboard Guest</p>
            <form action="{{ route('admin.guests') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Find user name here"
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
                        <th scope="col">User Email</th>
                        <th scope="col">User Phone Number</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="d-flex custom-gap">
                                <p>
                                    <a href="{{ route('admin.guests.edit', $user->id) }}" class="link-light"
                                        style="text-decoration: none">
                                        Edit
                                    </a>
                                </p>
                                <p>
                                <form action="{{ route('admin.guests.delete', $user) }}" method="post">
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
            {{ $users->links() }}
        </div>
    </section>
</x-layout-admin>
