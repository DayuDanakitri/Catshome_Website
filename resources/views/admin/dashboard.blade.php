<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Cat's Home Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
</head>
<body>

<header class="admin-header">
    <div class="header-content">
        <h1 class="logo">Admin CatsHome</h1>

        <a href="{{ url('/admin/login') }}"
           class="logout-link"
           onclick="alert('Anda telah Logout. Mengarahkan ke halaman Login...');">
            Logout
        </a>
    </div>
</header>

<div class="dashboard-container">

    <div class="control-panel">
        <a href="{{ url('/admin/input_cats') }}" class="btn-primary">Add New Cats</a>
        <a href="{{ url('/admin/applicants') }}" class="btn-secondary">See Applicant's Req</a>
    </div>

    <div class="search-bar">
        <form action="{{ url('/admin/dashboard') }}" method="GET">
            <input type="text"
                   name="keyword"
                   placeholder="Insert Keyword...."
                   class="search-input"
                   value="{{ request('keyword') }}">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="data-table">

        <div class="table-row header-row">
            <div class="col-num">No</div>
            <div class="col-photo">Photo</div>
            <div class="col-name">Name</div>
            <div class="col-action">Action</div>
        </div>

        @forelse ($cats as $cat)
        <div class="table-row data-row">
            <div class="col-num">{{ $loop->iteration }}</div>

            <div class="col-photo">
                <img src="{{ asset('storage/'.$cat->photo) }}"
                     alt="Foto {{ $cat->name }}"
                     class="cat-photo">
            </div>

            <div class="col-name">
                <strong>{{ $cat->name }}</strong>
                <br>
                <small>Status: {{ $cat->status }}</small>
            </div>

            <div class="col-action">
                <a href="{{ route('admin.cat.edit', $cat->id) }}"
                    class="action-btn edit-btn">
                    Edit
                </a>

                <form action="{{ route('admin.cat.delete', $cat->id) }}"
                    method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="action-btn delete-btn"
                            onclick="return confirm('Yakin ingin menghapus data kucing ini?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="table-row data-row">
            <div class="col-name">No cat data available.</div>
        </div>
        @endforelse

    </div>
</div>

</body>
</html>
