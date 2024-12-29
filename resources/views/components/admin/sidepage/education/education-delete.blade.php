<!-- Modal for Deleting Education -->
<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once deleted, you can't get it back.</p>
                <input class="d-none" id="deleteId"/> 
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to handle item deletion
    async function itemDelete(){
        let id = document.getElementById('deleteId').value; 
        document.getElementById('delete-modal-close').click();

        showLoader();

        try {
            let res = await axios.request({
                url: `api/education/${id}`, 
                method: 'DELETE',        
                data: { id: id }           
            });

            hideLoader();

            if(res.status === 200) {
                successToast(res.data['message']);
                await getEducationList();  
            } else {
                errorToast('Request Failed');
            }
        } catch (error) {
            hideLoader();
            console.error('Error deleting education:', error);
            errorToast('Error deleting education');
        }
    }
</script>
