 <?php 
if (isset($_SESSION['userDetails'])) {
    $userDetails = $_SESSION['userDetails'];
}
 ?>
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
								<img src="Public/images/profile/pic1.jpg" width="20" alt="">
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi, <b><?= ucfirst($userDetails['username']) ?></b></span>
								<small class="text-end font-w400"><?= strtolower($userDetails['email']) ?></small>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="/profile" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="/logout" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li>
                    <li class="mb-4"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planTypeModal">
                    Invest</button></li>
                    <li><a class="ai-icon" href="/dashboard" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a></li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-exchange fw-bold"></i>
							<span class="nav-text">Transactions</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="/history">History</a></li>
							<li><a href="/withdraw">Withdraw</a></li>	
						</ul>

                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-user fw-bold"></i>
							<span class="nav-text">Account</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="/profile">Profile</a></li>
							<li><a href="/settings">Settings</a></li>	
						</ul>

                    </li>
                </ul>
				<div class="copyright">
					<p><strong><?= WEBSITE_NAME ?></strong> © <?= date('Y') ?> All Rights Reserved</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->