<!-- Modal for Adding New Skill -->
<div id="skill-modal" class="modal fade" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="skill-form">
                    <div class="mb-3">
                        <label for="skill-name" class="form-label">Skill Name</label>
                        <input type="text" id="skill-name" class="form-control" placeholder="Enter skill name" required />
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addSkill()">Save Skill</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function addSkill() {
        const skillName = document.getElementById('skill-name').value;

        if (!skillName.trim()) {
            errorToast("Skill name cannot be empty.");
            return;
        }

        showLoader();

        try {
            const res = await axios.post("/api/skill", { name: skillName });

            hideLoader();

            if (res.status === 201 || res.status === 200) {
                successToast("Skill added successfully.");
                document.getElementById('skill-name').value = ""; 
                const modal = bootstrap.Modal.getInstance(document.getElementById('skill-modal'));
                modal.hide(); 
                getSkillList(); 
            } else {
                errorToast("Failed to add skill.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error adding skill:", error);
            errorToast("Error adding skill.");
        }
    }
</script>
