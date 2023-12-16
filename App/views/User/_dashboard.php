@extend('layout/user/_layout')

@section('title')
Dashboard - <?= WEBSITE_NAME ?>
@endsection

@section('content')
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
				{{ ucfirst(userDetails.firstName) }}
			</h4>
			<span class="small">Your IP Address:
				<?= Utility::getUserInfo()['ip_address'] ?>
			</span>
			<div>
				<span class="small">Your timezone is set to:
					{{ userDetails.timezone }}
				</span><a href="/profile" class="text-secondary"> Change Timezone</a>
			</div>
		</div>
	</div>
</div>
<!--**********************************
			Content body end
		***********************************-->

@endsection