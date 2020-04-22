<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>

  <body id="page-top">
    <?php $this->load->view('template/navbar'); ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/Admin_dashboard/obat_dashboard'); ?>">
            <i class="fas fa-fw fa-tablets"></i>
            <span>Manage Obat</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Admin_dashboard/jenis_obat_dashboard'); ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Manage Jenis Obat</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Admin_dashboard/user_dashboard'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Manage User</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/Admin_dashboard/cart_dashboard'); ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Manage Cart</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Cart</li>
          </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table_contents">
                  <thead>
                      <tr>
                        <th>ID CART</th>
                        <th>ID USER</th>
                        <th>ID OBAT</th>
                        <th>NAMA OBAT</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID CART</th>
                        <th>ID USER</th>
                        <th>ID OBAT</th>
                        <th>NAMA OBAT</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                      </tr>
                  </tfoot>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © @potik</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('template/js'); ?>
    <script type="text/javascript">
        var table = null;
        $(document).ready(function(){
            table = $('#table_contents').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('index.php/admin/Obat/ajax_cart') ?>",
                    "type": "POST"
                },
                "columns": [
                    { "data": "id_cart"},
                    { "data": "id_user"},
                    { "data": "id_obat"},
                    { "data": "nama_obat"},
                    { "data": "harga"},
                    {
                        "render": function(data, type, row){
                            update_link = `<?php echo base_url('admin/Obat/edit_cart/')?>${row.id_user}`
                            html = `<a href = ${update_link} class="btn btn-primary btn-sm">EDIT</a> | `;
                            html += `<button type="submit" class="btn btn-danger btn-sm" id="remove" value=${row.id_user}>DELETE</input>`;
                            return html;
                        }
                    }
                ]
            });
        })
        $(document).on('click', '#remove', function(){
            var id = $(this).val();
            Swal.fire({
                title: 'Apa Anda yakin ?',
                text: "Anda tidak dapat mengembalikan data tersebut",
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButtonClass: "btn btn-danger"
                },
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: '',//"<?php echo base_url('/public/user/delete_ajax/'); ?>" + id,
                        type: "GET",
                        success: function (){
                            table.ajax.reload();
                            Swal.fire({
                            icon: 'success',
                            title: 'Berhasil.',
                            text: 'Data tersebut berhasil di hapus'
                            });
                        },
                        error: function (){
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                            });
                        }
                    })
                }
            })
        })
    </script>
  </body>

</html>
