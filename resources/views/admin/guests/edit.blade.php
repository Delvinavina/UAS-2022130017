<x-layout-admin>
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

        <form method="POST" action="{{ route('admin.guests.update', $user->id) }}" class="text-white">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">User Email</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="email"
                    value="{{ old('email', $user->email) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">User Phone Number</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="phone_number"
                    value="{{ old('phone_number', $user->phone_number) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">User Role</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="role"
                    value="{{ old('role', $user->role) }}">
            </div>
            <button type="submit" class="card-btn btn fw-2">Edit</button>
        </form>
    </section>
</x-layout-admin>
