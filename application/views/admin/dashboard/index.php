<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>

  <body id="page-top">
    <?php $this->load->view('template/navbar'); ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
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
        <li class="nav-item">
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
              <a href="#">Dashboard</a>
            </li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list-alt"></i>
                  </div>
                  <div class="mr-5" id="card-jenis-obat"><p></p></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Admin_dashboard/jenis_obat_dashboard'); ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tablets"></i>
                  </div>
                  <div class="mr-5" id="card-obat"><p></p></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Admin_dashboard/obat_dashboard'); ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
                  <div class="mr-5" id="card-user"><p></p></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Admin_dashboard/user_dashboard'); ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5" id="card-cart"><p></p></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Admin_dashboard/cart_dashboard'); ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <!-- Area Chart Example-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-pie"></i>
                  Sebaran Obat</div>
                <div class="card-body">
                  <canvas id="chart-sebaran-obat" width="100%" height="100"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Area Chart Example-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-pie"></i>
                  Sebaran User</div>
                <div class="card-body">
                  <canvas id="chart-sebaran-user-kelamin" width="100%" height="100"></canvas>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © @POTIK</span>
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
    <script type="text/javascript" src="<?php echo base_url('assets/js/randomcolor.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        function loadChart(elementId, ajaxUrl){
          Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#292b2c';

          var ctx = document.getElementById(elementId);
          $.ajax({
            url: ajaxUrl,
            method: "GET",
            success: function(data) {
              var color = [];
              var randomColor = function() {
                let colorResult = '';
                for(let i = 0; i < data['value'].length; i++){
                  do {
                    colorResult = getRandomColor();
                  } while (color.includes(colorResult));
                  color.push(colorResult);
                }
                return colorResult;
              }
              randomColor();
              var chartData = {
                labels: data.label,
                datasets: [{
                  backgroundColor: color,
                  borderColor: 'rgba(200, 200, 200, 0.75)',
                  hoverBorderColor: 'rgba(200, 200, 200, 1)',
                  data: data['value']
                }]
              }
              var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: chartData
              });
            },
            complete: function() {
              setTimeout( function() {
                loadChart(elementId, ajaxUrl)
              }, 30000)
            }
          })
        }

        function ajaxCardData(){
          $.ajax({
            url: "<?php echo base_url('admin/Admin_dashboard/ajax_card_data') ?>",
            method: "GET",
            success: function(data){
              $('#card-jenis-obat > p').text(`${data.count_jenis_obat} Jenis Obat Tersedia`);
              $('#card-obat > p').text(`${data.count_obat} Obat Tersedia`);
              $('#card-user > p').text(`${data.count_user} User Terdaftar`);
              $('#card-cart > p').text(`${data.count_cart} Cart Dibuat`);
            },
            complete: function() {
              setTimeout(ajaxCardData, 5000);
            }
          })
        }
        loadChart('chart-sebaran-obat', "<?php echo base_url('admin/Admin_dashboard/ajax_chart_obat'); ?>");
        loadChart('chart-sebaran-user-kelamin', "<?php echo base_url('admin/Admin_dashboard/ajax_chart_user'); ?>");
        ajaxCardData();
      })
    </script>
  </body>

</html>
