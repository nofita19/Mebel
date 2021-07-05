<div class="container-fluid">
			<div id="content" data-url="<?= base_url('penjualan') ?>">
				<div class="clearfix">
					<div class="float-right">
						<a href="<?= base_url('penjualan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<div class="card shadow">
										<?php foreach ($all_detail_penjualan as $penjualan): ?>
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
										<td><strong>Foto Ktp</strong></td>
										<td>:</td>
										<td><?= $penjualan->foto_ktp ?></td>
									</tr>
								</table>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<thead><?php 
                                            if ( $penjualan->id_jenis_pembayaran==1) { ?>
										<tr>
											<td><strong>No</strong></td>
											<td><strong>Tanggal Bayar</strong></td>
											<td><strong>Harga</strong></td>
											<td><strong>Dp</strong></td>
											<td><strong>Bayar</strong></td>
											<td><strong>Status Bayar</strong></td>
										</tr>
									</thead>
									<tbody>
											<tr>
												<td><?= $no++ ?></td>
										        <td><?= $penjualan->tanggal ?></td>
												<td>Rp <?= number_format($penjualan->harga, 0, ',', '.') ?></td>
												<td><?= '0'?></td>
											<td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
												<td><?= 'Lunas' ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                    <?php endforeach ?>
				</div>
				</div>