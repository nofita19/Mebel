<tr class="row-keranjang">
	<td class="barang_nama">
		<?= $this->input->post('barang_nama') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('barang_nama') ?>">
	</td>
	<td class="harga_asli">
		<?= $this->input->post('harga_asli') ?>
		<input type="hidden" name="harga_barang_hidden[]" value="<?= $this->input->post('harga_asli') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="sub_total">
		<?= $this->input->post('sub_total') ?>
		<input type="hidden" name="sub_total_hidden[]" value="<?= $this->input->post('sub_total') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('barang_nama') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>