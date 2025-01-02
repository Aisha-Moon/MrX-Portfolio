<!-- Modal for Updating Project -->
<div id="update-project" class="modal fade" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="project-form">
                   <input type="text" class="d-none" id="updateID">
                    <div class="mb-3">
                        <label for="update-title" class="form-label">Title</label>
                        <input type="text" id="update-title" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="update-previewLink" class="form-label">Preview Link</label>
                        <input type="url" id="update-previewLink" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="update-thumbnailLink" class="form-label">Thumbnail Link</label>
                        <input type="url" id="update-thumbnailLink" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="update-details" class="form-label">Details</label>
                        <textarea id="update-details" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="updateProject()">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

async function FillUpUpdateForm(id) {
    $('#updateID').val(id);

    showLoader();

    try {
        const res = await axios.get(`/api/projects/${id}`);

        hideLoader();

        if (res.status === 200) {
            const project = res.data.data;
            console.log(project);
            

            document.getElementById('update-title').value = project.title;
            document.getElementById('update-previewLink').value = project.previewLink;
            document.getElementById('update-thumbnailLink').value = project.thumbnailLink;
            document.getElementById('update-details').value = project.details;
        } else {
            errorToast("Failed to load project data.");
        }
    } catch (error) {
        hideLoader();
        console.error("Error fetching project details:", error);
        errorToast("Error fetching project details.");
    }
}
 
async function updateProject() {
    const id = document.getElementById('updateID').value;

    if (!id) {
        errorToast("Invalid project ID.");
        return;
    }

    const formData = {
        title: document.getElementById('update-title').value,
        previewLink: document.getElementById('update-previewLink').value,
        thumbnailLink: document.getElementById('update-thumbnailLink').value,
        details: document.getElementById('update-details').value,
    };

    try {
        const res = await axios.put(`/api/projects/${id}`, formData);

        if (res.status === 200) {
            successToast("Project updated successfully.");
            getProjectList(); // Refresh project list
            const modal = bootstrap.Modal.getInstance(document.getElementById('update-project'));
            modal.hide();
        } else {
            errorToast("Failed to update project.");
        }
    } catch (error) {
        console.error("Error updating project:", error);
        errorToast("Error updating project.");
    }
}

</script>