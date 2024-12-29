<!-- Modal for Updating Education -->
<div id="update-education" class="modal fade" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="education-form">
                   <input type="text" class="d-none" id="updateID">
                    <div class="mb-3">
                        <label for="modal-instituteName" class="form-label">Institute Name</label>
                        <input type="text" id="update-instituteName" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-field" class="form-label">Field of Study</label>
                        <input type="text" id="update-field" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-duration" class="form-label">Duration</label>
                        <input type="text" id="update-duration" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="modal-details" class="form-label">Details</label>
                        <textarea id="update-details" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="updateEducation()">Update</button>
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
             const res = await axios.get(`/api/education/${id}`);
   
             hideLoader(); 
   
             if (res.status === 200) {
                 const education = res.data.data;
   
                 document.getElementById('update-instituteName').value = education.instituteName;
                 document.getElementById('update-field').value = education.field;
                 document.getElementById('update-duration').value = education.duration;
                 document.getElementById('update-details').value = education.details;
             } else {
                 errorToast("Failed to load education data.");
             }
         } catch (error) {
             hideLoader(); 
             console.error("Error fetching education details:", error);
             errorToast("Error fetching education details.");
         }
     }
   
   async function updateEducation() {
       const id = document.getElementById('updateID').value;

       if (!id) {
           errorToast("Invalid education ID.");
           return;
       }

       const formData = {
           instituteName: document.getElementById('update-instituteName').value,
           field: document.getElementById('update-field').value,
           duration: document.getElementById('update-duration').value,
           details: document.getElementById('update-details').value,
       };

       try {
           const res = await axios.put(`/api/education/${id}`, formData);

           if (res.status === 200) {
               successToast("Education updated successfully.");
               getEducationList();  
               const modal = bootstrap.Modal.getInstance(document.getElementById('update-education'));
               modal.hide();
           } else {
               errorToast("Failed to update education.");
           }
       } catch (error) {
           console.error("Error updating education:", error);
           errorToast("Error updating education.");
       }
   }
</script>
