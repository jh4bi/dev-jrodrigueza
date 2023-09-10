<!doctype html>
<html lang="en">
  <head>
  	<title>Dragonpay API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="icon" type="image/x-icon" href="../../img/dp.png">
              <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="../../index.php" class="logo">DEMO</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lifetime ID</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="../../pages/create_lid.php">Create Lifetime ID</a>
                </li>
                <li>
                    <a href="../../pages/retrive_lid.php">Retrieve Lifetime ID</a>
                </li>
                <li>
                    <a href="../../pages/update_lid.php">Update Lifetime ID</a>
                </li>
	            </ul>
	          </li>

	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MU Virtual Accounts</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="../../pages/create_muva.php">Create MUVA</a>
                </li>
                <li>
                    <a href="../../pages/retrive_muva.php">Retrieve MUVA</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
	          </li>
             <li>
              <a href="#standardCollection" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Standard Collection</a>
              <ul class="collapse list-unstyled" id="standardCollection">
                <li>
                    <a href="../../standard_collection/normalDropdown.php">Dragonpay Dropdown</a>
                </li>
                <li>
                    <a href="../../standard_collection/filteredDropdown.php">Filtered Dropdown</a>
                </li>
                <!--<li>-->
                <!--    <a href="../../standard_collection/filterCustom.php">Filtering Payment Custom</a>-->
                <!--</li>-->
               <li>
                    <a href="../../standard_collection/custom.php">Custom UI</a>
                </li>
              </ul>
              </li>
	          <li>
              <a href="../../mass_payout/">Mass payout</a>
	          </li>
	          <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transactions</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
                    <a href="../standard_collection">Standard Collection</a>
                </li>
                <li>
                    <a href="index.php">Mass payout</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
	          </li>
	        </ul>

					<div><br><br><br><br><br><br><br><br><br><br></div>
<?php include '../../includes/footer.php' ?>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <h2 class="mb-4">Mass Payout - Transactions</h2>
<?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>

<fieldset style="width: 90%; padding: 5px; ">
  <legend>Transactions Records</legend>
<div>
  <?php include('../../config/conn.php'); ?>

<div class="row">
  <div class="col-lg-12">
        <div class="box">

            <div id="collapse4" class="body">
<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
             <th>Refno</th>
             <th>Transaction ID</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>Amount</th>
            <th>Description</th>
            <th>ProcId</th>
            <th>ProcDetail</th>
            <th>RunDate</th>
            <th>Email</th>
            <th>Date_Update</th>
            <th>Status</th>
           
        </tr>
    </thead>
    <tbody >
        <?php
        $query = "SELECT * FROM mass_payout_data";
        if ($result = $conn->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $TxnId = $row["TxnId"];
                $FirstName = $row["FirstName"];
                $MiddleName = $row["MiddleName"];
                $LastName = $row["LastName"];
                $Amount = $row["Amount"];
                $Description = $row["Description"];
                $ProcId = $row["ProcId"];
                $ProcDetail = $row["ProcDetail"];
                $RunDate = $row["RunDate"];
                $Email = $row["Email"];
                $Date_Update = $row["date_update"];
                $Status = $row["status"];
                $Refno = $row["refno"];

                ?>
                <tr>
                    <td><?php echo $Refno; ?></td>
                    <td><?php echo $TxnId; ?></td>
                    <td><?php echo $FirstName; ?></td>
                    <td><?php echo $MiddleName; ?></td>
                    <td><?php echo $LastName; ?></td>
                    <td><?php echo $Amount; ?></td>
                    <td><?php echo $Description; ?></td>
                    <td><?php echo $ProcId; ?></td>
                    <td><?php echo $ProcDetail; ?></td>
                    <td><?php echo $RunDate; ?></td>
                    <td><?php echo $Email; ?></td>
                    <td><?php echo $Date_Update; ?></td>
                    <td><?php echo $Status; ?></td>
                    
                </tr>
        <?php
            }
            $result->free();
        }
        ?>
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>

</div>
</fieldset>

      </div>
		</div>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
      <script type="text/javascript">
  new DataTable('#example', {
    columnDefs: [
        {
            className: 'dtr-control',
            orderable: false,
            target: 0
        }
    ],
    order: [1, 'asc'],
    responsive: {
        details: {
            type: 'column',
            target: 'tr'
        }
    }
});
  </script>
  </body>
</html>