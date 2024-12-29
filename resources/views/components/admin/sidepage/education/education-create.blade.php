<!-- Modal for Adding/Editing Education -->
<div id="education-modal" class="modal fade" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="education-form">
                    <div class="mb-3">
                        <label for="modal-duration" class="form-label">Duration</label>
                        <input type="text" id="modal-duration" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-instituteName" class="form-label">Institute Name</label>
                        <input type="text" id="modal-instituteName" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-field" class="form-label">Field</label>
                        <input type="text" id="modal-field" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-details" class="form-label">Details</label>
                        <textarea id="modal-details" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveEducationContent()">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function saveEducationContent() {
        const formData = {
            duration: document.getElementById('modal-duration').value,
            instituteName: document.getElementById('modal-instituteName').value,
            field: document.getElementById('modal-field').value,
            details: document.getElementById('modal-details').value,
        };

        try {
            const res = await axios.post("/api/education", formData);

            if (res.status === 200 || res.status === 201) {
                successToast("Education saved successfully.");
                await getEducationDetails();
                const modal = bootstrap.Modal.getInstance(document.getElementById('education-modal'));
                modal.hide();
            } else {
                errorToast("Failed to save education.");
            }
        } catch (error) {
            console.error("Error saving education:", error);
            errorToast("Error saving education.");
        }
    }
</script>
