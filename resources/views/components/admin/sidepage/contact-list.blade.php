<div class="container-fluid">
     <div class="row">
         <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="card px-5 py-5">
                 <div class="row justify-content-between">
                     <div class="align-items-center col">
                         <h4>Contact</h4>
                     </div>
                 </div>
                 <hr class="bg-secondary" />
                 <div class="table-responsive">
                     <table class="table" id="contactTable">
                         <thead>
                             <tr class="bg-light">
                                 <th>No</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Message</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody id="TableList">
                             <!-- Data will be appended here -->
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>

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
     async function getContactList() {
         showLoader();
         try {
             const res = await axios.get('/api/contact'); 
             hideLoader();
 
             const TableList = $('#TableList');
             const contactTable = $('#contactTable');
 
             // Destroy existing DataTable and empty the table body before adding new rows
             contactTable.DataTable().destroy();
             TableList.empty();
 
             res.data.data.forEach((contact, index) => {
                 let row = `
                     <tr>
                         <td>${index + 1}</td>
                         <td>${contact.fullname}</td>
                         <td>${contact.email}</td>
                         <td>${contact.phone}</td>
                         <td><textarea readonly>${contact.message}</textarea></td>
                         <td>
                             <button data-id="${contact.id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn bg-gradient-danger deleteBtn">Delete</button>
                         </td>
                     </tr>
                 `;
                 TableList.append(row);
             });
 
             // Reinitialize DataTable after updating the rows
             contactTable.DataTable({
                 order: [[0, 'desc']],
                 lengthMenu: [5, 10, 15, 20],
             });
 
             $('.deleteBtn').on('click', function () {
                 const id = $(this).data('id');
                 $('#deleteId').val(id);
             });
 
         } catch (error) {
             hideLoader();
             console.error('Error fetching contacts:', error);
             errorToast('Failed to load contacts.');
         }
     }

     async function itemDelete(){
        let id = document.getElementById('deleteId').value; 
        document.getElementById('delete-modal-close').click();

        showLoader();

        try {
            let res = await axios.request({
                url: `api/contact/${id}`, 
                method: 'DELETE',        
                data: { id: id }           
            });

            hideLoader();

            if(res.status === 200) {
                successToast(res.data['message']);
                await getContactList();  
            } else {
                errorToast('Request Failed');
            }
        } catch (error) {
            hideLoader();
            console.error('Error deleting contact:', error);
            errorToast('Error deleting contact');
        }
    }
 
     // Initial call to load the contact list
     getContactList();
 </script>
 