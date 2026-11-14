// Menampilkan detail dan menyembunyikan programme
function showDetailSection(id) {
    document.getElementById("programmeSection").classList.add("d-none");
    document.getElementById("detailSection").classList.remove("d-none");

    // Mengambil data dari backend menggunakan fetch
    // fetch(`/api/programme/${id}`)
    //     .then((response) => response.json())
    //     .then((data) => {
    //         // Menyediakan data detail berdasarkan respons backend
    //         const title = document.getElementById("detailTitle");
    //         const description = document.getElementById("detailDescription");
    //         const image = document.getElementById("detailImage");
    //         title.innerText = data.title; 
    //         description.innerText = data.description; 
    //         image.src = data.image_url; 
    //     })
    //     .catch((error) => {
    //         console.error("Terjadi kesalahan:", error);
    //     });
}

function showProgrammeSection1() {
    document.getElementById("detailSection").classList.add("d-none");
    document.getElementById("programmeSection").classList.remove("d-none");
}
