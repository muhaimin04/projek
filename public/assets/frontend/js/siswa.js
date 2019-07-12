$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var alamat = '/api/siswa'

    // Get Data Siswa
    $.ajax({
        url: alamat,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                $(".data-siswa").append(
                    `
                    <tr>
                        <td>${value.nama}</td>
                        <td>${value.umur}</td>
                        <td>${value.cita_cita}</td>
                        <td>${value.hobby}</td>
                        <td>${value.guru}</td>
                    </tr>
                    `
                )
            })
        },
        error: function () {
            console.log('data tidak ada !');
        }
    });

    // Post Data siswa
    // Simpan Data
    $(".simpan-data").click(function (simpan) {
        simpan.preventDefault();
        var nama = $("input[name=nama]").val();
        var umur = $("input[name=umur]").val();
        var cita_cita = $("input[name=cita_cita]").val();
        var hobby = $("input[name=hobby]").val();
        var guru = $("input[name=guru]").val();
        console.log(nama)
        $.ajax({
            url: alamat,
            method: "POST",
            dataType: "json",
            data: {
                nama: nama,
                umur: umur,
                cita_cita: cita_cita,
                hobby: hobby,
                guru: guru,
            },
            success: function (berhasil) {
                alert(berhasil.message)
                location.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    });


})