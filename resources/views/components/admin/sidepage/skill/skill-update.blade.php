<!-- Update Skill Modal -->
<div class="modal fade" id="update-skill-modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <input type="hidden" id="updateID">
                    <div class="mb-3">
                        <label for="edit-skill-name" class="form-label">Skill Name</label>
                        <input type="text" id="edit-skill-name" class="form-control" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateSkill()">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function FillUpUpdateForm(id) {
        $('#updateID').val(id);


    try {
        const res = await axios.get(`/api/skill/${id}`);
        if (res.status === 200) {
            const skill = res.data;
            console.log(skill);

             
            $('#edit-skill-name').val(skill.name); 
        } else {
            errorToast("Failed to load skill data.");
        }
    } catch (error) {
        console.error("Error fetching skill details:", error);
        errorToast("Error fetching skill details.");
    }
}

async function updateSkill() {
    const id = $('#updateID').val(); 
    const name = $('#edit-skill-name').val(); 

    if (!name) {
        return errorToast("Skill name is required.");
    }

    try {
        const res = await axios.put(`/api/skill/${id}`, { name });

        if (res.status === 200) {
            successToast("Skill updated successfully.");
            $('#update-skill-modal').modal('hide');
            getSkillList(); 
        } else {
            errorToast("Failed to update skill.");
        }
    } catch (error) {
        console.error("Error updating skill:", error);
        errorToast("Error updating skill.");
    }
}


</script>