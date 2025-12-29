<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CatsHome - Applicant's Requests</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/applicants-style.css') }}">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="logo">Admin CatsHome</h1>
        </div>
    </header>

    <div class="applicant-container">
        <a href="{{ url('/admin/dashboard') }}">
            <button class="back-btn">Back</button>
        </a>

        <div class="page-title">Applicant’s Request List</div>
        <div class="divider"></div>

        @foreach ($applicants as $applicant)
            <div class="applicant-row">
                <div class="applicant-name">
                    {{ $loop->iteration }}.
                    {{ $applicant->applicant_name }}
                    — {{ $applicant->cat->name }}
                </div>

                <div>
                    <form action="{{ url('/admin/adoption/'.$applicant->id.'/accept') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="action-btn accept-btn">Accept</button>
                    </form>

                    <form action="{{ url('/admin/adoption/'.$applicant->id.'/decline') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="action-btn decline-btn">Decline</button>
                    </form>

                    <button class="action-btn details-btn openApplicantModal"
                        data-name="{{ $applicant->applicant_name }}"
                        data-partner="{{ $applicant->partner_name ?? '-' }}"
                        data-phone="{{ $applicant->phone }}"
                        data-email="{{ $applicant->email }}"
                        data-age="{{ $applicant->age }}"
                        data-employment="{{ $applicant->employment }}"
                        data-address="{{ $applicant->address }}"
                        data-housing="{{ $applicant->housing }}"
                        data-cat="{{ $applicant->cat->name }}"
                        data-photo="{{ asset('storage/'.$applicant->cat->photo) }}"
                    >
                        Details
                    </button>
                </div>
            </div>
            <div class="divider"></div>
        @endforeach

    </div>

    @include('components.applicant-modal')

    <script>
        document.querySelectorAll('.openApplicantModal').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('modalName').innerText = btn.dataset.name;
                document.getElementById('modalPartner').innerText = btn.dataset.partner;
                document.getElementById('modalPhone').innerText = btn.dataset.phone;
                document.getElementById('modalEmail').innerText = btn.dataset.email;
                document.getElementById('modalAge').innerText = btn.dataset.age;
                document.getElementById('modalEmployment').innerText = btn.dataset.employment;
                document.getElementById('modalAddress').innerText = btn.dataset.address;
                document.getElementById('modalHousing').innerText = btn.dataset.housing;
                document.getElementById('modalCat').innerText = btn.dataset.cat;
                document.getElementById('modalCatPhoto').src = btn.dataset.photo;

                document.getElementById('applicantModal').style.display = 'flex';
            });
        });

        document.getElementById('closeApplicantModal').onclick = () => {
            document.getElementById('applicantModal').style.display = 'none';
        };
    </script>
</body>
</html>
