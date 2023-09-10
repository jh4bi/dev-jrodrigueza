			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo">DEMO</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lifetime ID</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="pages/create_lid.php">Create Lifetime ID</a>
                </li>
                <li>
                    <a href="pages/retrive_lid.php">Retrieve Lifetime ID</a>
                </li>
                <li>
                    <a href="pages/update_lid.php">Update Lifetime ID</a>
                </li>
	            </ul>
	          </li>

	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MU Virtual Accounts</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="pages/create_muva.php">Create MUVA</a>
                </li>
                <li>
                    <a href="pages/retrive_muva.php">Retrieve MUVA</a>
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
                    <a href="standard_collection/normalDropdown.php">Dragonpay Dropdown</a>
                </li>
                <li>
                    <a href="standard_collection/filteredDropdown.php">Filtered Dropdown</a>
                </li>
                <!--<li>-->
                <!--     <a href="standard_collection/filterCustom.php">Filtering Payment Custom</a>-->
                <!--</li>-->
                <li>
                    <a href="standard_collection/custom.php">Custom UI</a>
                </li>
              </ul>
              </li>
	          <li>
              <a href="mass_payout/">Mass payout</a>
	          </li>
	          <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transactions</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
                    <a href="transactions/standard_collection">Standard Collection</a>
                </li>
                <li>
                    <a href="transactions/mass_payout">Mass payout</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
	          </li>
	        </ul>

					<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
<?php include 'includes/footer.php' ?>

	      </div>
    	</nav>