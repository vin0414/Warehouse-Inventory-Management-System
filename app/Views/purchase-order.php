
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Purchase Order</title>

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
                width: 0px;               /* width of vertical scrollbar */
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
							<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Editor"){ ?>
							&nbsp;<span class="badge badge-pill bg-primary text-white" id="notification">0</span>
							<?php } ?>
							</a>
							<ul class="submenu">
                                <li><a href="<?=site_url('orders')?>">Purchase Request</a></li>
								<li><a href="<?=site_url('list-orders')?>">List Order</a></li>
								<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Editor"){ ?>
								<li><a href="<?=site_url('approve-orders')?>">For Approval&nbsp;<span class="badge badge-pill bg-primary text-white" id="notifications">0</span></a></li>
								<li><a href="<?=site_url('canvass-sheet-request')?>">Canvass Sheet&nbsp;<span class="badge badge-pill bg-primary text-white" id="notif">0</span></a></li>
								<?php } ?>
								<?php if(session()->get('role')=="Staff"||session()->get('role')=="Administrator"){?>
								<li><a href="<?=site_url('assign')?>">Assigned PRF</a></li>
								<li><a href="<?=site_url('local-purchase')?>">Local Purchase</a></li>
								<li><a href="<?=site_url('purchase-order')?>" class="active">Purchase Order</a></li>
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
						<?php if(session()->get('role')=="Administrator"||session()->get('role')=="Staff"){ ?>
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
				<?php if(!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= session()->getFlashdata('success'); ?>
					</div>
				<?php endif; ?>
                <div class="card-box">
                    <div class="card-header">Purchase Order (P.O.)</div>
                    <div class="card-body">
						<div class="tabs">
							<ul class="nav nav-pills justify-content-left" role="tablist">
								<li class="nav-item">
									<a
										class="nav-link active text-blue"
										data-toggle="tab"
										href="#home6"
										role="tab"
										aria-selected="true"
										>Generate</a
									>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-blue"
										data-toggle="tab"
										href="#pending6"
										role="tab"
										aria-selected="true"
										>List of Purchase Order</a
									>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-blue"
										data-toggle="tab"
										href="#delivery6"
										role="tab"
										aria-selected="true"
										>For Deliveries</a
									>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-blue"
										data-toggle="tab"
										href="#report6"
										role="tab"
										aria-selected="true"
										>Approved P.O.</a
									>
								</li>
							</ul> 
							<div class="tab-content">
								<div class="tab-pane fade show active" id="home6" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover nowrap">
										<thead>
											<th>Date Prepared</th>
											<th>Date Needed</th>
											<th>Reference No</th>
											<th>Department</th>
											<th>PRF No</th>
											<th>Type</th>
											<th>Status</th>
											<th>Action</th>
										</thead>
										<tbody>
										<?php foreach($canvass as $row): ?>
											<tr>
												<td><?php echo $row->DatePrepared?></td>
												<td><?php echo $row->DateNeeded ?></td>
												<td><a class="btn btn-link" href="export/<?php echo $row->Reference ?>" target="_blank"><?php echo $row->Reference ?></a></td>
												<td><?php echo $row->Department ?></td>
												<td><a class="btn btn-link" href="generate/<?php echo $row->OrderNo ?>" target="_blank"><?php echo $row->OrderNo ?></a></td>
												<td><?php echo $row->PurchaseType ?></td>
												<td>
													<?php if($row->Status==""){ ?>
														<span class="badge bg-warning text-white">WAITING</span>
													<?php }else{ ?>
														<?php if($row->Status==0){ ?>
															<span class="badge bg-info text-white">CREATED</span>
														<?php }else {?>
															-
														<?php }?>
													<?php }?>
												</td>
												<td>
													<?php if($row->Status==""){ ?>
														<button type="button" class="btn btn-outline-primary btn-sm generate" value="<?php echo $row->Reference ?>">
														<span class="dw dw-add"></span>&nbsp;Create
														</button>
													<?php }else{ ?>
														<?php if($row->Status==1){ ?>
														<div class="dropdown">
															<a class="btn btn-primary btn-sm dropdown-toggle"
																href="#" role="button" data-toggle="dropdown">
																More
															</a>
															<div class="dropdown-menu dropdown-menu-left dropdown-menu-icon-list">
																<a class="dropdown-item" href="<?=site_url('download/')?><?php echo $row->Reference ?>">
																	<span class="dw dw-download"></span>&nbsp;Download PO
																</a>
																<a class="dropdown-item" href="Attachment/<?php echo $row->file ?>" target="_blank">
																	<span class="dw dw-download"></span>&nbsp;PRF Attachment
																</a>
																<a class="dropdown-item" href="Canvass/<?php echo $row->Attachment ?>" target="_blank">
																	<span class="dw dw-download"></span>&nbsp;Quotation
																</a>
															</div>
														</div>
														<?php }else{ ?>
															-
														<?php }?>
													<?php } ?>
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="pending6" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover">
										<thead>
											<th>Date</th>
											<th>Vendor</th>
											<th>P.O. No</th>
											<th>PRF No</th>
											<th>Reference</th>
											<th>Status</th>
											<th>Remarks</th>
											<th>Action</th>
										</thead>
										<tbody>
										<?php foreach($purchase as $row): ?>
											<tr>
												<td><?php echo $row->Date ?></td>
												<td><?php echo $row->Supplier ?></td>
												<td><?php echo $row->purchaseNumber ?></td>
												<td><?php echo $row->OrderNo ?></td>
												<td><?php echo $row->Reference ?></td>
												<td>
													<?php if($row->Status==0){ ?>
														<span class="badge bg-warning text-white">PENDING</span>
													<?php }else if($row->Status==1){?>
														<span class="badge bg-success text-white">APPROVED</span>
													<?php }else if($row->Status==3){?>
															<span class="badge bg-primary text-white">CHECKING</span>
													<?php }else{ ?>
														<span class="badge bg-danger text-white"><?php echo $row->Comment ?></span>
													<?php } ?>
												</td>
												<td>
													<?php if($row->Remarks=="OPEN"){ ?>
														<span class="badge bg-warning text-white"><?php echo $row->Remarks ?></span>
													<?php }else {?>
														<span class="badge bg-secondary text-white"><?php echo $row->Remarks ?></span>
													<?php } ?>
												</td>
												<td>
													<div class="dropdown">
														<a class="btn btn-primary btn-sm dropdown-toggle"
															href="#" role="button" data-toggle="dropdown">
															More
														</a>
														<div class="dropdown-menu dropdown-menu-left dropdown-menu-icon-list">
															<?php if($row->Status==1){ ?>
															<a class="dropdown-item" href="<?=site_url('file-download/')?><?php echo $row->purchaseNumber ?>">
																<i class="dw dw-download"></i>&nbsp;Download
															</a>
															<a class="dropdown-item" href="<?=site_url('open-file/')?><?php echo $row->purchaseNumber ?>" target="_blank">
																<i class="icon-copy dw dw-view"></i>&nbsp;View
															</a>
															<a class="dropdown-item" href="<?=site_url('change/')?><?php echo $row->purchaseNumber ?>">
																<i class="icon-copy dw dw-repeat-1"></i>&nbsp;Change Vendor
															</a>
															<?php if(session()->get('role')=="Administrator"){ ?>
															<button type="button" class="dropdown-item cancel" value="<?php echo $row->purchaseLogID ?>">
																<i class="icon-copy dw dw-trash"></i>&nbsp;Cancel
															</button>
															<?php }?>
															<button type="button" class="dropdown-item sendEmail" value="<?php echo $row->purchaseNumber ?>">
																<i class="icon-copy dw dw-mail"></i>&nbsp;Send via Email
															</button>
															<button type="button" class="dropdown-item deliver" value="<?php echo $row->purchaseNumber ?>">
																<i class="icon-copy dw dw-delivery-truck-2"></i>&nbsp;Delivery
															</button>
															<?php }else if($row->Status==2){ ?>
															<a class="dropdown-item" href="<?=site_url('modify/')?><?php echo $row->purchaseNumber ?>">
																<i class="dw dw-edit"></i>&nbsp;Modify
															</a>
															<a class="dropdown-item" href="<?=site_url('change/')?><?php echo $row->purchaseNumber ?>">
																<i class="icon-copy dw dw-repeat-1"></i>&nbsp;Change Vendor
															</a>	
															<?php } ?>
														</div>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="delivery6" role="tabpanel">
									<br/>
									<table class="data-table table stripe hover">
										<thead>
											<th>P.O. No</th>
											<th>Expected Date</th>
											<th>Payment Status</th>
											<th>Delivery Status</th>
											<th>Remarks</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php foreach($delivery as $row): ?>
												<tr>
													<td><?php echo $row['purchaseNumber'] ?></td>
													<td><?php echo $row['ExpectedDate'] ?></td>
													<td>
														<?php if($row['PaymentStatus']==0){ ?>
															<span class="badge bg-warning text-white">Pending</span>
														<?php }else { ?>
															<span class="badge bg-success text-white">Paid</span>
														<?php } ?>
													</td>
													<td>
														<?php if($row['DeliveryStatus']=="Pending"){ ?>
															<span class="badge bg-warning text-white">For Delivery</span>
														<?php }else if($row['DeliveryStatus']=="Delivered") { ?>
															<span class="badge bg-success text-white">Delivered</span>
														<?php }else{ ?>
															<span class="badge bg-danger text-white">Cancelled</span>
														<?php } ?>
													</td>
													<td>
														<?php if($row['ActualDate']=="N/A"){ ?>	
															-
														<?php }else{ ?>
															<?php if($row['ActualDate'] <= $row['ExpectedDate']){?>
																<span class="badge bg-success text-white">On-Time</span>
															<?php }else if($row['ActualDate'] > $row['ExpectedDate']){ ?>
																<span class="badge bg-danger text-white">Late</span>
															<?php } ?>
														<?php } ?>												
													</td>
													<td>
														<div class="dropdown">
															<a class="btn btn-primary btn-sm dropdown-toggle"
																href="#" role="button" data-toggle="dropdown">
																More
															</a>
															<div class="dropdown-menu dropdown-menu-left dropdown-menu-icon-list">
																<?php if($row['PaymentStatus']==0){ ?>
																<button type="button" class="dropdown-item tagAsPaid" value="<?php echo $row['deliveryID'] ?>">
																	<i class="icon-copy dw dw-checked"></i>&nbsp;Paid
																</button>
																<?php } ?>
																<?php if($row['DeliveryStatus']=="Pending"){ ?>
																<button type="button" class="dropdown-item tagAsDelivered" value="<?php echo $row['deliveryID'] ?>">
																	<i class="icon-copy dw dw-checked"></i>&nbsp;Delivered
																</button>
																<button type="button" class="dropdown-item paidDelivered" value="<?php echo $row['deliveryID'] ?>">
																	<i class="icon-copy dw dw-checked"></i>&nbsp;Paid & Delivered
																</button>
																<button type="button" class="dropdown-item cancelDelivery" value="<?php echo $row['deliveryID'] ?>">
																	<i class="icon-copy dw dw-cancel"></i>&nbsp;Cancelled
																</button>
																<?php } ?>
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="report6" role="tabpanel">
									<br/>
									<div class="row g-1">
										<div class="col-lg-12 form-group">
											<form method="GET" class="row g-3" id="frmReport">
												<div class="col-lg-2">
													<input type="date" class="form-control" name="from"/>
												</div>
												<div class="col-lg-2">
													<input type="date" class="form-control" name="to"/>
												</div>
												<div class="col-lg-8">
													<input type="submit" class="btn btn-primary text-white" id="btnGenerate" value="Generate"/>
													<a href="javascript:void(0);" class="btn btn-outline-primary" onclick="exportf(this)"><span class="bi bi-download"></span>Export</a>
												</div>
											</form>
										</div>
										<div class="col-lg-12 form-group tableFixHead" style="height:400px;overflow-y:auto;font-size:13px;">
											<table class="table-bordered table-striped" id="table">
												<thead>
													<th>P.O. No</th>
													<th>Unit Price</th>
													<th>Vendor</th>
													<th>Contact Person</th>
													<th>Contact No</th>
													<th>Terms</th>
													<th>Warranty</th>
												</thead>
												<tbody id="output"></tbody>
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
		<div class="modal fade" id="deliverModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Add Delivery Date
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
						<form method="POST" class="row g-3" id="frmDelivery">
							<input type="hidden" name="code" id="code"/>
							<div class="col-12 form-group">
								<label>Expected Date</label>
								<input type="date" class="form-control" name="date"/>
							</div>
							<div class="col-12 form-group">
								<input type="submit" class="btn btn-primary" id="btnSend" value="Save Entry"/>
							</div>
						</form>
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
				notify();
			});
			$(document).on('click','.deliver',function(){
				$('#deliverModal').modal('show');
				$('#code').attr("value",$(this).val());
			});

			$(document).on('click','.cancelDelivery',function(){
				var confirmation = confirm('Do you want to tag this as cancelled?');
				if(confirmation)
				{
					$.ajax({
						url:"<?=site_url('cancel-delivery')?>",method:"POST",
						data:{id:$(this).val()},
						success:function(response)
						{
							if(response==="success"){
								location.reload();
							}else{
								alert(response);
							}
						}
					});
				}
			});

			$(document).on('click','.tagAsDelivered',function(){
				var confirmation = confirm('Do you want to tag this as delivered?');
				if(confirmation)
				{
					$.ajax({
						url:"<?=site_url('delivered')?>",method:"POST",
						data:{id:$(this).val()},
						success:function(response)
						{
							if(response==="success"){
								location.reload();
							}else{
								alert(response);
							}
						}
					});
				}
			});

			$(document).on('click','.paidDelivered',function(){
				var confirmation = confirm('Do you want to tag this as Paid and Delivered?');
				if(confirmation)
				{
					$.ajax({
						url:"<?=site_url('paid-delivery')?>",method:"POST",
						data:{id:$(this).val()},
						success:function(response)
						{
							if(response==="success"){
								location.reload();
							}else{
								alert(response);
							}
						}
					});
				}
			});

			$(document).on('click','.tagAsPaid',function(){
				var confirmation = confirm('Do you want to tag this as Paid?');
				if(confirmation)
				{
					$.ajax({
						url:"<?=site_url('tag-as-paid')?>",method:"POST",
						data:{id:$(this).val()},
						success:function(response)
						{
							if(response==="success"){
								location.reload();
							}else{
								alert(response);
							}
						}
					});
				}
			});

			function notify()
			{
				$.ajax({
					url:"<?=site_url('notification')?>",method:"GET",
					success:function(response)
					{
						$('#notifications').html(response);
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
			$(document).on('click','.generate',function(e)
            {
                e.preventDefault();
                Swal.fire({
					title: "Are you sure?",
					text: "Do you want to create purchase order form with this selected Vendor?",
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
							url:"<?=site_url('create-purchase-order')?>",method:"POST",
							data:{value:val},success:function(response)
							{
								if(response==="success")
								{
									location.reload();
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

			$(document).on('click','.sendEmail',function(e)
            {
                e.preventDefault();
                Swal.fire({
					title: "Are you sure?",
					text: "Do you want to send this Purchase Order Form?",
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
							url:"<?=site_url('send-email')?>",method:"POST",
							data:{value:val},success:function(response)
							{
								if(response==="success")
								{
									alert("Great! Successfully sent");
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

			$(document).on('click','.cancel',function(e)
            {
                e.preventDefault();
                Swal.fire({
					title: "Are you sure?",
					text: "Do you want to cancel this P.O.?",
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
							url:"<?=site_url('cancel-purchase-order')?>",method:"POST",
							data:{value:val},success:function(response)
							{
								if(response==="success")
								{
									location.reload();
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

			$('#frmDelivery').on('submit',function(e){
				e.preventDefault();
				var data = $(this).serialize();
				$('#btnSend').attr("value","Saving. Please wait");
				$.ajax({
					url:"<?=site_url('delivery')?>",method:"POST",
					data:data,
					success:function(response)
					{
						if(response==="success"){location.reload();}else{alert(response);}
						$('#btnSend').attr("value","Save Entry");
					}
				});
			});

			$('#btnGenerate').on('click',function(e){
				e.preventDefault();
				var data = $('#frmReport').serialize();
				$('#output').html("<tr><td colspan='7'><center>Loading...</center></td></tr>");
				$.ajax({
					url:"<?=site_url('generate-report')?>",method:"GET",
					data:data,success:function(response)
					{
						if(response==="")
						{
							$('#output').html("<tr><td colspan='7'><center>No Record(s)</center></td></tr>");
						}
						else
						{
							$('#output').html(response);
						}
					}
				});
			});

			function exportf(elem) {
			var table = document.getElementById("table");
			var html = table.outerHTML;
			var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
			elem.setAttribute("href", url);
			elem.setAttribute("download","purchase-order-report.xls"); // Choose the file name
			return false;
			}
		</script>
	</body>
</html>
