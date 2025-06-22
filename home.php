<?php include('db_connect.php') ?>

<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>

<div class="col-md-12 align-self-center">
                    <marquee direction="left" behavior="alternate" scrollamount=1 >
   
</marquee></div>
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box  shadow-sm border c-1">
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>

              <div class="inner">
                 <p>Total Branches</p>
                <h3><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h3>
              </div>
              
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4 ">
            <div class="small-box shadow-sm border c-2">
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>

              <div class="inner">
               <p>Total Parcels</p>
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

              </div>
            </div>
          </div>

           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm border c-3">
               <div class="icon">
                <i class="fa fa-users"></i>
              </div>

              <div class="inner">
                <p>Total Staff</p>
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>
              </div>
            </div>
          </div>
        
       
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card card-outline ">
        <div class="card-body">
          
        <table class="table table-bordered">
  <thead>
    <tr>
      <th>Sl No.</th>
      <th>Status</th>
      <th>Count</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $statuses = [
      0 => "Item Accepted by Courier",
      1 => "Collected",
      2 => "Shipped",
      3 => "In-Transit",
      4 => "Arrived At Destination",
      5 => "Out for Delivery",
      6 => "Ready to Pickup",
      7 => "Delivered",
      8 => "Picked-up",
      9 => "Unsuccessful Delivery Attempt"
    ];

    $i = 1;
    foreach ($statuses as $code => $label):
      $where = "status = $code";
      if ($_SESSION['login_type'] != 1) {
        $branch_id = $_SESSION['login_branch_id'];
        $where .= " AND (from_branch_id = $branch_id OR to_branch_id = $branch_id)";
      }
      $count = $conn->query("SELECT COUNT(*) as total FROM parcels WHERE $where")->fetch_assoc()['total'];
    ?>
      <tr>
        <td class="text-center"><?php echo $i++ ?></td>
        <td><?php echo $label ?></td>
        <td class="text-center"><?php echo $count ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
          
        </div>
      </div>
 
    </div>
    <!-- Pie Chart -->
      <div class="col-md-6">
          <div id="piechart" style="width: 50px; height: 50px;"></div> 
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <canvas id="statusPieChart" width="400" height="400"></canvas>
        <script>
  const statusLabels = <?php echo json_encode(array_values($statuses)); ?>;
  const statusCounts = [];

  <?php foreach ($statuses as $code => $label): 
    $where = "status = $code";
    if ($_SESSION['login_type'] != 1) {
      $branch_id = $_SESSION['login_branch_id'];
      $where .= " AND (from_branch_id = $branch_id OR to_branch_id = $branch_id)";
    }
    $count = $conn->query("SELECT COUNT(*) as total FROM parcels WHERE $where")->fetch_assoc()['total'];
  ?>
    statusCounts.push(<?php echo $count; ?>);
  <?php endforeach; ?>

  const ctx = document.getElementById('statusPieChart').getContext('2d');
  const statusPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: statusLabels,
      datasets: [{
        label: 'Parcel Status Distribution',
        data: statusCounts,
        backgroundColor: [
          '#007bff', '#6c757d', '#17a2b8', '#ffc107',
          '#28a745', '#fd7e14', '#20c997', '#6610f2',
          '#dc3545', '#343a40'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'right'
        },
        title: {
          display: true,
          text: 'Parcel Status Overview',
          font: {
            size: 18,
            bold: true
          }
        }
      }
    }
  });
</script>
      </div>
      <!-- Pie Chart -->

   
  </div>

   <div class="row">
        <div class="col-md-12">
          <div class="card card-outline ">
        <div class="card-body">
  <div class="marquee-container">
    

<div style="width: 100%; overflow: hidden;">
  <marquee
    direction="down"
    behavior="alternate"
    scrollamount="4"
    onmouseover="this.stop();"
    onmouseout="this.start();"
  >
    <b>For any Project or Website Designing contact me at <a href="mailto:satapathyabhisekh2003@gmail.com">satapathyabhisekh2003@gmail.com</a><b>
  </marquee>
</div>



  </div>
</div>
      </div>
 </div>

        
     
        
      </div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
