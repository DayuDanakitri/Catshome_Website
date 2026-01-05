<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Cat Data</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
</head>
<body>

<header class="admin-header">
    <h1 class="logo">Edit Cat Data</h1>
</header>

<div class="dashboard-container" style="padding:40px">

<a href="{{ url('/admin/dashboard') }}" class="back-link">Back</a>

<form action="{{ route('admin.cat.update', $cat->id) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ $cat->name }}" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select name="gender" required>
            <option value="Male" {{ $cat->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $cat->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" value="{{ $cat->age }}" required>
    </div>

    <div class="form-group">
        <label>Breed</label>
        <input type="text" name="breed" value="{{ $cat->breed }}" required>
    </div>

    <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" value="{{ $cat->location }}" required>
    </div>

    <div class="form-group">
        <label>Photo (optional)</label>

        <input type="file" name="photo" id="photoInput" accept="image/*">

        <br><br>

        <img
            id="photoPreview"
            src="{{ asset('storage/'.$cat->photo) }}"
            width="120"
            alt="Cat photo preview"
        >
    </div>


    <div class="form-group">
        <label>Description</label>
        <textarea name="description" required>{{ $cat->bio }}</textarea>
    </div>

    <button type="submit" class="btn-save">Update Data</button>
</form>

</div>

    <script>
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');

        photoInput.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                photoPreview.src = URL.createObjectURL(file);
            }
        });
    </script>
</body>
</html>
