@extend('layout/user/_layout')

@section('title', 'History - <?= WEBSITE_NAME ?>')

@section('content')

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Amount</th>
                                        <th>Fiat</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if({{ countActivities }} > 0)
                                        @foreach(activities as $activity)
                                    <?php //if (count($activities) > 0): ?>
                                        <?php //foreach ($activities as $activity): ?>
                                            <tr>
                                                <td>
                                                {{ $activity.create_time }}
                                                </td>
                                                <td>
                                                   {{ $activity.activity_type }}
                                                </td>
                                                <td>
                                                     {{ $activity.amount }}
                                                </td>
                                                <td>
                                                    {{ $activity.fiat }} 
                                                </td>
                                                <td>
                                                     {{ $activity.description }}
                                                </td>
                                                <td>
                                                    {{ $activity.status }}
                                                </td>
                                            </tr>
                                        <?php //endforeach; ?>
                                    <?php //else: ?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align:center;">No Data Available</td>
                                        </tr>
                                    <?php //endif; ?>
                                    @endif
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Amount</th>
                                        <th>Fiat</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
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