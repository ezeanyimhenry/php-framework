<?php
use Framework\Helpers\Utility;

?>
<!--**********************************
			Content body start
		***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="page-titles">
			<h4 class="title mb-0">Welcome,
				<?= ucfirst($userDetails['firstName']) ?>
			</h4>
			<span class="small">Your IP Address:
				<?= Utility::getUserInfo()['ip_address'] ?>
			</span>
			<div>
				<span class="small">Your timezone is set to:
					<?= $userDetails['timezone'] ?>
				</span><a href="/profile" class="text-secondary"> Change Timezone</a>
			</div>
		</div>
		<div class="row ">
			<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-primary text-primary">
								<!-- <i class="ti-money"></i> -->
								<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Balance</p>
								<h4 class="mb-0">
									<?= number_format($accountBalance) ?>
								</h4>
								<!-- <span class="badge badge-primary">+3.5%</span> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-warning text-warning">
								<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="16" y1="13" x2="8" y2="13"></line>
									<line x1="16" y1="17" x2="8" y2="17"></line>
									<polyline points="10 9 9 9 8 9"></polyline>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Bills</p>
								<h4 class="mb-0">2570</h4>
								<span class="badge badge-warning">+3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body  p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-danger text-danger">
								<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
									viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Revenue</p>
								<h4 class="mb-0">364.50K</h4>
								<span class="badge badge-danger">-3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-success text-success">
								<svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
									viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
									<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
									<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
									<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Patient</p>
								<h4 class="mb-0">364.50K</h4>
								<span class="badge badge-success">-3.5%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6 col-xxl-12">
				<div class="card">
					<div class="card-header d-block d-sm-flex border-0">
						<div class="me-3">
							<h4 class="card-title mb-2">Previous Transactions</h4>
							<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
						</div>
						<div class="card-tabs mt-3 mt-sm-0">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#monthly"
										role="tab">Monthly</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">Weekly</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">Today</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body tab-content p-0">
						<div class="tab-pane active show fade" id="monthly" role="tabpanel">
							<div class="table-responsive">
								<table class="table table-responsive-md card-table transactions-table">
									<tbody>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">XYZ Store ID</a></h6>
												<span class="fs-14">Cashback</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-success fs-16 font-w500 text-end d-block">Completed</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-danger tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"
															fill="#FF2E2E"></path>
														<path
															d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"
															fill="#FF2E2E"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Chef Renata</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">-$167</span></td>
											<td><span
													class="text-warning fs-16 font-w500 text-end d-block">Pending</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Cindy Alexandro</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-danger fs-16 font-w500 text-end d-block">Canceled</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Paipal</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-success fs-16 font-w500 text-end d-block">Completed</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-danger tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"
															fill="#FF2E2E"></path>
														<path
															d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"
															fill="#FF2E2E"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Hawkins Jr.</a></h6>
												<span class="fs-14">Cashback</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-danger fs-16 font-w500 text-end d-block">Canceled</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane" id="Weekly" role="tabpanel">
							<div class="table-responsive">
								<table class="table table-responsive-md card-table transactions-table">
									<tbody>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">XYZ Store ID</a></h6>
												<span class="fs-14">Cashback</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-success fs-16 font-w500 text-end d-block">Completed</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-danger tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"
															fill="#FF2E2E"></path>
														<path
															d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"
															fill="#FF2E2E"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Chef Renata</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">-$167</span></td>
											<td><span
													class="text-warning fs-16 font-w500 text-end d-block">Pending</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Cindy Alexandro</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-danger fs-16 font-w500 text-end d-block">Canceled</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane" id="Today" role="tabpanel">
							<div class="table-responsive">
								<table class="table table-responsive-md card-table transactions-table">
									<tbody>
										<tr>
											<td>
												<svg class="bgl-danger tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"
															fill="#FF2E2E"></path>
														<path
															d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"
															fill="#FF2E2E"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Chef Renata</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">-$167</span></td>
											<td><span
													class="text-warning fs-16 font-w500 text-end d-block">Pending</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Cindy Alexandro</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-danger fs-16 font-w500 text-end d-block">Canceled</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-success tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z"
															fill="#2BC155"></path>
														<path
															d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z"
															fill="#2BC155"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Paipal</a></h6>
												<span class="fs-14">Transfer</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-success fs-16 font-w500 text-end d-block">Completed</span>
											</td>
										</tr>
										<tr>
											<td>
												<svg class="bgl-danger tr-icon" width="63" height="63"
													viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g>
														<path
															d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"
															fill="#FF2E2E"></path>
														<path
															d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"
															fill="#FF2E2E"></path>
													</g>
												</svg>
											</td>
											<td>
												<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);"
														class="text-black">Hawkins Jr.</a></h6>
												<span class="fs-14">Cashback</span>
											</td>
											<td>
												<h6 class="fs-16 text-black font-w600 mb-0">June 4, 2020</h6>
												<span class="fs-14">05:34:45 AM</span>
											</td>
											<td><span class="fs-16 text-black font-w600">+$5,553</span></td>
											<td><span
													class="text-danger fs-16 font-w500 text-end d-block">Canceled</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-xxl-12">
				<div class="row">
					<div class="col-xl-12">
						<div class="card coin-card">
							<div class="card-body d-sm-flex d-block align-items-center">
								<span class="coin-icon">
									<svg width="38" height="41" viewBox="0 0 38 41" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<g>
											<path
												d="M14.0413 32.5832C15.7416 32.5934 17.4269 32.2659 18.9997 31.6199C20.5708 32.2714 22.2572 32.5991 23.958 32.5832C29.1218 32.5832 33.1663 29.8278 33.1663 26.3088V20.441C33.1663 16.922 29.1218 14.1666 23.958 14.1666C23.7186 14.1666 23.4834 14.1779 23.2497 14.1906V7.55498C23.2497 4.10823 19.2051 1.41656 14.0413 1.41656C8.87759 1.41656 4.83301 4.10823 4.83301 7.55498V26.4448C4.83301 29.8916 8.87759 32.5832 14.0413 32.5832ZM30.333 26.3088C30.333 27.9366 27.715 29.7499 23.958 29.7499C20.201 29.7499 17.583 27.9366 17.583 26.3088V24.9984C19.5015 26.1652 21.7131 26.7604 23.958 26.714C26.203 26.7604 28.4145 26.1652 30.333 24.9984V26.3088ZM23.958 16.9999C27.715 16.9999 30.333 18.8132 30.333 20.441C30.333 22.0687 27.715 23.8807 23.958 23.8807C20.201 23.8807 17.583 22.0673 17.583 20.441C17.583 18.8147 20.201 16.9999 23.958 16.9999ZM14.0413 4.2499C17.7983 4.2499 20.4163 5.9924 20.4163 7.55498C20.4163 9.11757 17.7983 10.8615 14.0413 10.8615C10.2843 10.8615 7.66634 9.11898 7.66634 7.55498C7.66634 5.99098 10.2843 4.2499 14.0413 4.2499ZM7.66634 12.0161C9.59282 13.1601 11.8012 13.7417 14.0413 13.6948C16.2814 13.7417 18.4899 13.1601 20.4163 12.0161V14.6341C18.8724 15.0232 17.4565 15.8078 16.308 16.9107C15.5631 17.0718 14.8034 17.1545 14.0413 17.1572C10.2843 17.1572 7.66634 15.4146 7.66634 13.8521V12.0161ZM7.66634 18.3132C9.59323 19.4561 11.8015 20.0371 14.0413 19.9905C14.2935 19.9905 14.5372 19.9593 14.7851 19.9466C14.764 20.1106 14.7522 20.2756 14.7497 20.441V23.3947C14.5117 23.4089 14.2822 23.4542 14.0413 23.4542C10.2843 23.4542 7.66634 21.7117 7.66634 20.1477V18.3132ZM7.66634 24.6088C9.59282 25.7529 11.8012 26.3344 14.0413 26.2876C14.2793 26.2876 14.5131 26.2692 14.7497 26.2578V26.3088C14.7699 27.5148 15.2334 28.6711 16.0516 29.5572C15.3887 29.6824 14.7159 29.7469 14.0413 29.7499C10.2843 29.7499 7.66634 28.0074 7.66634 26.4448V24.6088Z"
												fill="#fff"></path>
										</g>
									</svg>
								</span>
								<div>
									<h3 class="text-white">Refer & Earn</h3>
									<p>Your Referral link: <span id="referralLinkText">
											<?= WEBSITE_URL ?>?ref=
											<?= $userDetails['username'] ?>
										</span>
									</p><button class="btn btn-primary" id="copyLinkButton">Copy Link</button>
									<div id="alert" style="display: none;"
										class="alert alert-success solid alert-dismissible fade show">
										<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
											stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
											class="me-2">
											<polyline points="9 11 12 14 22 4"></polyline>
											<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
										</svg>
										<strong>Success!</strong> <span id="alert-text"></span>
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="btn-close">
										</button>
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
<!--**********************************
			Content body end
		***********************************-->