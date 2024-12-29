<!-- Modal for Updating Experience -->
<div id="update-experience" class="modal fade" tabindex="-1" aria-labelledby="experienceModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Update Experience</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="experience-form">
                    <input type="text" class="d-none" id="updateID">
                     <div class="mb-3">
                         <label for="modal-duration" class="form-label">Duration</label>
                         <input type="text" id="update-duration" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-title" class="form-label">Title</label>
                         <input type="text" id="update-title" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-designation" class="form-label">Designation</label>
                         <input type="text" id="update-designation" class="form-control" required />
                     </div>
                     <div class="mb-3">
                         <label for="modal-details" class="form-label">Details</label>
                         <textarea id="update-details" class="form-control" rows="4" required></textarea>
                     </div>
                     <button type="button" class="btn btn-primary" onclick="updateExperience()">Update</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     async function FillUpUpdateForm(id){

          $('#updateID').val(id);

        showLoader(); 
    
        try {
            const res = await axios.get(`/api/experience/${id}`); 
    
            hideLoader(); 
    
            if (res.status === 200) {
                const experience = res.data.data;
    
                document.getElementById('update-duration').value = experience.duration;
                document.getElementById('update-title').value = experience.title;
                document.getElementById('update-designation').value = experience.designation;
                document.getElementById('update-details').value = experience.details;
            } else {
                errorToast("Failed to load experience data.");
            }
        } catch (error) {
            hideLoader(); 
            console.error("Error fetching experience details:", error);
            errorToast("Error fetching experience details.");
        }
    }
    
    async function updateExperience() {
    const id = document.getElementById('updateID').value; 

    if (!id) {
        errorToast("Invalid experience ID.");
        return;
    }

    const formData = {
        duration: document.getElementById('update-duration').value,
        title: document.getElementById('update-title').value,
        designation: document.getElementById('update-designation').value,
        details: document.getElementById('update-details').value,
    };

    try {
        const res = await axios.put(`/api/experience/${id}`, formData);

        if (res.status === 200) {
            successToast("Experience updated successfully.");
            getExperienceList();  
            const modal = bootstrap.Modal.getInstance(document.getElementById('update-experience'));
            modal.hide();
        } else {
            errorToast("Failed to update experience.");
        }
    } catch (error) {
        console.error("Error updating experience:", error);
        errorToast("Error updating experience.");
    }
}

    </script>
    