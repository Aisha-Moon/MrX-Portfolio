<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5 bg-light">
                <div class="row justify-content-between">
                    <div class="col align-items-center">
                        <h4 class="text-gradient">Project Section</h4>
                    </div>
                    <div class="col align-items-center">
                        <button data-bs-toggle="modal" data-bs-target="#project-modal" class="float-end btn btn-primary bg-gradient-primary">
                            Add New Project
                        </button>
                    </div>
                </div>
                <hr class="bg-secondary" />
                <div id="project-list" class="row">
                    <!-- Project data dynamically added here -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function getProjectList() {
        showLoader();
        try {
            const res = await axios.get("/api/projects");

            hideLoader();

            if (res.status === 200) {
                const projectList = res.data.data;
                let projectListHTML = '';
                projectList.forEach((project) => {
                    projectListHTML += `
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="text-primary">${project.title}</h5>
                                    <p class="text-muted"><a href="${project.previewLink}" target="_blank">Preview Link</a></p>
                                    <img src="${project.thumbnailLink}" alt="Thumbnail" class="img-fluid mb-2" />
                                    <p>${project.details}</p>
                                    <button data-id="${project['id']}" class="btn bg-gradient-primary editBtn">Update</button>
                                    <button data-id="${project['id']}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                document.getElementById('project-list').innerHTML = projectListHTML;

                $('.editBtn').on('click', async function () {
                const id = $(this).data('id');
                $('#updateID').val(id); 
                await FillUpUpdateForm(id);
                $('#update-project').modal('show');
            });

            $('.deleteBtn').on('click', function () {
                const id = $(this).data('id');
                $('#deleteId').val(id);
            });
            } else {
                errorToast("No project data available.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error fetching project details:", error);
            errorToast("Error fetching project details.");
        }
    }

    getProjectList();
</script>
