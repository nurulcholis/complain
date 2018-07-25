<div class="col-sm-12 col-md-12 indok1">
<div class="panel panel-info">
<div class="panel-heading">
	<h4>
		<marquee> <!-- Agar tulisan bergerak -->
			<font color="red"> #==== Selamat Datang di Sistem E-Complain Perusahaan Daerah Air Minum Kabupaten Batang ====#
			</font color>
		</marquee>
	</h4>
</div>
<div class="panel-body">
	<div class="col-md-10 col-sm-offset-1 bor">
		<form action="<?php echo base_url();?>complain/post" method="post">

		<table class="table table-bordered table-stripped">
		<tr>
			<td class="btn-info"><span class="judul">Form Input Komplain</span><?php if ($inok=="oke")echo "<h4><center><i>Input Berhasil, terimakasih atas partisipasi anda,-</i></center></h4>";?>
			</td>
		</tr>
		<?php echo $this->session->flashdata('pesaninput');?>
		<tr>
			<td>
			<?php foreach($pelanggans as $pelanggan):?>
			<div class="form-group">
				<label for='tanggal' class='control-label'>No. Pelanggan PDAM :</label>
				<input type="number" placeholder="Inputkkan No. Pelanggan Anda" name="id_pelanggan" class='form-control' required value="<?=pelanggan->id_pelanggan;?>">
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>No. KTP :</label>
				<input type="number" placeholder="Inputkan No. KTP Anda" name="no_ktp" class='form-control' required value="<?=pelanggan->no_ktp;?>">
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>Nama Lengkap :</label>
				<input type="text" placeholder="Inputkan nama lengkap" name="nama" class='form-control' required value="<?=pelanggan->nama;?>">
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>Alamat :</label>
				<input type="text" placeholder="Inputkan alamat" name="alamat" class='form-control' required value="<?=pelanggan->alamat;?>">
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>No. Telp :</label>
				<input type="text" placeholder="Inputkan nomer telepon" name="telepon" class='form-control' required>
			</div>

			<div class="form-group">
				<label for='tanggal' class='control-label'>Topik :</label>

				<select name="nama_topik" class="selectpicker form-control" required>
			   <?php if(!empty($topik)){
				   foreach($topik->result() as $j){
					  echo '<option value="'.$j->nama_topik.'">'.$j->nama_topik.'</option>';
				   }
			   }
			   ?>
			   </select>
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>Keluhan</label>
				<textarea rows=4 name="keluhan" class='form-control' required></textarea>
			</div>
			<div class="form-group">
				<label for='tanggal' class='control-label'>Saran</label>
				<textarea rows=4 name="saran" class='form-control' required></textarea>
			</div>
			</td>
		<?php endforeach;?>
		</tr>
		<tr>
			<td><button type="submit"  class="btn btn-primary btnc" name="submit">SUBMIT</button><input type="reset"  class="btn btn-default" name="reset"></td>
		</tr>
		</table>
		</form>
	</div>
</div>
</div>
</div>
