<x-layout-admin>
    <section class="dashboard custom-container nav-margin">
        <div class="dashboard-header">
            <p class="fs-2 text-light fw-bold">Dashboard Guest</p>
        </div>
        <div class="dashboard-content">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">User Address</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
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
