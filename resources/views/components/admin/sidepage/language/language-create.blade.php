<!-- Modal for Adding New language -->
<div id="language-modal" class="modal fade" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="language-form">
                    <div class="mb-3">
                        <label for="language-name" class="form-label">language Name</label>
                        <input type="text" id="language-name" class="form-control" placeholder="Enter language name" required />
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addlanguage()">Save language</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function addlanguage() {
        const languageName = document.getElementById('language-name').value;

        if (!languageName.trim()) {
            errorToast("language name cannot be empty.");
            return;
        }

        showLoader();

        try {
            const res = await axios.post("/api/language", { name: languageName });

            hideLoader();

            if (res.status === 201 || res.status === 200) {
                successToast("language added successfully.");
                document.getElementById('language-name').value = ""; 
                const modal = bootstrap.Modal.getInstance(document.getElementById('language-modal'));
                modal.hide(); 
                getlanguageList(); 
            } else {
                errorToast("Failed to add language.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error adding language:", error);
            errorToast("Error adding language.");
        }
    }
</script>
