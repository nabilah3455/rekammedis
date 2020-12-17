 <style>
     li a:active {
         color: aliceblue;
     }
 </style>

 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="logo">
                 <center><img class="logo-lg" width="180px" height="140px" src="<?= base_url('assets/dist/img/gambarlg.png') ?>"></center>
             </div>
             <div>
                 <font size="3px" color="white">
                     <center>
                         <b>SISTEM REKAM <br>MEDIS KLINIK<br>RUMAH SEHAT ERIADIO</b>
                     </center>
                 </font>
             </div>
         </div>

         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu active" data-widget="tree">
             <li class="header"><b>MENU</b></li>
             <li <?= $this->uri->segment(2) == 'index' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                 <a href="<?= base_url('admin/index') ?>">
                     <i class="fa fa-fw fa-dashboard"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <!-- <li>
                 <a href="<?php echo base_url('admin/edit_profile'); ?>">
                     <i class="fa fa-fw fa-edit"></i>
                     <span>Edit Profile</span>
                 </a>
             </li> -->
             <li <?= $this->uri->segment(2) == 'tampil_user' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('admin/tampil_user'); ?>">
                     <i class="fa fa-fw fa-user"></i>
                     <span>User</span>
                 </a>
             </li>
             <li <?= $this->uri->segment(1) == 'dokter' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('dokter'); ?>">
                     <i class="fa fa-fw fa-user"></i>
                     <span>Dokter</span>
                 </a>
             </li>
             <li <?= $this->uri->segment(2) == 'tampil_pasien' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('pasien/tampil_pasien'); ?>">
                     <i class="fa fa-fw fa-users"></i>
                     <span>Data Pasien</span>
                 </a>
             </li>
             <!-- <li>
                 <a href="<?php echo base_url('pasien/tampil_berobat'); ?>">
                     <i class="fa fa-fw fa-users"></i>
                     <span>Berobat</span>
                 </a>
             </li> -->
             <!-- <li>
                 <a href="<?php echo base_url('obat/tampil_kategori_obat'); ?>">
                     <i class="fa fa-fw fa-medkit"></i>
                     <span>Kategori Obat</span>
                 </a>
             </li> -->
             <li class="treeview <?= $this->uri->segment(2) == 'tampil_kategori_obat' || $this->uri->segment(2) == 'tampil_obat' ? 'active' : '' ?>">
                 <a href="#">
                     <i class="fa fa-fw fa-medkit"></i>
                     <span>Obat</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li <?= $this->uri->segment(2) == 'tampil_kategori_obat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('obat/tampil_kategori_obat'); ?>"><i class="fa fa-circle-o"></i> Kategori Obat</a></li>
                     <li <?= $this->uri->segment(2) == 'tampil_obat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('obat/tampil_obat'); ?>"><i class="fa fa-circle-o"></i> Data Obat</a></li>
                 </ul>
             </li>
             <li class="treeview <?= $this->uri->segment(2) == 'tampil_berobat' || $this->uri->segment(2) == 'ambil_obat' || $this->uri->segment(2) == 'catatan_obat' || $this->uri->segment(2) == 'riwayat_berobat' ? 'active' : '' ?>">
                 <a href="#">
                     <i class="fa fa-fw fa-video-camera"></i>
                     <span>Rekam Medis</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li <?= $this->uri->segment(2) == 'tampil_berobat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('pasien/tampil_berobat'); ?>"><i class="fa fa-circle-o"></i>Antrian Pasien</a></li>
                     <!-- <li><a href="<?php echo base_url('medis'); ?>"><i class="fa fa-circle-o"></i>Rekam Medis</a></li> -->
                     <li <?= $this->uri->segment(2) == 'ambil_obat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('obat/ambil_obat'); ?>"><i class="fa fa-circle-o"></i>Ambil Obat</a></li>
                     <li <?= $this->uri->segment(2) == 'catatan_obat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('obat/catatan_obat'); ?>"><i class="fa fa-circle-o"></i>Catatan
                             <span class="pull-right-container">
                                 <span class="label label-primary pull-right"><?= $catatan; ?></span>
                             </span></a>
                     </li>
                     <li <?= $this->uri->segment(2) == 'riwayat_berobat' ? 'class="active"' : '' ?>><a href="<?php echo base_url('pasien/riwayat_berobat'); ?>"><i class="fa fa-circle-o"></i>Riwayat</a></li>
                     <li <?= $this->uri->segment(2) == 'report_dokter' ? 'class="active"' : '' ?>><a href="<?php echo base_url('dokter/report_dokter'); ?>"><i class="fa fa-circle-o"></i>Report Dokter</a></li>
                 </ul>
             </li>
             <!-- <li>
                 <a href="<?php echo base_url('obat/tampil_obat'); ?>">
                     <i class="fa fa-fw fa-medkit"></i>
                     <span>Data Obat</span>
                 </a>
             </li> -->
             <!-- <li>
                 <a href="<?php echo base_url('medis'); ?>">
                     <i class="fa fa-fw fa-video-camera"></i>
                     <span>Rekam Medis</span>
                 </a>
             </li> -->
             <li <?= $this->uri->segment(2) == 'tampil_rujukan' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('medis/tampil_rujukan'); ?>">
                     <i class="fa fa-fw fa-ambulance"></i>
                     <span>Rujukan</span>
                 </a>
             </li>
         </ul>
         <ul class="sidebar-menu" data-widget="tree">
             <li>
                 <a href="#" data-toggle="modal" data-target="#logout">
                     <i class="fa-fw glyphicon glyphicon-log-out"></i> <span>Logout</span>
                 </a>
             </li>
         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>

 <!-- =============================================== -->