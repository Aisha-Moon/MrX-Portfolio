<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between">
                    <div class="align-items-center col">
                        <h4>languages</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#language-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary" />
                <div class="table-responsive">
                    <table class="table" id="languageTable">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>language</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="languageTableList">
                            <!-- language Data will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function getlanguageList() {
        showLoader();
        try {
            const res = await axios.get('/api/language'); 
            hideLoader();

            const languageTableList = $('#languageTableList');
            const languageTable = $('#languageTable');

            languageTable.DataTable().destroy();
            languageTableList.empty();

            res.data.forEach((language, index) => {
                let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${language.name}</td>
                        <td>
                            <button data-id="${language.id}" data-name="${language.name}" class="btn bg-gradient-primary editBtn">Update</button>
                            <button data-id="${language.id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                        </td>
                    </tr>
                `;
                languageTableList.append(row);
            });

            $('.editBtn').on('click', async function () {
                const id = $(this).data('id');
                $('#updateID').val(id); 
                await FillUpUpdateForm(id);
                $('#update-language-modal').modal('show');
            });

            $('.deleteBtn').on('click', function () {
                const id = $(this).data('id');
                $('#deleteId').val(id);
            });

            // Initialize DataTable
            new DataTable('#languageTable', {
                order: [[0, 'desc']],
                lengthMenu: [5, 10, 15, 20],
            });
        } catch (error) {
            hideLoader();
            console.error('Error fetching languages:', error);
            errorToast('Failed to load languages.');
        }
    }

    getlanguageList();
</script>
