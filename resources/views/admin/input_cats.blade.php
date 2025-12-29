<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CatsHome - Input Cats Data</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
</head>
<body>

<header class="admin-header">
    <div class="header-content">
        <h1 class="logo">Admin CatsHome</h1>
    </div>
</header>

<div class="dashboard-container" style="padding: 40px;">
    <div class="page-header">Input Cats Data</div>

    <a href="{{ url('/admin/dashboard') }}" class="back-link">
        Back to Admin CatsHome Page
    </a>

    <form action="{{ url('/admin/input_cats') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="input-label">Name</label>
            <input type="text" name="name" class="input-text" required>
        </div>

        <div class="form-group">
            <label class="input-label">Gender</label>
            <select name="gender" class="input-text" required>
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label class="input-label">Age (years)</label>
            <input type="number" name="age" class="input-text" required>
        </div>

        <div class="form-group">
            <label class="input-label">Breed</label>
            <input type="text" name="breed" class="input-text" required>
        </div>

        <div class="form-group">
            <label class="input-label">Location</label>
            <input type="text" name="location" class="input-text" required>
        </div>

        <div class="form-group">
            <label class="input-label">Photo</label>

            <input type="file" name="photo" class="input-text" accept="image/*" required>
        </div>

        <div class="form-group">
            <label class="input-label">Description</label>
            <textarea name="description" class="textarea-desc" required></textarea>
        </div>

        <button type="submit" class="btn-save">
            Save Data
        </button>
    </form>
</div>

</body>
</html>
