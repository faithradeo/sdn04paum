/**
 * mencari nama kelas berdasarkan query
 */
function searchKelas(element, listKelas, elKelasId) {
    const value = element.value;
    const list = document.getElementById(listKelas);

    list.innerHTML = "";

    if (value.length > 0) {
        // jika query tidak kosong maka cari data ke database

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.status === 200 && xhr.readyState === 4) {
                const res = JSON.parse(xhr.responseText);

                res.forEach((items) => {
                    const el = document.createElement("div");
                    el.classList.add("p-3");
                    el.classList.add("border-bottom");
                    el.style.cursor = "pointer";
                    el.onclick = () =>
                        handlePilihKelas(
                            items.nama,
                            items.id,
                            element.getAttribute("id"),
                            elKelasId,
                            list
                        );

                    const elName = document.createElement("span");
                    elName.classList.add("fw-semibold");
                    elName.innerHTML = items.nama;
                    el.appendChild(elName);

                    list.appendChild(el);
                });

                list.classList.remove("d-none");
            }
        };
        xhr.open("GET", `/dashboard/kelas/search/${value}`, true);
        xhr.send();
    } else {
        // jika query kosong hilangkan list
        list.classList.add("d-none");
    }
}

/**
 * Menangani ketika user memilih kelas dari dropdown
 */
function handlePilihKelas(nama, id, elNama, elId, dropdown) {
    const id_ = document.getElementById(elId);
    const nama_ = document.getElementById(elNama);

    id_.value = id;
    nama_.value = nama;

    // hilangkan drop down
    dropdown.classList.add("d-none");
}

/**
 * Menanyakan apakah user yakin atau tidak
 * ketika ingin menghapus data
 * jika yakin maka arahkan ke endpoint delete
 * namun jika tidak yakin maka jangan lakukan apa apa
 */
function DeleteMatpel(csrf, matpelId) {
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
            xhr.open("DELETE", `/dashboard/matpel/delete/${matpelId}`, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrf);
            xhr.send();
        }
    });
}

/**
 * Menampilkan detail data matpel pada popup update
 */
function detailMatpel(id) {
    const form = document.querySelector("#modal-update-matpel");
    form.setAttribute("action", `/dashboard/matpel/update/${id}`);
    // mengambil komponen input
    const modal = new bootstrap.Modal(
        document.getElementById("modalUpdateMatpel")
    );

    // input element
    const nama = document.querySelector("#namaMatpelUpdate");
    const semester = document.querySelector("#labelSemesterUpdate");
    const guruName = document.querySelector("#namaWaliUpdate");
    const waliIdUpdate = document.querySelector("#waliIdUpdate");
    const kelasName = document.querySelector("#namaKelasUpdate");
    const kelasId = document.querySelector("#kelasIdUpdate");

    // ambil data dari server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // ambil data dari server
            const res = JSON.parse(xhr.responseText);

            // set nilai
            nama.value = res.nama;
            guruName.value = res.guru.nama;
            waliIdUpdate.value = res.guru.id;
            kelasName.value = res.kelas.nama;
            kelasId.value = res.kelas.id;

            // set value semester
            for (let i = 0; i < semester.options.length; i++) {
                if (semester.options[i].textContent === res.semester) {
                    semester.selectedIndex = i;
                    break;
                }
            }

            modal.show();
        }
    };

    xhr.open("GET", `/dashboard/matpel/detail/${id}`, true);
    xhr.send();
}
