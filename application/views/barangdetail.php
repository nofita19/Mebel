<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> Detail Data Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=base_url("dashboard");?>">Dashboard</a></li>
                            <li class="active">Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
            
        <?php foreach ($data as $d) {?>
        <?php 
            $hargaasli = $d['harga_asli'];
            $biayaproduksi = $d['biaya_produksi'];
            $biayadisribusi = $d['biaya_distribusi'];
            $biayatukang = $d['biaya_tukang'];
            $biayalainlain = $d['biaya_lainlain'];
            $keuntungan = $d['keuntungan'];
            $hargatunai = $hargaasli+$biayaproduksi+$biayadisribusi+$biayatukang+$biayalainlain+$keuntungan;
            $hargabulanan = $hargatunai+500000;
            $hargamusiman = $hargatunai+1000000;
            ?>
                <div class="card-header">
                <a href="<?php echo base_url('barang') ?>" class="btn btn-danger btn-sm btn-show-add">
                    <span class="icon text-white-50">
                        <i class="fa fa-reply"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url(); ?>./img/barang/<?= $d['foto']; ?>" class="card-img-top">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td><strong>Kode Barang</strong></td>
                                <td>:</td>
                                <td><?= $d['barang_kode']; ?></td>
                                <td><strong>Nama Barang</strong></td>
                                <td>:</td>
                                <td><?= $d['barang_nama']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Barang</strong></td>
                                <td>:</td>
                                <td><?= $d['jenis_bahan']; ?></td>
                                <td><strong>Type Barang</strong></td>
                                <td>:</td>
                                <td><?= $d['type_barang']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Harga Asli</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['harga_asli']; ?></td>
                                <td><strong>Biaya Produksi</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['biaya_produksi']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Biaya Tukang</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['biaya_tukang']; ?></td>
                                <td><strong>Biaya Distribusi</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['biaya_distribusi']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Biaya Lain-lain</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['biaya_lainlain']; ?></td>
                                <td><strong>Keuntungan</strong></td>
                                <td>:</td>
                                <td>Rp<?= $d['keuntungan']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Harga Tunai</strong></td>
                                <td>:</td>
                                <td>Rp<?= $hargatunai; ?></td>
                                <td><strong>Harga Kredit Bulananan</strong></td>
                                <td>:</td>
                                <td>Rp<?= $hargabulanan; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Harga Kredit Musiman</strong></td>
                                <td>:</td>
                                <td>Rp<?= $hargamusiman; ?></td>
                                <td><strong>Stok</strong></td>
                                <td>:</td>
                                <td><?= $d['stok']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> 
		</div>
                </div>
            </div>
        </div>
<?php } ?>