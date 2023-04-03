<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <h1>Register</h1>
    <form action="/login/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ Session::get('nama') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" value="{{ Session::get('username') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">No Telepon</label>
            <input type="number" name="No_Telepon" value="{{ Session::get('No_Telepon') }}"  class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>