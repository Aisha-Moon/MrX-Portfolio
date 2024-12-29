<div class="container-fluid">
     <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="card px-5 py-5 bg-light">
                 <div class="row justify-content-between">
                     <div class="col align-items-center">
                         <h4 class="text-gradient">About Section</h4>
                     </div>
                     <div class="col align-items-center">
                         <button onclick="showAboutForm()" class="float-end btn btn-primary bg-gradient-primary">
                             Update About Content
                         </button>
                     </div>
                 </div>
                 <hr class="bg-secondary" />
                 <div class="row">
                     <div class="col-md-6">
                         <h2 id="title" class="text-primary">Title</h2>
                         <p id="details" class="text-muted">Details</p>
                     </div>
                   
                 </div>
             </div>
         </div>
     </div>
 
     <div id="about-modal" class="modal fade" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Update About</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form id="about-form">
                         
                         <div class="mb-3">
                              <label for="modal-title" class="form-label">Title</label>
                              <input type="text" id="modal-title" class="form-control" required />
                          </div>
                          <div class="mb-3">
                              <label for="modal-details" class="form-label">Details</label>
                              <input type="text" id="modal-details" class="form-control" required />
                          </div>
                          
                       
                         <button type="button" class="btn btn-primary" onclick="saveAboutContent()">Save</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
function showAboutForm() {
    axios.get("/api/about")
        .then((res) => {
            if (res.status === 200 && res.data.data.length > 0) {
                const data = res.data.data[0]; 

                document.getElementById('modal-title').value = data.title || '';
                document.getElementById('modal-details').value = data.details || '';
                
                const modal = new bootstrap.Modal(document.getElementById('about-modal'));
                modal.show();
            } else {
                errorToast("No existing about data found."); 
            }
        })
        .catch((error) => {
            console.error("Error fetching about details:", error);
            errorToast("Failed to load about details.");
        });
}



getAboutDetails();

async function getAboutDetails() {
    try {
        showLoader();
        let res = await axios.get("/api/about");
        hideLoader();

        if (res.status === 200 && res.data.data.length > 0) {
            let data = res.data.data[0];

            document.getElementById('title').innerText = data.title || '';
            document.getElementById('details').innerText = data.details || '';
        } else {
            errorToast("No about data available.");
        }
    } catch (error) {
        hideLoader();
        console.error("Error fetching about details:", error);
        errorToast("Error fetching about details.");
    }
}

async function saveAboutContent() {
    try {
        showLoader();

        const formData = new FormData();
        formData.append('title', document.getElementById('modal-title').value);
        formData.append('details', document.getElementById('modal-details').value);
      

        let res = await axios.post('/api/about', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.status === 200 || res.status === 201) {
            successToast(res.data.message);
            getAboutDetails(); 
            const modal = bootstrap.Modal.getInstance(document.getElementById('about-modal'));
            modal.hide(); 
        } else {
            errorToast("Failed to save about content.");
        }
    } catch (error) {
        hideLoader();
        console.error("Error saving about content:", error);
        errorToast("Error saving about content.");
    }
}



</script>
