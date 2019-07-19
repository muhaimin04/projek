$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var alamat_artikel = '/api/artikel'

    // Get Data Siswa
    $.ajax({
        url: alamat_artikel,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                $(".isinya").append(
                    `
                    <div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="{{ asset ('assets/frontend/img/features/1.jpg')}}">
						<span class="cata new">new</span>
						<div class="fi-content text-white">
							<h5><a href="#">${value.judul}</a></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
							<a href="#" class="fi-comment">3 Comments</a>
						</div>
					</div>
				</div>
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