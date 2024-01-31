/**
 * Handle pada saat using klik baris data di table
 * kemudian munculkan tombol pindah kelas
 * set action attribute pada form
 */
function HandlePilihMurid(muridId) {
    const form = document.querySelector("#form-pindah-kelas");
    form.setAttribute("action", `/dashboard/murid/pindah/${muridId}`);

    // munculkan tombol pindah kelas
    const btn = document.querySelector("#btn-pindah-kelas");
    btn.classList.remove("d-none");

    // komponen identitas kelas
    const namaMurid = document.querySelector("#nama-murid");
    const kelasAsal = document.querySelector("#kelas-asal");

    // ambil detail murid data dari server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // ambil data dari server
            const res = JSON.parse(xhr.responseText);
            namaMurid.value = res.nama;
            kelasAsal.value = res.kelas.nama;
        }
    };
    xhr.open(`GET`, `/dashboard/murid/detail/${muridId}`, true);
    xhr.send();
}
