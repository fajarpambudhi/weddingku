<?php
  $this->load->view('header');
  $this->load->view('side');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header"> -->
      <h1>
        Admin
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Data Produk</li>
      </ol>
    </section>
    
    

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
              <h3 class="box-title">Data Produk</h3><br>
              <div class="col-md-2">
                <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#modal-default">Add New</button>
                <!-- <button type="button" class="btn primary" data-toggle="modal" data-target="#modal-default">Edit</button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Action</th>
                  <th></th>

                </tr>
                <?php
                foreach ($show3 as $tabel3): ?>
                    <tr>
                      <td><?php echo $tabel3->id ?></td>
                      <td><?php echo $tabel3->nama ?></td>
                      <td><?php echo $tabel3->price ?></td>
                      <td><?php echo $tabel3->deskripsi ?></td>
                      <td><img height="100px" src="<?php echo base_url('/assets/images/'.$tabel3->img)  ?>"></td>
                      <td>
                        <!-- <form action="<?php echo 'simple/approval1/'.$tabel1->id ;?>" method="post"> -->
                            <!-- <button class="btn btn-primary" type='submit'>Edit</button> -->
                            <!-- <button class="btn btn-primary" type='submit'>Delete</button> -->
                            <button type="button" class="btn primary" data-toggle="modal" data-target="#modal-default">Edit</button>
                      </td>
                      <td>
                      <form action="<?php echo 'form/delete/'.$tabel3->id ;?>" method="post">
                      <button class="btn primary" type="submit">
                        Delete
                      </button>
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
    <!-- Main content -->
    <!-- <section class="content"> -->
      <!-- <div class="row"> -->
        <!-- left column -->
        <!-- <div class="col-md-6"> -->
          <!-- general form elements -->
          <!-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registrasi</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
           <!--  <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputNama1">Nama Lengkap</label>
                  <input type="nama" class="form-control" id="exampleInputNama1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputNoTelp1">No Telpon</label>
                  <input type="notelp" class="form-control" id="exampleNotelp1" placeholder="No Telpon"> 
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Dengan ini saya menyetujui semua syarat dan ketentuan yang berlaku
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div> -->
        <!-- <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Paket</h3>
         -->    </div>
            <!-- /.box-header -->
            <!-- <div class="box-body"> -->
              <!-- <form role="form"> -->
                <!-- text input -->
        <!--         <div class="form-group">
                  <label>Id User</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                 </div>
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                      Input Paket
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      Ganti Paket
                    </label>
                  </div>
                 <div class="form-group">
                  <label>Pilih Paket</label>
                  <select class="form-control">
                    <option>Paket</option>
                    <option>Paket A</option>
                    <option>Paket B</option>
                    <option>Paket C</option>
                    <option>Paket D</option>
                  </select>
                  </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div> 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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

                <p>Execution time 5 seconds</p>
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
  <div class="control-sidebar-bg"></div>
</div>

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('form/tambah')?>" enctype="multipart/form-data" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputNama1">ID</label>
                      <input name="id" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukan ID">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Paket</label>
                      <input name="nama_paket" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Paket">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input name="harga" type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNoTelp1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleNotelp1" placeholder="Masukan Deskripsi"> 
                    </div>
                     <div class="form-group">
                      <label for="exampleInputNoTelp1">Deskripsi</label>
                      <input name="img" type="file" class="form-control" id="exampleNotelp1" placeholder="Masukan Deskripsi"> 
                    </div>
                    <!-- <div class="checkbox">
                      <label>
                        <input type="checkbox"> Dengan ini saya menyetujui semua syarat dan ketentuan yang berlaku
                      </label>
                     --</div>
                  </div>
                  <!-- /.box-body -->

                   <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src=<?php echo base_url('/assets/admin/bower_components/jquery/dist/jquery.min.js')?>></script>
<!-- Bootstrap 3.3.7 -->
<script src=<?php echo base_url('/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')?>></script>
<!-- FastClick -->
<script src=<?php echo base_url('/assets/admin/bower_components/fastclick/lib/fastclick.js')?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url('/assets/admin/dist/js/adminlte.min.js')?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('/assets/admin/dist/js/demo.js')?>></script>
</body>
</html>
