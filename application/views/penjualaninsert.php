<div class="container-fluid">
<div id="content" data-url="<?= base_url('penjualan') ?>">
  <?= $this->session->flashdata('pesan') ?>

    <div class="card shadow mb-4">
    <div class="card-header">
    <strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
	<form action="<?= base_url('penjualan/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-2">
											<label>No. Penjualan</label>
											<input type="text" name="nomor_faktur" value="PJ<?= time() ?>" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Tanggal Penjualan</label>
											<input type="text" name="tanggal" value="<?= date('d/m/Y') ?>" readonly class="form-control">
										</div>
									</div>
									<h5>Data Barang</h5>
									<hr>
									<div class="form-row">
										<div class="form-group col-3">
											<label for="barang_nama">Nama Barang</label>
											<select name="barang_nama" id="barang_nama" class="form-control">
												<option value="">Pilih Barang</option>
												<?php foreach ($all_barang as $barang): ?>
													<option value="<?= $barang->barang_nama ?>"><?= $barang->barang_nama ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="form-group col-2">
											<label>Kode Barang</label>
											<input type="text" name="barang_kode" value="" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Harga Barang</label>
											<input type="text" name="harga_asli" value="" readonly class="form-control">
										</div>
										<div class="form-group col-2">
											<label>Jumlah</label>
											<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
										</div>
										<div class="form-group col-2">
											<label>Sub Total</label>
											<input type="number" name="sub_total" value="" class="form-control" readonly>
										</div>
										<div class="form-group col-1">
											<label for="">&nbsp;</label>
											<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
										</div>
									</div>
									<div class="keranjang">
										<h5>Detail Pembelian</h5>
										<hr>
										<table class="table table-bordered" id="keranjang">
											<thead>
												<tr>
													<td width="35%">Nama Barang</td>
													<td width="15%">Harga</td>
													<td width="15%">Jumlah</td>
													<!-- <td width="10%">Satuan</td> -->
													<td width="10%">Sub Total</td>
													<td width="15%">Aksi</td>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4" align="right"><strong>Total : </strong></td>
													<td id="total"></td>
													
													<td>
														<input type="hidden" name="total_hidden" value="">
														<input type="hidden" name="max_hidden" value="">
														<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</form>
							</div>	
    </div>
    <!-- /.card -->
</div>

<!-- /.container-fluid -->

</div>

<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})

			$('#barang_nama').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {barang_nama: $(this).val()},
						success: function(data){
							$('input[name="barang_kode"]').val(data.barang_kode)
							$('input[name="harga_asli"]').val(data.harga_asli)
							$('input[name="biaya_produksi"]').val(data.biaya_produksi)
							$('input[name="biaya_distribusi"]').val(data.biaya_distribusi)
							$('input[name="biaya_tukang"]').val(data.biaya_tukang)
							$('input[name="biaya_lainlain"]').val(data.biaya_lainlain)
							$('input[name="keuntungan"]').val(data.keuntungan)
							$('input[name="jumlah"]').val(1)
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', false)
							// $('input[name="harga"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							// $('input[name="harga"]').val($('input[name="harga_asli"]').val() + $('input[name="biaya_produksi"]').val() + $('input[name="biaya_distribusi"]').val() + $('input[name="biaya_tukang"]').val()+ $('input[name="biaya_lainlain"]').val()+ $('input[name="keuntungan"]').val())
							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_asli"]').val())
							$('input[name="harga"]').val($('input[name="harga_asli"]').val() + $('input[name="biaya_produksi"]').val()

							$('input[name="jumlah"]').on('keydown keyup change blur', function(){
							// $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_asli"]').val())
							})
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					barang_nama: $('select[name="barang_nama"]').val(),
					harga_asli: $('input[name="harga_asli"]').val(),
					biaya_produksi: $('input[name="biaya_produksi"]').val(),
					biaya_distribusi: $('input[name="biaya_distribusi"]').val(),
					biaya_tukang: $('input[name="biaya_tukang"]').val(),
					biaya_lainlain: $('input[name="biaya_lainlain"]').val(),
					keuntungan: $('input[name="keuntungan"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					sub_total: $('input[name="sub_total"]').val(),
					harga: $('input[name="harga"]').val(),
				}

				if(parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
					alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))	
				} else {
					$.ajax({
						url: url_keranjang_barang,
						type: 'POST',
						data: data_keranjang,
						success: function(data){
							if($('select[name="barang_nama"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
							reset()

							$('table#keranjang tbody').append(data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
						}
					})
				}

			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="barang_kode"]').prop('disabled', true)
				$('select[name="barang_nama"]').prop('disabled', true)
				$('input[name="harga_asli"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				$('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){
				$('#nama_barang').val('')
				$('input[name="barang_kode"]').val('')
				$('input[name="harga_asli"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="sub_total"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>