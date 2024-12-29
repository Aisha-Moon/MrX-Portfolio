<div class="modal animated zoomIn" id="delete-modal">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body text-center">
                 <h3 class=" mt-3 text-warning">Delete !</h3>
                 <p class="mb-3">Once delete, you can't get it back.</p>
                 <input class="d-none" id="deleteId"/> 
             </div>
             <div class="modal-footer justify-content-end">
                 <div>
                     <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                     <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger" >Delete</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     async function itemDelete(){
         let id=document.getElementById('deleteId').value;
         document.getElementById('delete-modal-close').click();


         showLoader();
               let res = await axios.request({
               url: `api/experience/${id}`, 
               method: 'DELETE',        
               data: { id: id }           
          });




         hideLoader();
         if(res.status===200){
             successToast(res.data['message']);
             await getExperienceList();
         }else{
             errorToast('Request Failed');
         }
     }
 </script>