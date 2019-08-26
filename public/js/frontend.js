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
       
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="{{ asset ('assets/frontend/img/recent-game/1.jpg') }}">
							<div class="cata new">new</div>
						</div>
						<div class="rgi-content">
							<h5>Suspendisse ut justo tem por, rutrum</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit amet, consectetur elit. </p>
							<a href="#" class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="{{ asset ('assets/frontend/img/icons/star.png') }}" alt=""></div>
								<div class="rgi-heart"><img src="{{ asset ('assets/frontend/img/icons/heart.png') }}" alt=""></div>
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

  


})