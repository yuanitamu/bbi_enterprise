<!-- BEGIN SIDEBAR -->
<?php $user = $this->session->userdata('luna'); ?>
<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul>
		<li class="<?php if (@$nav == 'Dashboard') echo 'active'; ?>">
			<a href="<?php echo site_url('home'); ?>">
			<i class="icon-home"></i> Dashboard
			<span class="<?php if (@$nav == 'Dashboard') echo 'selected'; ?>"></span>
			</a>					
		</li>
		<?php 
			if($user[0]->group == 1 || $user[0]->group == 3){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'Marketing') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> Marketing
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'Customer') echo 'active'; ?>"><a href="<?php echo site_url('marketing/customer'); ?>">Daftar Customer</a></li>
				<li class="<?php if (@$nav == 'Pemesanan') echo 'active'; ?>"><a href="<?php echo site_url('marketing/pemesanan'); ?>">Daftar Pemesanan</a></li>
				<li class="<?php if (@$nav == 'Pembayaran') echo 'active'; ?>"><a href="<?php echo site_url('marketing/pembayaran'); ?>">Daftar Pembayaran</a></li>
			</ul>
		</li>
		<?php
			}
		?>
		<?php if($user[0]->group == 1 || $user[0]->group == 2){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'Accounting') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> Accounting / Finnance
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'Validasi') echo 'active'; ?>"><a href="<?php echo site_url('accounting/validasi'); ?>">Validasi Keuangan</a></li>
				<li class="<?php if (@$nav == 'Laporan') echo 'active'; ?>"><a href="<?php echo site_url('accounting/laporan'); ?>">Laporan Keuangan</a></li>
			</ul>
		</li>
		<?php } ?>
		<?php if($user[0]->group == 1 || $user[0]->group == 5){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'Supply') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> Supply
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'Laporan') echo 'active'; ?>"><a href="<?php echo site_url('supply/laporan'); ?>">Laporan Request</a></li>
				<li class="<?php if (@$nav == 'Pembelian') echo 'active'; ?>"><a href="<?php echo site_url('supply/pembelian'); ?>">Request Bahan</a></li>
				<li class="<?php if (@$nav == 'OpenTender') echo 'active'; ?>"><a href="<?php echo site_url('supply/tender'); ?>">Open Tender</a></li>
				<li class="<?php if (@$nav == 'Penawaran') echo 'active'; ?>"><a href="<?php echo site_url('supply/penawaran'); ?>">Penawaran Open Tender</a></li>
				<li class="<?php if (@$nav == 'Supplier') echo 'active'; ?>"><a href="<?php echo site_url('supply/supplier'); ?>">Input Supplier</a></li>
			</ul>
		</li>
		<?php } ?>
		<?php if($user[0]->group == 1 || $user[0]->group == 4){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'Warehouse') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> Warehouse
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'Stok') echo 'active'; ?>"><a href="<?php echo site_url('warehouse/stok'); ?>">Stok Gudang</a></li>
				<li class="<?php if (@$nav == 'Bahan') echo 'active'; ?>"><a href="<?php echo site_url('warehouse/bahan'); ?>">Request Barang</a></li>
				<li class="<?php if (@$nav == 'Produksi') echo 'active'; ?>"><a href="<?php echo site_url('warehouse/produksi'); ?>">Request Produksi</a></li>
			</ul>
		</li>
		<?php } ?>
		<?php if($user[0]->group == 1 || $user[0]->group == 6){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'Produksi') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> Produksi
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'Request') echo 'active'; ?>"><a href="<?php echo site_url('produksi'); ?>">Request Produksi</a></li>
				<li class="<?php if (@$nav == 'Bahan') echo 'active'; ?>"><a href="<?php echo site_url('produksi/bahan'); ?>">Request Bahan</a></li>
			</ul>
		</li>
		<?php } ?>
		<?php if($user[0]->group == 1){
		?>
		<li class="has-sub <?php if (@$nav_parent == 'System') echo 'active'; ?>">
			<a href="javascript:;" class="">
			<i class="icon-bookmark-empty"></i> System
			<span class="arrow"></span>
			</a>
			<ul class="sub">
				<li class="<?php if (@$nav == 'User') echo 'active'; ?>"><a href="<?php echo site_url('user'); ?>">User</a></li>
				<li class="<?php if (@$nav == 'Group') echo 'active'; ?>"><a href="<?php echo site_url('group'); ?>">Group</a></li>
			</ul>
		</li>
		<?php 
			}
		?>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->