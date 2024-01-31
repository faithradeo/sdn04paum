/**
 * Menanyakan apakah user yakin atau tidak
 * ketika ingin menghapus data
 * jika yakin maka arahkan ke endpoint delete
 * namun jika tidak yakin maka jangan lakukan apa apa
 */
function DeleteGuru(message, csrf, userId) {
    Swal.fire({
        title: "Apakah anda yakin ?",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            // hapus data
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.status === 200) {
                    Swal.fire({
                        title: "Data berhasil dihapus",
                        icon: "success",
                    });

                    // refresh halaman
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 2000);
                }
            };

            xhr.open("DELETE", `/dashboard/guru/delete/${userId}`, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
            xhr.send();
        }
    });
}

/**
 * Menampilkan detail data guru pada pop up update data guru
 */
function DetailGuru(userId) {
    const form = document.querySelectorAll("#modal-input-guru")[1];
    form.setAttribute("action", `/dashboard/guru/update/${userId}`);

    const modal = new bootstrap.Modal(
        document.getElementById("modalUpdateGuru")
    );

    // input
    const nohp = document.querySelectorAll("#nohp")[1];
    const nuptk = document.querySelectorAll("#nuptklabel")[1];
    const nama = document.querySelectorAll("#namalabel")[1];
    const gender = document.querySelectorAll("#genderlabel")[1];
    const pendidikan = document.querySelectorAll("#pendidikanlabel")[1];
    const tempat_lahir = document.querySelectorAll("#tempatlahirlabel")[1];
    const tanggal_lahir = document.querySelectorAll("#tanggallabel")[1];

    // ambil data dari server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.status === 200 && xhr.readyState === 4) {
            // ambil data dari server
            const res = JSON.parse(xhr.responseText);

            // tampilkan pada form edit
            nohp.value = res.nohp;
            nuptk.value = res.nuptk;
            nama.value = res.nama;
            pendidikan.value = res.pendidikan;
            tempat_lahir.value = res.tempat_lahir;

            for (let i = 0; i < gender.options.length; i++) {
                if (gender.options[i].textContent === res.gender) {
                    gender.selectedIndex = i;
                    break;
                }
            }
            tanggal_lahir.value = new Date(res.tanggal_lahir)
                .toISOString()
                .split("T")[0];
        }
    };
    xhr.open("GET", `/dashboard/guru/detail/${userId}`, true);
    xhr.send();

    modal.show();
}
