/**
 * Mencari guru berdasarkan kriteria yang diinginkan oleh client
 */
function cariGuru(origin) {
    let listGuru, input;

    if (origin === "update") {
        listGuru = document.querySelector("#list-guru-update");
        input = document.querySelector("#namaWaliUpdate");
    } else {
        listGuru = document.querySelector("#list-guru");
        input = document.querySelector("#namaWali");
    }

    const inputValue = input.value;

    listGuru.innerHTML = "";

    if (inputValue.length > 0) {
        // ambil data dari server
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const res = JSON.parse(xhr.responseText);

                if (res.data.length > 0) {
                    listGuru.classList.remove("d-none");

                    // tampilkan list guru
                    res.data.forEach((items) => {
                        const el = document.createElement("div");
                        el.classList.add("p-3");
                        el.classList.add("border-bottom");
                        el.style.cursor = "pointer";
                        el.onclick = () =>
                            handlePilihGuru(items.id, items.nama, origin);

                        const elName = document.createElement("span");
                        elName.classList.add("fw-semibold");
                        elName.innerHTML = items.nama;
                        el.appendChild(elName);

                        listGuru.appendChild(el);
                    });
                }
            }
        };
        xhr.open("GET", `/dashboard/guru/search/${inputValue}`, true);
        xhr.send();
    } else {
        listGuru.classList.add("d-none");
    }
}

/**
 * Menangani ketika user memilih list guru
 */
function handlePilihGuru(id, nama, origin) {
    let input, inputId, list;

    if (origin === "update") {
        input = document.querySelector("#namaWaliUpdate");
        inputId = document.querySelector("#waliIdUpdate");
        list = document.querySelector("#list-guru-update");
    } else {
        input = document.querySelector("#namaWali");
        inputId = document.querySelector("#waliId");
        list = document.querySelector("#list-guru");
    }

    // set value
    input.value = nama;
    inputId.value = id;

    // hilangkan list guru
    list.innerHTML = "";
    list.classList.add("d-none");
}

/**
 * Menanyakan apakah user yakin atau tidak
 * ketika ingin menghapus data
 * jika yakin maka arahkan ke endpoint delete
 * namun jika tidak yakin maka jangan lakukan apa apa
 */
function DeleteKelas(csrf, kelasId) {
    Swal.fire({
        title: "Apakah anda yakin ?",
        text: "Data tidak akan bisa dikembalikan lagi",
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
            xhr.open("DELETE", `/dashboard/kelas/delete/${kelasId}`, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
            xhr.send();
        }
    });
}

/**
 * Menampilkan detail data kelas pada popup update
 */
function UpdateKelas(id) {
    // mengambil komponen input
    const form = document.querySelector("#modal-update-guru");
    form.setAttribute("action", `/dashboard/kelas/update/${id}`);
    const nama = document.querySelector("#namaKelasUpdate");
    const namaWali = document.querySelector("#namaWaliUpdate");
    const waliId = document.querySelector("#waliIdUpdate");
    const modal = new bootstrap.Modal(
        document.getElementById("modalUpdateKelas")
    );

    // ambil data dari server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // ambil response dari server
            const res = JSON.parse(xhr.responseText);
            nama.value = res.nama;
            namaWali.value = res.user.nama;
            waliId.value = res.user.id;

            // tampilkan popup
            modal.show();
        }
    };

    xhr.open("GET", `/dashboard/kelas/detail/${id}`, true);
    xhr.send();
}
