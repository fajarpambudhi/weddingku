 <?php
  $this->load->view('header');
  $this->load->view('side');
?>

  
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembayaran dan Pemesanan
        <!-- <small>preview of simple tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Kode Transaksi</th>
                  <th>Paket</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Bank</th>
                  <th>Cicilan Ke-</th>
                  <th>Nominal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                  <?php 
                  //var_dump($data);
                  foreach ($show as $tabel): ?>
                    <tr>
                      <td><?php echo $tabel->id ?></td>
                      <td><?php echo $tabel->user_name ?></td>
                      <td><?php echo $tabel->kode_transaksi ?></td>
                      <td><?php echo $tabel->nama?></td>
                      <td><?php echo $tabel->tanggal_pembayaran ?></td>
                      <td><?php echo $tabel->bank ?></td>
                      <td><?php echo $tabel->to_month ?></td>
                      <td><?php echo $tabel->price_month ?></td>
                      <td><?php echo $tabel->status ?></td>
                      <td>
                          <form action="<?php echo 'simple/approval/'.$tabel->user_credit_id ;?>" method="post">
                            <button class="btn btn-primary" type='submit'>Confirm</button>
                          </form>
                      </td>

                    </tr>
                  <?php endforeach ?>
                <!-- <td><span class="label label-success">Approved</span></td>
                <td><span class="label label-warning">Pending</span></td>
                <td><span class="label label-primary">Approved</span></td>
                <td><span class="label label-danger">Denied</span></td>
                <td><span class="label label-primary">Approved</span></td>
                <td><span class="label label-primary">Approved</span></td> -->
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>                  
                  <th>Kode Transaksi</th>
                  <th>Paket</th>
                  <th>Harga Paket</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Jangka Waktu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php 
                  //var_dump($show1);
                  foreach ($show1 as $tabel1): ?>
                  <tr>
                      <td><?php echo $tabel1->id ;?></td>
                      <td><?php echo $tabel1->user_name ;?></td>
                      <td><?php echo $tabel1->kode_transaksi ;?></td>
                      <td><?php echo $tabel1->nama ;?></td>
                      <td><?php echo $tabel1->price ;?></td>
                      <td><?php echo $tabel1->tgl_order ;?></td>
                      <td><?php echo $tabel1->cicilan ;?></td>
                      <td><?php echo $tabel1->status ;?></td>
                      <td>
                        <form action="<?php echo 'simple/approval1/'.$tabel1->id ;?>" method="post">
                            <button class="btn btn-primary" type='submit'>Confirm</button>
                          </form>
                      </td>
                    </tr>
                    <?php endforeach ?>

                <!-- <td><span class="label label-success">Approved</span></td> -->
                <!-- <td><span class="label label-warning">Pending</span></td> -->
                <!-- <td><span class="label label-primary">Approved</span></td> -->
                <!-- <td><span class="label label-danger">Denied</span></td> -->
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <!-- <p>Execution time 5 seconds</p> -->
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<!-- jQuery 3 -->
<script src=<?php echo base_url('/assets/admin/bower_components/jquery/dist/jquery.min.js')?>></script>
<!-- Bootstrap 3.3.7 -->
<script src=<?php echo base_url('/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')?>></script>
<!-- Slimscroll -->
<script src=<?php echo base_url('/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>></script>
<!-- FastClick -->
<script src=<?php echo base_url('/assets/admin/bower_components/fastclick/lib/fastclick.js')?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url('/assets/admin/dist/js/adminlte.min.js')?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('/assets/admin/dist/js/demo.js')?>></script>
</body>
</html>
