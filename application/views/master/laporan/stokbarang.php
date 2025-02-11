
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<?php echo $this->session->flashdata('message_edit') ?>
	<?php echo $this->session->flashdata('message_success') ?>
	<?php echo $this->session->flashdata('message') ?>
	<div class="card shadow mb-4">
		<div class="col-lg-6">
				<!-- Circle Buttons -->
				
			</div>
		<div class="card-header py-3">
			Stok Barang Telah Mencapai Batas Minimum
		</div>
		<div class="px-3">
			<a href="<?php
				echo base_url('Export-pdf-laporan-test')
				?>">
				<input type="submit" value="Export PDF" class="btn btn-primary"><br>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th style="text-align: center; vertical-align: middle;">No</th>
							<th style="text-align: center; vertical-align: middle;">ID Barang</th>
							<th style="text-align: center; vertical-align: middle;">Nama Barang</th>
							<th style="text-align: center; vertical-align: middle;">Jenis Barang</th>
							<th style="width: 120px; text-align: center; vertical-align: middle;">Jumlah Barang Masuk</th>
							<th style="width: 120px; text-align: center; vertical-align: middle;">Jumlah Barang Keluar</th>
							<th style="text-align: center; vertical-align: middle;">Stok</th>
							<th style="text-align: center; vertical-align: middle;">Satuan</th>
						</tr>
					</thead>

					<tbody>
						<?php $no = 1; if (!empty($barang)) : ?>
						<?php foreach ($barang as $row) :
							$stok = $row->stokbarang;
							$keluar = $row->keluar;
							$jumlah = $stok-$keluar;
							?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->id_barang ?></td>
							<td class=""><?php echo $row->nama_barang ?></td>
							<td><?php echo $row->jenis_barang ?></td>
							<td style="width: 120px; text-align: center"><?php echo $stok ?></td>
							<td style="width: 120px; text-align: center" ><?php echo $keluar ?></td>
                            <td 
                                <?php 
										if(($jumlah <= 10) and ($jumlah > 0)){
											echo "class = 'bg-warning' ";
										}
										else if ($jumlah <= 0){
											echo "class = 'bg-danger' ";
										} else if ($jumlah > 10) {
											echo "class = 'bg-success'";
										}
									 
                                
                                ?>
                            ><?php echo $jumlah ?></td>
							<td><?php echo $row->satuan_barang ?></td>
						</tr>
						<?php endforeach ?>
						<?php else: ?>
						<tr>
							<td colspan="9" align="center">Tidak Ada Data</td>
						</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
            <button class="btn btn-warning"></button> Stok Minimum <br>
            <button class="btn btn-danger"></button> Stok Kosong
		</div>
	</div>
</div>

