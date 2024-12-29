<div class="container-fluid">
     <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="card px-5 py-5 bg-light">
                 <div class="row justify-content-between">
                     <div class="col align-items-center">
                         <h4 class="text-gradient">Experience Section</h4>
                     </div>
                     <div class="col align-items-center">
                         <button data-bs-toggle="modal"  data-bs-target="#experience-modal" class="float-end btn btn-primary bg-gradient-primary">
                             Add New Experience
                         </button>
                     </div>
                 </div>
                 <hr class="bg-secondary" />
                 <div id="experience-list" class="row">
                     <!-- Experience data dynamically added here -->
                 </div>
             </div>
         </div>
     </div>
 
    
 </div>
 
 <script>
     async function getExperienceList() {
          showLoader();
         try {
        
             const res = await axios.get("/api/experience");

          hideLoader();

             if (res.status === 200) {
                 const experiences = res.data.data;
                 let experienceListHTML = '';
                 experiences.forEach((experience) => {
                     experienceListHTML += `
                         <div class="col-md-6 mb-3">
                             <div class="card shadow-sm">
                                 <div class="card-body">
                                     <h5 class="text-primary">${experience.title}</h5>
                                     <p class="text-muted">${experience.designation}</p>
                                     <p>${experience.details}</p>
                                     <small class="text-secondary">${experience.duration}</small>
                                     <button data-id="${experience['id']}" data-name="${experience['name']}" class="btn bg-gradient-primary editBtn">Update</button>
                                     <button data-id="${experience['id']}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                                 </div>
                             </div>
                         </div>
                     `;
                 });
                 document.getElementById('experience-list').innerHTML = experienceListHTML;
 
                 // Attach event listeners
                 $('.editBtn').on('click', async function () {
                     let id = $(this).data('id');
                     $('#updateID').val(id); 
                     await FillUpUpdateForm(id); 
                     $('#update-experience').modal('show');
                 });
 
                 $('.deleteBtn').on('click', function () {
                     let id = $(this).data('id');
                     $('#deleteId').val(id);
                 });
             } else {
                 errorToast("No experiences available.");
             }
         } catch (error) {
          hideLoader();
             console.error("Error fetching experience details:", error);
             errorToast("Error fetching experience details.");
         }
     }
 
     getExperienceList();
 </script>
 