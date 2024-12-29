<div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <!-- Professional skills list-->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Professional Skills</span></h3>
                            </div>
                            <div class="row mb-4" id="skill-list">
                                <!-- Skills will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    SkillList();

async function SkillList() {
    try {
        let url = 'api/skillsData'; // API URL to fetch skills
        let res = await axios.get(url);

        const skillListContainer = document.getElementById('skill-list');
        let skillsHTML = '';

        res.data.forEach((element, index) => {
            skillsHTML += `
                <div class="col-12 mb-3">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary me-3">${index + 1}</span> <!-- Serial number -->
                        <div class="bg-light rounded-4 p-3 w-100">${element.name}</div>
                    </div>
                </div>
            `;
        });

        skillListContainer.innerHTML = skillsHTML;
    } catch (error) {
        alert('Error fetching skills data: ' + error.message);
    }
}

</script>