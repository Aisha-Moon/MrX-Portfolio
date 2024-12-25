  <!-- Languages list-->
  <div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
  
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
      
         <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
         <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Languages</span></h3>
     </div>
     <div class="row row-cols-1 row-cols-md-3 mb-4" id="language-list">
         {{-- <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">HTML</div></div> --}}
        
        </div>
                      
               
    </div>
  

</div>
</div>
</section>
</div>
</div>
</div>
<script>
    LanguageList();
    async function LanguageList() {
        try {
            let url = 'api/languageData';
                 // Show loader
                document.getElementById('loading-div').classList.remove('d-none');
                document.getElementById('content-div').classList.add('d-none');


            let res = await axios.get(url);

                 // Hide loader
                document.getElementById('loading-div').classList.add('d-none');
                document.getElementById('content-div').classList.remove('d-none');


                res.data.forEach(element => {
                    document.getElementById('language-list').innerHTML += `
                        <div class="col mb-4 mb-md-0 p-2">
                            <div class="d-flex  align-items-center bg-light rounded-4 p-3 h-100">
                                ${element.name}
                            </div>
                        </div>
                    `;
                });
          
        } catch (error) {
            alert('Error fetching language data: ' + error.message);
        }
    }
</script>
