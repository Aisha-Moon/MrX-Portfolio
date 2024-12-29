<div class="container-fluid">
     <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="card px-5 py-5 bg-light">
                 <div class="row justify-content-between">
                     <div class="col align-items-center">
                         <h4 class="text-gradient">Hero Section</h4>
                     </div>
                     <div class="col align-items-center">
                         <button onclick="showHeroForm()" class="float-end btn btn-primary bg-gradient-primary">
                             Update Hero Content
                         </button>
                     </div>
                 </div>
                 <hr class="bg-secondary" />
                 <!-- Hero Display Section -->
                 <div class="row">
                     <div class="col-md-6">
                         <h2 id="hero-title" class="text-primary">Hero Title</h2>
                         <h4 id="hero-subtitle" class="text-secondary">Hero Subtitle</h4>
                         <p id="hero-description" class="text-muted">Hero Keyline</p>
                     </div>
                     <div class="col-md-6 text-center">
                         <img id="hero-image" src="https://via.placeholder.com/300" alt="Hero Image" 
                             class="img-fluid rounded-4" style="max-height: 300px;">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
     <!-- Hero Form Modal -->
     <div id="hero-modal" class="modal fade" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Update Hero Content</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form id="hero-form">
                         <div class="mb-3">
                             <label for="keyLine" class="form-label">Keyline</label>
                             <input type="text" id="keyLine" class="form-control" required />
                         </div>
                         <div class="mb-3">
                             <label for="title" class="form-label">Title</label>
                             <input type="text" id="title" class="form-control" required />
                         </div>
                         <div class="mb-3">
                             <label for="subtitle" class="form-label">Subtitle</label>
                             <input type="text" id="subtitle" class="form-control" required />
                         </div>
                         <div class="mb-3">
                             <label for="image" class="form-label">Upload Image</label>
                             <input type="file" id="image" class="form-control" />
                         </div>
                         <button type="button" class="btn btn-primary" onclick="saveHeroContent()">Save</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
function showHeroForm() {
    axios.get("/api/hero")
        .then((res) => {
            if (res.status === 200 && res.data.data.length > 0) {
                const data = res.data.data[0]; 

                // Populate form fields
                document.getElementById('keyLine').value = data.keyLine || '';
                document.getElementById('title').value = data.title || '';
                document.getElementById('subtitle').value = data.short_title || '';
                document.getElementById('image').value = ''; 
                
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('hero-modal'));
                modal.show();
            } else {
                errorToast("No existing hero data found."); 
            }
        })
        .catch((error) => {
            console.error("Error fetching hero details:", error);
            errorToast("Failed to load hero details.");
        });
}

// Fetch hero details and display on the main page
getHeroDetails();

async function getHeroDetails() {
    try {
        showLoader();
        let res = await axios.get("/api/hero");
        hideLoader();

        if (res.status === 200 && res.data.data.length > 0) {
            let data = res.data.data[0];

            // Populate hero section
            document.getElementById('hero-title').innerText = data.title || '';
            document.getElementById('hero-subtitle').innerText = data.short_title || '';
            document.getElementById('hero-description').innerText = data.keyLine || '';
            document.getElementById('hero-image').src = data.image || 'default-image.jpg';
        } else {
            errorToast("No hero data available.");
        }
    } catch (error) {
        hideLoader();
        console.error("Error fetching hero details:", error);
        errorToast("Error fetching hero details.");
    }
}

// Save Hero Content (Create or Update)
async function saveHeroContent() {
    try {
        showLoader();

        const formData = new FormData();
        formData.append('keyLine', document.getElementById('keyLine').value);
        formData.append('title', document.getElementById('title').value);
        formData.append('short_title', document.getElementById('subtitle').value);
        const image = document.getElementById('image').files[0];
        if (image) {
            formData.append('image', image);
        }

        let res = await axios.post('/api/hero', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        hideLoader();

        if (res.status === 200 || res.status === 201) {
            successToast(res.data.message);
            getHeroDetails(); 
            const modal = bootstrap.Modal.getInstance(document.getElementById('hero-modal'));
            modal.hide(); 
        } else {
            errorToast("Failed to save hero content.");
        }
    } catch (error) {
        hideLoader();
        console.error("Error saving hero content:", error);
        errorToast("Error saving hero content.");
    }
}



</script>
