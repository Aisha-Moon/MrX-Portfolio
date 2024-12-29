<!-- Delete Skill Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="text-warning">Delete Skill</h3>
                <p>Are you sure you want to delete this skill? This action cannot be undone.</p>
                <input type="hidden" id="deleteId"> <!-- Hidden input to store skill ID -->
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteSkill()">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function deleteSkill() {
    const id = $('#deleteId').val(); 
    if (!id) {
        return errorToast("No skill ID provided.");
    }

    try {
        const res = await axios.delete(`/api/skill/${id}`);

        if (res.status === 200) {
            successToast("Skill deleted successfully.");
            $('#delete-modal').modal('hide'); 
            getSkillList(); 
        } else {
            errorToast("Failed to delete skill.");
        }
    } catch (error) {
        console.error("Error deleting skill:", error);
        errorToast("Error deleting skill.");
    }
}

</script>