<div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <!-- Professional skills list-->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                    <i class="bi bi-book"></i>
                                </div>
                                <h3 class="fw-bolder mb-0">
                                    <span class="text-gradient d-inline">Education</span>
                                </h3>
                            </div>
                            <!-- Education Card 1-->
                            <div class="" id="education-list">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    EducationList();
    async function EducationList() {
        try {
            let url='api/educationData';

            let res=await axios.get(url);
            if(res.data){
                res.data.forEach(element => {
                    document.getElementById('education-list').innerHTML+=` 
                        <div class="card shadow border-0 rounded-4 mb-5" > 
                     <div class="card-body p-2">
             <div class="row align-items-center gx-5 p-2"> 
                                  <div class="col text-center text-lg-start mb-4 mb-lg-0">
                     <div class="bg-light p-4 rounded-4">
                        <div class="bg-light p-4 rounded-4">
                            <div class="text-secondary fw-bolder mb-2">${element.duration}</div>
                            <div class="mb-2">
                                <div class="small fw-bolder">${element.instituteName}</div>
                            </div>
                            <div class="fst-italic">
                                <div class="small text-muted">${element.field}</div>
                            </div>
                        </div>
                     </div>
                 </div>
                 <div class="col-lg-8"><div>${element.details}</div></div>
                    </div>
         </div>
         </div>

                    `;
                });
            }
        } catch (error) {
            alert(error);
        }
    }
</script>