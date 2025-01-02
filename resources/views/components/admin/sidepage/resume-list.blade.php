<div class="container-fluid">
     <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="card px-5 py-5 bg-light">
                 <div class="row justify-content-between">
                     <div class="col align-items-center">
                         <h4 class="text-gradient">Resume Section</h4>
                     </div>
                     <div class="col align-items-center">
                         <button onclick="showResumeForm()" class="float-end btn btn-primary bg-gradient-primary">
                             Update Resume Link
                         </button>
                     </div>
                 </div>
                 <hr class="bg-secondary" />
 
                 <!-- Resume Display Section -->
                 <div class="row">
                     <div class="col-md-6">
                         <h2 id="resume-link" class="text-primary">No Resume Link Available</h2>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
     <!-- Resume Form Modal -->
     <div id="resume-modal" class="modal fade" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Update Resume Link</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                    <form id="resume-form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="resume-file-input" class="form-label">Upload Resume (PDF)</label>
                            <input type="file" id="resume-file-input" class="form-control" accept="application/pdf" />
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveResumeContent()">Save</button>
                    </form>
                </div>
                
             </div>
         </div>
     </div>
 </div>
 
    <script>
    function showResumeForm() {
        const modal = new bootstrap.Modal(document.getElementById('resume-modal'));
        modal.show();
    }

    async function saveResumeContent() {
        try {
            showLoader();

            const fileInput = document.getElementById('resume-file-input');
            const file = fileInput.files[0];

            if (!file) {
                errorToast("Please select a file.");
                hideLoader();
                return;
            }

            const formData = new FormData();
            formData.append('resumeFile', file);

            let res = await axios.post('/api/resume', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            hideLoader();

            if (res.status === 200 || res.status === 201) {
                successToast(res.data.message);
                getResumeDetails();
                const modal = bootstrap.Modal.getInstance(document.getElementById('resume-modal'));
                modal.hide();
            } else {
                errorToast("Failed to save resume content.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error saving resume content:", error);
            errorToast("Error saving resume content.");
        }
    }

    async function getResumeDetails() {
        try {
            showLoader();
            let res = await axios.get("/api/resume");
            hideLoader();

            if (res.status === 200 && res.data.data) {
                let data = res.data.data;

                document.getElementById('resume-link').innerHTML = data.downloadLink
                    ? `<a href="${data.downloadLink}" target="_blank">${data.downloadLink}</a>`
                    : "No Resume Link Available";
            } else {
                errorToast("No resume data available.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error fetching resume details:", error);
            errorToast("Error fetching resume details.");
        }
    }
</script>

 