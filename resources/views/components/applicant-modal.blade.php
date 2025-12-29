<div id="applicantModal" class="applicant-modal-overlay" style="display: none;">
    <div class="applicant-modal-box">

        <!-- HEADER -->
        <div class="applicant-modal-header">
            <button id="closeApplicantModal" class="modal-back-btn">&larr;</button>
            <h1 class="modal-title">Applicant’s Details</h1>
        </div>

        <!-- CONTENT -->
        <div class="applicant-modal-content">

            <!-- KIRI : DATA APPLICANT -->
            <div class="applicant-info">
                <ul class="applicant-details">
                    <li>Applicant’s Name: <span id="modalName"></span></li>
                    <li>Spouse / Partner’s Name: <span id="modalPartner"></span></li>
                    <li>Phone Number: <span id="modalPhone"></span></li>
                    <li>Email: <span id="modalEmail"></span></li>
                    <li>Age: <span id="modalAge"></span></li>
                    <li>Are you currently: <span id="modalEmployment"></span></li>
                    <li>Address: <span id="modalAddress"></span></li>
                    <li>Do you: <span id="modalHousing"></span></li>
                </ul>
            </div>

            <!-- KANAN : FOTO + APPLIED FOR -->
            <div class="applicant-image-section">
                <img id="modalCatPhoto" class="applicant-image" alt="Cat Photo">

                <div class="applied-for">
                    Applied For: <span id="modalCat"></span>
                </div>
            </div>

        </div>
    </div>
</div>
