<!-- Modal for Adding/Editing Project -->
<div id="project-modal" class="modal fade" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="project-form">
                    <div class="mb-3">
                        <label for="modal-title" class="form-label">Title</label>
                        <input type="text" id="modal-title" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-previewLink" class="form-label">Preview Link</label>
                        <input type="url" id="modal-previewLink" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-thumbnailLink" class="form-label">Thumbnail Link</label>
                        <input type="url" id="modal-thumbnailLink" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-details" class="form-label">Details</label>
                        <textarea id="modal-details" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveProjectContent()">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    async function saveProjectContent() {
        const formData = {
            title: document.getElementById('modal-title').value,
            previewLink: document.getElementById('modal-previewLink').value,
            thumbnailLink: document.getElementById('modal-thumbnailLink').value,
            details: document.getElementById('modal-details').value,
        };

        try {
            const res = await axios.post("/api/projects", formData);

            if (res.status === 200 || res.status === 201) {
                successToast("Project saved successfully.");
                await getProjectList(); 
                const modal = bootstrap.Modal.getInstance(document.getElementById('project-modal'));
                modal.hide();
            } else {
                errorToast("Failed to save project.");
            }
        } catch (error) {
            console.error("Error saving project:", error);
            errorToast("Error saving project.");
        }
    }
</script>
