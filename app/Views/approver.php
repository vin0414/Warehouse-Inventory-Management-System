
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Purchase Requisition/Purchase Order</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="assets/img/fastcat.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="assets/img/fastcat.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="assets/img/fastcat.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css" />
        <style>
        /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1; 
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888; 
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555; 
            }
            ::-webkit-scrollbar {
                height: 4px;              /* height of horizontal scrollbar ← You're missing this */
                width: 4px;               /* width of vertical scrollbar */
                border: 1px solid #d5d5d5;
              }
			.tableFixHead thead th { position: sticky; top: 0; z-index: 1;color:#fff;background-color:#0275d8;}
			table  { border-collapse: collapse; width: 100%; }
			th, td { padding: 8px 16px;color:#000; }
			tbody{color:#000;}
			  .loading-spinner{
				width:30px;
				height:30px;
				border:2px solid indigo;
				border-radius:50%;
				border-top-color:#0001;
				display:inline-block;
				animation:loadingspinner .7s linear infinite;
				}
				@keyframes loadingspinner{
				0%{
					transform:rotate(0deg)
				}
				100%{
					transform:rotate(360deg)
				}
				}
        </style>
	</head>
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="assets/img/fastcat.png" alt="Fastcat" width="100"/>
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
                                <i class="dw dw-user1"></i>
							</span>
							<span class="user-name"><?php echo session()->get('fullname'); ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="<?=site_url('profile')?>"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" onclick="return confirm('Do you want to sign out?')" href="<?=site_url('/logout')?>"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src="vendors/images/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="<?=site_url('/dashboard')?>">
					<img src="assets/img/fastcat.png" alt="" class="dark-logo" width="100"/>
					<img
						src="assets/img/fastcat.png"
						alt="" width="100"
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="<?=site_url('dashboard')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
                            <i class="micon dw dw-shopping-cart"></i><span class="mtext">Purchasing</span>
							</a>
							<ul class="submenu">
                                <li><a href="<?=site_url('orders')?>">Purchase Request</a></li>
								<li><a href="<?=site_url('list-orders')?>">List Order</a></li>
								<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Editor"){ ?>
								<li><a href="<?=site_url('approve-orders')?>" class="active">For Approval&nbsp;<span class="badge badge-pill bg-primary text-white" id="notifications">0</span></a></li>
								<li><a href="<?=site_url('canvass-sheet-request')?>">Canvass Sheet&nbsp;<span class="badge badge-pill bg-primary text-white" id="notif">0</span></a></li>
								<?php } ?>
								<?php if(session()->get('role')=="Staff"||session()->get('role')=="Administrator"){?>
								<li><a href="<?=site_url('assign')?>">Assigned PRF</a></li>
								<li><a href="<?=site_url('local-purchase')?>">Local Purchase</a></li>
								<li><a href="<?=site_url('purchase-order')?>">Purchase Order</a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
                                <i class="micon dw dw-clipboard1"></i><span class="mtext">Receiving</span>
							</a>
							<ul class="submenu">
                                <li><a href="<?=site_url('receiving-item')?>">Receiving Item</a></li>
								<?php if(session()->get('role')=="Staff"||session()->get('role')=="Administrator"){?>
								<li><a href="<?=site_url('receive-order')?>">Received Order</a></li>
								<?php } ?>
								<li><a href="<?=site_url('reserved')?>">Reserved</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
                            <i class="micon dw dw-server"></i><span class="mtext">Inventory</span>
							</a>
							<ul class="submenu">
								<li><a href="<?=site_url('stocks')?>">All Stocks</a></li>
								<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Planner"){ ?>
								<li><a href="<?=site_url('add')?>">Add Item</a></li>
								<li><a href="<?=site_url('manage')?>">Manage Stocks</a></li>
                                <?php } ?>
							</ul>
						</li>
						<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Editor"){ ?>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
                                <i class="micon dw dw-shop"></i><span class="mtext">Suppliers</span>
							</a>
							<ul class="submenu">
                                <li><a href="<?=site_url('suppliers')?>">List of Suppliers</a></li>
								<li><a href="<?=site_url('add-supplier')?>">Add Supplier</a></li>
							</ul>
						</li>
						<?php } ?>
						<?php if(session()->get('role')=="Administrator"){ ?>
						<li class="dropdown">
							<a href="<?=site_url('request')?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-clipboard-data"></span
								><span class="mtext">Request</span>
							</a>
						</li>
						<?php } ?>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
                                <i class="micon dw dw-bar-chart-1"></i><span class="mtext">Reports</span>
							</a>
							<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Editor"){ ?>
							<ul class="submenu">
								<li><a href="<?=site_url('overall-report')?>">Main Report</a></li>
								<li><a href="<?=site_url('monitoring')?>">PRF/PO Monitoring</a></li>
                                <li><a href="<?=site_url('report-stocks')?>">Stocks Report</a></li>
								<li><a href="<?=site_url('ledger')?>">Vendor's Ledger</a></li>
								<li><a href="<?=site_url('return-order-summary')?>">Return Order Report</a></li>
								<li><a href="<?=site_url('issuance')?>">Issuance Report</a></li>
							</ul>
							<?php }else{ ?>
							<ul class="submenu">
								<li><a href="<?=site_url('add-report')?>">Create Report</a></li>
								<li><a href="<?=site_url('prf-report')?>">PRF Report</a></li>
							</ul>
							<?php } ?>
						</li>
						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Extra</div>
						</li>
						<?php if(session()->get('role')=="Administrator"){ ?>
						<li>
							<a href="<?=site_url('configuration')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-settings1"></span
								><span class="mtext">System configuration</span>
							</a>
						</li>
						<?php } ?>
                        <li>
							<a href="<?=site_url('profile')?>" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user1"></span
								><span class="mtext">Profile</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="card-box">
					<div class="card-header"><span class="dw dw-list"></span>&nbsp;PRF/Purchase Order (For Approval)</div>
					<div class="card-body">
						<?php if(!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
						<div style="float:right;">
							<small>Legends:</small><br/>
							<span class="badge bg-danger text-white"><i class="icon-copy bi bi-exclamation-triangle"></i> Emergency</span>
							<span class="badge bg-warning text-white"><i class="icon-copy bi bi-clock"></i> Urgent</span>
						</div>
						<div class="tabs">
							<ul class="nav nav-pills justify-content-left" role="tablist">
								<li class="nav-item">
									<a
										class="nav-link active text-blue"
										data-toggle="tab"
										href="#others6"
										role="tab"
										aria-selected="false"
										>Purchase Requisition <span class="badge bg-primary btn-sm text-white" id="notification_approval">0</span></a
									>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-blue"
										data-toggle="tab"
										href="#purchase"
										role="tab"
										aria-selected="false"
										>Purchase Order <span class="badge bg-primary btn-sm text-white" id="notification_po">0</span></a
									>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="others6" role="tabpanel">
									<br/>
									<div class="row g-1">
										<div class="col-lg-3 form-group">
											<select class="form-control custom-select2" id="searchType">
												<option value="1">Search By PRF No</option>
												<option value="2">Search By Name</option>
												<option value="3">Search By Date</option>
												<option value="4">Search By Department</option>
											</select>
										</div>
										<div class="col-lg-9 form-group">
											<input type="search" class="form-control" id="search" placeholder="Search here..."/>
										</div>
										<div class="col-12 form-group">
											<div class="table-responsive tableFixHead" style="height:500px;overflow-y:auto;">
												<table class="table table-striped hover nowrap">
													<thead>
														<th>&nbsp;</th>
														<th>Date Received</th>
														<th>PRF No</th>
														<th>Requestor</th>
														<th>Department</th>
														<th>Date Needed</th>
														<th>Date Approved</th>
														<th>Status</th>
														<th>Action</th>
													</thead>
													<tbody id="tblreview">
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="purchase" role="tabpanel">
									<br/>
									<div class="row g-3">
										<div class="col-12 form-group">
											<input type="search" class="form-control" id="searchPO" placeholder="Search here..."/>
										</div>
										<div class="col-12 form-group">
											<div class="table-responsive tableFixHead" style="height:500px;overflow-y:auto;"">
												<table class="table table-striped hover nowrap">
													<thead>
														<th>Date Received</th>
														<th>P.O. No</th>
														<th>PRF No</th>
														<th>Department</th>
														<th>Date Approved</th>
														<th>Order(s)</th>
														<th>Status</th>
														<th>Action</th>
													</thead>
													<tbody id="tblpurchase"> 
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="viewModal" data-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#EC5800;">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">
                            Purchase Requisition Details (PRF)
                        </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="viewQuotationModal" data-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#EC5800;">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">
                            Purchase Order Details
                        </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
						<div id="output"></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal" id="modal-loading" data-backdrop="static">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-body text-center">
					<div class="loading-spinner mb-2"></div>
					<div>Loading</div>
				</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="assets/vendors/scripts/core.js"></script>
		<script src="assets/vendors/scripts/script.min.js"></script>
		<script src="assets/vendors/scripts/process.js"></script>
		<script src="assets/vendors/scripts/layout-settings.js"></script>
		<script src="assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="assets/vendors/scripts/datatable-setting.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function()
			{
				notify();loadOrder();loadPurchase();
			});

			function loadOrder()
			{
				$('#tblreview').html("<tr><td colspan='9'><center>Searching....</center></td></tr>");
				$.ajax({
					url:"<?=site_url('load-order')?>",method:"GET",
					success:function(response)
					{
						if(response==="")
						{
							$('#tblreview').html("<tr><td colspan='9'><center>No Record(s) found</center></td></tr>");
						}
						else
						{
							$('#tblreview').html(response);
						}
					}
				});
			}

			$('#search').keyup(function()
			{
				var val = $(this).val(); 
				var searchType = $('#searchType').val();
				$('#tblreview').html("<tr><td colspan='9'><center>Searching....</center></td></tr>");
				$.ajax({
					url:"<?=site_url('search-order')?>",method:"GET",
					data:{value:val,search:searchType},
					success:function(response)
					{
						if(response==="")
						{
							$('#tblreview').html("<tr><td colspan='9'><center>No Record(s) found</center></td></tr>");
						}
						else
						{
							$('#tblreview').html(response);
						}
					}
				});
			});

			function loadPurchase()
			{
				$.ajax({
					url:"<?=site_url('load-purchase')?>",method:"GET",
					success:function(response)
					{
						if(response==="")
						{
							$('#tblpurchase').html("<tr><td colspan='8'><center>No Record(s) found</center></td></tr>");
						}
						else
						{
							$('#tblpurchase').html(response);
						}
					}
				});
			}

			$('#searchPO').keyup(function()
			{
				var val = $(this).val(); 
				$('#tblpurchase').html("<tr><td colspan='8'><center>Searching....</center></td></tr>");
				$.ajax({
					url:"<?=site_url('search-purchase')?>",method:"GET",
					data:{values:val},
					success:function(response)
					{
						if(response==="")
						{
							$('#tblpurchase').html("<tr><td colspan='8'><center>No Record(s) found</center></td></tr>");
						}
						else
						{
							$('#tblpurchase').html(response);
						}
					}
				});
			});

			function approver()
			{
				$.ajax({
					url:"<?=site_url('list-editor')?>",method:"GET",
					success:function(response)
					{
						$('#departmentHead').append(response);
					}
				});
			}
			function notify()
			{
				$.ajax({
					url:"<?=site_url('notification')?>",method:"GET",
					success:function(response)
					{
						$('#notifications').html(response);
						$('#notification_approval').html(response);
					}
				});
				$.ajax({
					url:"<?=site_url('notification-purchase')?>",method:"GET",
					success:function(response)
					{
						$('#notification_approval').html(response);
					}
				});
				$.ajax({
					url:"<?=site_url('notification-purchase-order')?>",method:"GET",
					success:function(response)
					{
						$('#notification_po').html(response);
					}
				});
				$.ajax({
					url:"<?=site_url('canvas-notification')?>",method:"GET",
					success:function(response)
					{
						$('#notif').html(response);
					}
				});
				$.ajax({
					url:"<?=site_url('total-notification')?>",method:"GET",
					success:function(response)
					{
						$('#notification').html(response);
					}
				});
			}
			$(document).on('click','.assign',function(e)
			{
				e.preventDefault();
				var val = $(this).val();
				$('#prfID').attr("value",val);
				$('#assignModal').modal('show');
			});

			$(document).on('click','.accept',function(e)
			{
				e.preventDefault();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to accept this selected request?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes!"
					}).then((result) => {
					if (result.isConfirmed) {
						var data = $('#frmReview').serialize();
						$('#modal-loading').modal('show');
						$.ajax({
							url:"<?=site_url('accept')?>",method:"POST",
							data:data,success:function(response)
							{
								if(response==="success")
								{
									//location.reload();
									$('#viewModal').modal('hide');
									notify();loadOrder();
								}
								else
								{
									alert(response);
								}
								$('#modal-loading').modal('hide');
							}
						});
					}
				});
			});

			$(document).on('click','.hold',function(e)
			{
				e.preventDefault();
				var val = $('#reviewID').val();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to hold this selected request?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes!"
					}).then((result) => {
					if (result.isConfirmed) {
						var message = prompt("Enter your comment to hold the request");
						$.ajax({
							url:"<?=site_url('hold-request')?>",method:"POST",
							data:{value:val,message:message},success:function(response)
							{
								if(response==="success")
								{
									//location.reload();
									$('#viewModal').modal('hide');
									notify();loadOrder();
								}
								else
								{
									alert(response);
								}
							}
						});
					}
				});
			});

			$(document).on('click','.cancel',function(e)
			{
				e.preventDefault();
				var val = $('#reviewID').val();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to cancel this selected request?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes!"
					}).then((result) => {
					if (result.isConfirmed) {
						var message = prompt("Enter your comment to cancel");
						$.ajax({
							url:"<?=site_url('cancel')?>",method:"POST",
							data:{value:val,message:message},success:function(response)
							{
								if(response==="success")
								{
									//location.reload();
									$('#viewModal').modal('hide');
									notify();loadOrder();
								}
								else
								{
									alert(response);
								}
							}
						});
					}
				});
			});

			$(document).on('click','.view',function(e)
			{
				e.preventDefault();
				var val = $(this).val();
				$.ajax({
					url:"<?=site_url('view-purchase')?>",method:"GET",
					data:{value:val},
					success:function(response)
					{
						approver();
						$('#viewModal').modal('show');
						$('#result').html(response);
					}
				});
			});

			$(document).on('click','.viewQuotation',function(e)
			{
				e.preventDefault();
				var val = $(this).val();
				$.ajax({
					url:"<?=site_url('view-quotation')?>",method:"GET",
					data:{value:val},
					success:function(response)
					{
						approver();
						$('#viewQuotationModal').modal('show');
						$('#output').html(response);
					}
				});
			});

			$('#btnSave').on('click',function(e)
			{
				e.preventDefault();
				$(this).attr("value","Please wait");
				var data = $('#frmAssign').serialize();
				$.ajax({
					url:"<?=site_url('add-assignment')?>",method:"POST",
					data:data,
					success:function(response)
					{
						if(response==="success")
						{
							location.reload();
						}
						else
						{
							alert(response);
						}
						$('#btnSave').attr("value","Submit");
					}
				});
			});

			$(document).on('click','.approve',function(e)
			{
				e.preventDefault();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to approve this selected Purchase Number?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes!"
					}).then((result) => {
					if (result.isConfirmed) {
						var val = $(this).val();
						$('#modal-loading').modal('show');
						$.ajax({
							url:"<?=site_url('approve')?>",method:"POST",
							data:{value:val},success:function(response)
							{
								if(response==="success")
								{
									//location.reload();
									$('#viewQuotationModal').modal('hide');
									notify();loadPurchase();
								}
								else
								{
									alert(response);
								}
								$('#modal-loading').modal('hide');
							}
						});
					}
				});
			});

			$(document).on('click','.decline',function(e)
			{
				e.preventDefault();
				Swal.fire({
					title: "Are you sure?",
					text: "Do you want to decline this selected Purchase Number?",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes!"
					}).then((result) => {
					if (result.isConfirmed) {
						var val = $(this).val();
						var message = prompt("Please leave a comment");
						$('#modal-loading').modal('show');
						$.ajax({
							url:"<?=site_url('decline')?>",method:"POST",
							data:{value:val,message:message},success:function(response)
							{
								if(response==="success")
								{
									//location.reload();
									$('#viewQuotationModal').modal('hide');
									notify();loadPurchase();
								}
								else
								{
									alert(response);
								}
								$('#modal-loading').modal('hide');
							}
						});
					}
				});
			});
		</script>
	</body>
</html>
