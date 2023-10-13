@extend('layout/user/_layout')

@section('title', 'Profile - <?= WEBSITE_NAME ?>')

@section('content')

<?php

use Framework\Helpers\Utility;

?>
<!--**********************************
			Content body start
		***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<!-- row -->
		<div class="row">
			<?php
			if (isset($_SESSION['error'])):
				Utility::displayAlert('error');
			endif;

			if (isset($_SESSION['success'])):
				Utility::displayAlert('success');
			endif;
			?>

			<div class="col-xl-4 col-lg-12 col-sm-12">
				<div class="card overflow-hidden">
					<div class="text-center p-3 overlay-box "
						style="background-image: url(Public/images/big/img5.jpg);">
						<div class="profile-photo">
							<div class="image-container">
								<img src="Public/images/profile/profile.png" width="100"
									class="img-fluid rounded-circle" alt="">
								<span class="camera-icon"><i class="fas fa-camera"></i></span>
							</div>
						</div>
						<h3 class="mt-3 mb-1 text-white">
							{{ userDetails.firstName }} {{ userDetails.lastName }}
						</h3>
						<p class="text-white mb-0">@
							{{ userDetails.username }}
						</p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email</span>
							<strong class="text-muted">
								{{ userDetails.email }}
							</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Role</span>
							<strong class="text-muted">
								{{ ucfirst(userDetails.role) }}
							</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Timezone</span>
							<strong class="text-muted">
								{{ userDetails.timezone }}
							</strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Your Ip
								Address</span> <strong class="text-muted">
								<?= Utility::getUserInfo()['ip_address'] ?>
							</strong></li>
					</ul>
					<div class="card-footer border-0 mt-0">
						<button class="btn btn-warning btn-block" data-bs-toggle="modal"
							data-bs-target="#changePasswordModal">
							<i class="fa fa-key"></i> Change Password
						</button>
						<br />
						<a href="/wallet-connect"><button class="btn btn-primary btn-lg btn-block">
								<i class="fa fa-wallet"></i> Connect Wallet
							</button></a>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Update Profile</h4>
					</div>
					<div class="card-body">
						<div class="basic-form">
							<form class="form-valide-with-icon needs-validation" method="POST"
								action="/profile/{{ userDetails.id }}" novalidate>
								<div class="mb-3">
									<label class="text-label form-label" for="validationCustomFirstname">Firstname<span
											class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
										<input type="text" class="form-control border-left-end" name="firstname"
											id="validationCustomFirstname" placeholder="Enter Firstname.."
											value="{{ userDetails.firstName }}" required>
										<div class="invalid-feedback">
											Please Enter a Name.
										</div>
									</div>
								</div>
								<div class="mb-3">
									<?php
									if (isset($_SESSION['firstname-error'])) {
										Utility::displayAlert('error', 'firstname-error');
									}
									?>
								</div>
								<div class="mb-3">
									<label class="text-label form-label" for="validationCustomLastName">Lastname<span
											class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
										<input type="text" class="form-control border-left-end" name="lastname"
											id="validationCustomLastName" placeholder="Enter Lastname.."
											value="{{ userDetails.lastName }}" required>
										<div class="invalid-feedback">
											Please Enter Name.
										</div>
									</div>
								</div>
								<div class="mb-3">
									<?php
									if (isset($_SESSION['lastname-error'])) {
										Utility::displayAlert('error', 'lastname-error');
									}
									?>
								</div>
								<div class="mb-3">
									<label class="text-label form-label" for="validationCustomUsername">Username<span
											class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
										<input type="text" class="form-control border-left-end" name="username"
											id="validationCustomUsername" placeholder="Enter a username.."
											value="{{ userDetails.username }}" required readonly>
										<div class="invalid-feedback">
											Please Enter a username.
										</div>
									</div>
								</div>
								<div class="mb-3">
								</div>
								<div class="mb-3">
									<label class="text-label form-label" for="validationCustomEmail">Email<span
											class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
										<input type="email" class="form-control border-left-end" name="email"
											id="validationCustomEmail" placeholder="Enter an email.."
											value="{{ userDetails.email }}" required readonly>
										<div class="invalid-feedback">
											Please Enter an email.
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label class="text-label form-label" for="validationCustomTimezones">Timezones<span
											class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-text"> <i class="fa fa-clock"></i> </span>
										<select name="timezone" id="validationCustomTimezones"
											class="form-control border-left-end">
											<option value="{{ userDetails.timezone }}" selected>
												{{ userDetails.timezone }}
											</option>
											@foreach(timezones as timezone)
											?>
											<option value="{{ timezone }}">
												{{ timezone }}
											</option>
											@endforeach
										</select>
										<div class="invalid-feedback">
											Please Select a Timezone.
										</div>
									</div>
								</div>
								<button type="submit" name="profile" class="btn me-2 btn-primary">Submit</button>
								<button type="submit" class="btn btn-danger light">Cancel</button>
							</form>
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

@endsection