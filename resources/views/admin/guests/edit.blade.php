<x-layout-admin>
    <section class="custom-container nav-margin">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('admin.guests.update', $user->id) }}" class="text-white">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Guest</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat Guest</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="email"
                    value="{{ old('email', $user->email) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Role Guest</label>
                <input type="text" class="form-control" id="exampleInputtext1" name="role"
                    value="{{ old('role', $user->role) }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </section>
</x-layout-admin>
