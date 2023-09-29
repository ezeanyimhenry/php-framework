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
                        <h4 class="card-title">Invest</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="/invest">
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="type" name="type"
                                                value="<?= $type ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Select
                                        Plan</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-wrap">
                                            <select name="plan_select" id="plan_select"
                                                onchange='fetchPlanDetails(this.value, "<?= $type ?>");'
                                                id="planTypeSelect" class="default-select form-control">
                                                <option value="">Select a Plan</option>
                                                <?php foreach ($investmentPlans as $investmentPlan): ?>
                                                    <option value="<?= $investmentPlan['plan_name'] ?>">
                                                        <?= $investmentPlan['plan_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Minimum
                                        Amount</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="minimum_amount"
                                                name="minimum_amount" readonly>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Maximum
                                        Amount</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="maximum_amount"
                                                name="maximum_amount" readonly>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Duration
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <input type="text" class="form-control" id="duration" name="duration"
                                                readonly>
                                            <span class="input-group-text">days</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Return on Investment
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <input type="text" class="form-control" id="roi" name="roi" readonly>
                                            <span class="input-group-text">% daily</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Amount
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step=".01" min="10" class="form-control" id="amount"
                                                name="amount" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Profit
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="profit" name="profit" readonly>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Total
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3  input-info">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" id="total" name="total" readonly>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Select
                                        Source</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-wrap">
                                            <select name="source" id="source" class="default-select form-control" >
                                                <option value="new_deposit" selected>New Deposit</option>
                                                <option value="from_balance">From Balance</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>




                                <div class="row mb-3">
                                    <button type="submit" name="invest" class="btn btn-primary"
                                        id="investButton">Invest</button>
                                </div>
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