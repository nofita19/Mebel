<div class="container-fluid">
	<div id="content" data-url="<?= base_url('penjualan') ?>">
		<div class="clearfix">
			<div class="float-right">
				<a href="<?= base_url('penjualan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
			</div>
		</div>
		<div class="card shadow">
			<?php foreach ($all_detail_penjualan as $penjualan) : ?>
				<div class="card-header"><strong>Detail Penjualan - <?= $penjualan->nomor_faktur ?></strong></div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
							<tr>
									<td><strong>No Penjualan</strong></td>
									<td>:</td>
									<td><?= $penjualan->nomor_faktur ?></td>
									<td><strong>Nama Pembeli</strong></td>
									<td>:</td>
									<td><?= $penjualan->nama_pembeli ?></td>
								</tr>
								<tr>
									<td><strong>Nama Barang</strong></td>
									<td>:</td>
									<td><?= $penjualan->barang_nama ?></td>
									<td><strong>Type Barang</strong></td>
									<td>:</td>
									<td><?= $penjualan->type_barang ?></td>
								</tr>
								<tr>
									<td><strong>No Telpon</strong></td>
									<td>:</td>
									<td><?= $penjualan->no_telp ?></td>
									<td><strong>Alamat Pembeli</strong></td>
									<td>:</td>
									<td><?= $penjualan->alamat_pembeli ?></td>
								</tr>
								<tr>
									<td><strong>Waktu Penjualan</strong></td>
									<td>:</td>
									<td><?= $penjualan->tanggal ?></td>
									<td><strong>Jenis Pembayaran</strong></td>
									<td>:</td>
                                <td> <?php if ($penjualan->id_jenis_pembayaran == '1') { ?>
                                    <span>Cash</span>
                                <?php } elseif ($penjualan->id_jenis_pembayaran == '2') { ?>
                                    <span>Kredit Bulanan</span>
                                <?php } elseif ($penjualan->id_jenis_pembayaran == '3') { ?>
                                    <span>Kredit Musiman</span>
                                <?php } ?></td>
								</tr>
								<tr>
									<td><strong>Jumlah Pembayaran</strong></td>
									<td>:</td>
									<td> Rp <?=  $harga = $penjualan->harga * $penjualan->jumlah; number_format($harga, 0, ',', '.') ?> </td>
									<td><strong>Lama Angsuran</strong></td>
									<td>:</td>
									<td><?= $penjualan->lama_angsuran ?> <?=' Kali Angsuran'?></td>
									<td><strong>DP</strong></td>
									<td>:</td>
									<td>Rp.<?= number_format($penjualan->dp, 0, ',', '.') ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<td><strong>Foto Ktp:</strong></td>
							<br>
							<img src="<?= base_url(); ?>/img/ktp/<?= $penjualan->foto_ktp; ?>" class="card-img rounded" width="250px" height="250px">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead>
									<?php
									if ($penjualan->id_jenis_pembayaran == 1) { ?>
										<tr>
											<td><strong>No</strong></td>
											<td><strong>Tanggal Bayar</strong></td>
											<td><strong>Harga</strong></td>
											<td><strong>Jumlah Pembelian</strong></td>
											<td><strong>Bayar</strong></td>
											<td><strong>Status Bayar</strong></td>
											<td><strong>Bukti Pembayaran</strong></td>
										</tr>
								</thead>
								<tbody>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $penjualan->tanggal ?></td>
										<td>Rp <?= number_format($penjualan->harga, 0, ',', '.') ?></td>
										<td> <?= $penjualan->jumlah ?></td>
										<td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
										<td><?= 'Lunas' ?></td>
										<td class="text-center"><span class="badge badge-success text-center"><a target="_blank" class="btn btn-success" style="color:white" href="<?php echo base_url()."Penjualan/CetakCash/".$penjualan->nomor_faktur ?>">Cetak</a></span></td>
									</tr>
								<?php
									} else {
										$bayar = $penjualan->total / 4;
										$bayarbulanan = $penjualan->total / 10;
								?>
									<?php 
									if ($hitung_data_angsuran <= 3 && $penjualan->id_jenis_pembayaran == 3) {?>
										<a href="<?php echo base_url('Pembayaran/proses_tambah' . "/" . $penjualan->nomor_faktur . "/" . $bayar) ?>" class="btn btn-success btn-sm btn-show-add">
										<span class="icon text-white-50">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">Bayar Kredit</span>
										</a>
									<?php } elseif ($hitung_data_angsuran <=9  && $penjualan->id_jenis_pembayaran == 2) {?>
										<a href="<?php echo base_url('Pembayaran/proses_tambah' . "/" . $penjualan->nomor_faktur . "/" . $bayarbulanan) ?>" class="btn btn-success btn-sm btn-show-add">
										<span class="icon text-white-50">
										<i class="fa fa-plus"></i>
										</span>
										<span class="text">Bayar Kredit</span>
										</a>
									<?php }?>		
								<tr>
									<td class="text-center"><strong>No</strong></td>
									<td class="text-center"><strong>Tanggal Bayar</strong></td>
									<td class="text-center"><strong>Nominal Angsuran</strong></td>
									<td class="text-center"><strong>Angsuran ke-</strong></td>
									<td class="text-center"><strong>Bayar</strong></td>
									<td class="text-center"><strong>Status Bayar</strong></td>
									<td class="text-center"><strong>Bukti Pembayaran</strong></td>
								</tr>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_angsuran as $data) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $data['tanggal'] ?></td>
									<?php
									if ($penjualan->id_jenis_pembayaran == 3) { ?>
											<td>Rp <?= number_format($bayar, 0, ',', '.') ?></td>
									<?php } else if ($penjualan->id_jenis_pembayaran == 2) {?>
											<td>Rp <?= number_format($bayarbulanan, 0, ',', '.') ?></td>
									<?php } ?> 
									
											<td class="text-center"><?= $data['angsuran_ke'] ?></td>
									<?php
										if ($penjualan->id_jenis_pembayaran == 3) { ?>
												<td>Rp <?= number_format($bayar, 0, ',', '.') ?></td>
										<?php } else if ($penjualan->id_jenis_pembayaran == 2) {?>
												<td>Rp <?= number_format($bayarbulanan, 0, ',', '.') ?></td>
										<?php } ?> 
												<td class="text-center"><span class="badge badge-success text-center">Lunas</span></td>
												<td class="text-center"><span class="badge badge-success text-center"><a target="_blank" class="btn btn-success" style="color:white" href="<?php echo base_url()."Penjualan/cetak/".$data['kode_angsuran'] ?>">Cetak</a></span></td>
											</tr>
										<?php } ?>			
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>