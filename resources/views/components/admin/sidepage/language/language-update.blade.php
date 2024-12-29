<!-- Update language Modal -->
<div class="modal fade" id="update-language-modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <input type="hidden" id="updateID">
                    <div class="mb-3">
                        <label for="edit-language-name" class="form-label">language Name</label>
                        <input type="text" id="edit-language-name" class="form-control" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updatelanguage()">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function FillUpUpdateForm(id) {
        $('#updateID').val(id);


    try {
        const res = await axios.get(`/api/language/${id}`);
        if (res.status === 200) {
            const language = res.data;
            console.log(language);

             
            $('#edit-language-name').val(language.name); 
        } else {
            errorToast("Failed to load language data.");
        }
    } catch (error) {
        console.error("Error fetching language details:", error);
        errorToast("Error fetching language details.");
    }
}

async function updatelanguage() {
    const id = $('#updateID').val(); 
    const name = $('#edit-language-name').val(); 

    if (!name) {
        return errorToast("language name is required.");
    }

    try {
        const res = await axios.put(`/api/language/${id}`, { name });

        if (res.status === 200) {
            successToast("language updated successfully.");
            $('#update-language-modal').modal('hide');
            getlanguageList(); 
        } else {
            errorToast("Failed to update language.");
        }
    } catch (error) {
        console.error("Error updating language:", error);
        errorToast("Error updating language.");
    }
}


</script>