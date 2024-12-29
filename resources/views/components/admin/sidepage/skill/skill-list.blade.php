<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between">
                    <div class="align-items-center col">
                        <h4>Skills</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#skill-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary" />
                <div class="table-responsive">
                    <table class="table" id="skillTable">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>Skill</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="skillTableList">
                            <!-- Skill Data will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function getSkillList() {
        showLoader();
        try {
            const res = await axios.get('/api/skill'); 
            hideLoader();

            const skillTableList = $('#skillTableList');
            const skillTable = $('#skillTable');

            skillTable.DataTable().destroy();
            skillTableList.empty();

            res.data.forEach((skill, index) => {
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${skill.name}</td>
                        <td>
                            <button data-id="${skill.id}" data-name="${skill.name}" class="btn bg-gradient-primary editBtn">Update</button>
                            <button data-id="${skill.id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                        </td>
                    </tr>
                `;
                skillTableList.append(row);
            });

            $('.editBtn').on('click', async function () {
                const id = $(this).data('id');
                $('#updateID').val(id); 
                await FillUpUpdateForm(id);
                $('#update-skill-modal').modal('show');
            });

            $('.deleteBtn').on('click', function () {
                const id = $(this).data('id');
                $('#deleteId').val(id);
            });

            // Initialize DataTable
            new DataTable('#skillTable', {
                order: [[0, 'desc']],
                lengthMenu: [5, 10, 15, 20],
            });
        } catch (error) {
            hideLoader();
            console.error('Error fetching skills:', error);
            errorToast('Failed to load skills.');
        }
    }

    getSkillList();
</script>
