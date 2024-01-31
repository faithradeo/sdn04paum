/**
 * Menanyakan apakah user yakin atau tidak
 * ketika ingin menghapus data
 * jika yakin maka arahkan ke endpoint delete
 * namun jika tidak yakin maka jangan lakukan apa apa
 */
function DeleteMurid(csrf, muridId) {
    Swal.fire({
        title: "Apakah anda yakin ?",
        text: "Data yang berhubungan dengan murid ini juga akan dihapus",
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

            xhr.open("DELETE", `/dashboard/murid/delete/${muridId}`, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
            xhr.send();
        }
    });
}
