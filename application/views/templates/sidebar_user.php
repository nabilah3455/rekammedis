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
         <ul class="sidebar-menu" data-widget="tree">
             <li class="header"><b>MENU</b></li>
             <!-- <li>
                 <a href="<?= base_url('user'); ?>">
                     <i class="fa fa-fw fa-dashboard"></i>
                     <span>My Profile</span>
                 </a>
             </li> -->
             <!-- <li>
                 <a href="<?= base_url('user/edit_profile'); ?>">
                     <i class="fa fa-fw fa-edit"></i>
                     <span>Edit Profile</span>
                 </a>
             </li> -->
             <li <?= $this->uri->segment(2) == 'pasien' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                 <a href="<?= base_url('user/pasien'); ?>">
                     <i class="fa fa-fw fa-video-camera"></i>
                     <span>Rekam Medis</span>
                 </a>
             </li>
             <!-- <li>
                 <a href="<?php echo base_url('user/rekam_medis'); ?>">
                     <i class="fa fa-fw fa-video-camera"></i>
                     <span>Rekam Medis</span>
                 </a>
             </li> -->
             <li <?= $this->uri->segment(2) == 'tampil_rujukan' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('user/tampil_rujukan'); ?>">
                     <i class="fa fa-fw fa-ambulance"></i>
                     <span>Rujukan</span>
                 </a>
             </li>
             <li <?= $this->uri->segment(2) == 'catatan' ? 'class="active"' : '' ?>>
                 <a href="<?php echo base_url('user/catatan'); ?>">
                     <i class="fa fa-fw fa-file"></i>
                     <span>Catatan</span>

                     <span class="pull-right-container">
                         <span class="label label-primary pull-right"><?= $catatan; ?></span>
                     </span>
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