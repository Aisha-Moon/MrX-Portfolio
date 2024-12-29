<!-- Delete language Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="text-warning">Delete language</h3>
                <p>Are you sure you want to delete this language? This action cannot be undone.</p>
                <input type="hidden" id="deleteId"> <!-- Hidden input to store language ID -->
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deletelanguage()">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function deletelanguage() {
    const id = $('#deleteId').val(); 
    if (!id) {
        return errorToast("No language ID provided.");
    }

    try {
        const res = await axios.delete(`/api/language/${id}`);

        if (res.status === 200) {
            successToast("language deleted successfully.");
            $('#delete-modal').modal('hide'); 
            getlanguageList(); 
        } else {
            errorToast("Failed to delete language.");
        }
    } catch (error) {
        console.error("Error deleting language:", error);
        errorToast("Error deleting language.");
    }
}

</script>