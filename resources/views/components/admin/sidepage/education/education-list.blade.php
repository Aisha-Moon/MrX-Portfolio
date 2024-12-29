<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5 bg-light">
                <div class="row justify-content-between">
                    <div class="col align-items-center">
                        <h4 class="text-gradient">Education Section</h4>
                    </div>
                    <div class="col align-items-center">
                        <button data-bs-toggle="modal" data-bs-target="#education-modal" class="float-end btn btn-primary bg-gradient-primary">
                            Add New Education
                        </button>
                    </div>
                </div>
                <hr class="bg-secondary" />
                <div id="education-list" class="row">
                    <!-- Education data dynamically added here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function getEducationList() {
        showLoader();
        try {
            const res = await axios.get("/api/education");

            hideLoader();

            if (res.status === 200) {
                const educationList = res.data.data;
                let educationListHTML = '';
                educationList.forEach((education) => {
                    educationListHTML += `
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-primary">${education.instituteName}</h5>
                                    <p class="text-muted">${education.field}</p>
                                    <p>${education.details}</p>
                                    <small class="text-secondary">${education.duration}</small>
                                    <button data-id="${education['id']}" data-name="${education['name']}" class="btn bg-gradient-primary editBtn">Update</button>
                                    <button data-id="${education['id']}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                document.getElementById('education-list').innerHTML = educationListHTML;

                // Attach event listeners
                $('.editBtn').on('click', async function () {
                    let id = $(this).data('id');
                    $('#updateID').val(id); 
                    await FillUpUpdateForm(id); 
                    $('#update-education').modal('show');
                });

                $('.deleteBtn').on('click', function () {
                    let id = $(this).data('id');
                    $('#deleteId').val(id);
                });
            } else {
                errorToast("No education data available.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error fetching education details:", error);
            errorToast("Error fetching education details.");
        }
    }

    getEducationList();
</script>
