 <!-- Modal for Adding/Editing Experience -->
 <div id="experience-modal" class="modal fade" tabindex="-1" aria-labelledby="experienceModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Experience</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="experience-form">
                     <div class="mb-3">
                         <label for="modal-duration" class="form-label">Duration</label>
                         <input type="text" id="modal-duration" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-title" class="form-label">Title</label>
                         <input type="text" id="modal-title" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-designation" class="form-label">Designation</label>
                         <input type="text" id="modal-designation" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-details" class="form-label">Details</label>
                         <textarea id="modal-details" class="form-control" rows="4" required></textarea>
                     </div>
                     <button type="button" class="btn btn-primary" onclick="saveExperienceContent()">Save</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <script>
     function saveExperienceContent() {
    const formData = {
        duration: document.getElementById('modal-duration').value,
        title: document.getElementById('modal-title').value,
        designation: document.getElementById('modal-designation').value,
        details: document.getElementById('modal-details').value,
    };

    axios.post("/api/experience", formData)
        .then((res) => {
            if (res.status === 200 || res.status === 201) {
                successToast("Experience saved successfully.");
                getExperienceDetails();
                const modal = bootstrap.Modal.getInstance(document.getElementById('experience-modal'));
                modal.hide();
            } else {
                errorToast("Failed to save experience.");
            }
        })
        .catch((error) => {
            console.error("Error saving experience:", error);
            errorToast("Error saving experience.");
        });
}
 </script>