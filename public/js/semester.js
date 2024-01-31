/**
 * Menanyakan apakah user yakin atau tidak
 * ketika ingin menghapus data
 * jika yakin maka arahkan ke endpoint delete
 * namun jika tidak yakin maka jangan lakukan apa apa
 */
function DeleteSemester(csrf, userId) {
    Swal.fire({
        title: "Apakah anda yakin ?",
        text: "Data yang berkaitan dengan semester ini akan dihapus",
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
            xhr.open("DELETE", `/dashboard/semester/delete/${userId}`, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
            xhr.send();
        }
    });
}

/**
 * update status semester menjadi aktif atau tidak aktif
 */
function StatusToggle(element, csrf, id) {
    const aktif = element.checked;

    // kirim data ke server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            Swal.fire({
                title: "Status berhasil diubah",
                icon: "success",
            });

            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1000);
        }
    };

    xhr.open("PUT", `/dashboard/semester/status/${aktif ? "on" : "off"}/${id}`);
    xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
    xhr.send();
}
