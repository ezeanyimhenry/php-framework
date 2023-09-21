<?php

use Framework\Classes\Utility;

?>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="col-xxl-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title-group mb-4 align-items-start">
                                    <div class="card-title">
                                        <h4 class="title mb-0">Invest</h4>
                                    </div>
                                </div>
                                <div class="row g-gs">
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
                                                        id="planTypeSelect" class="js-select" data-search="true"
                                                        data-sort="false">
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
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="minimum_amount"
                                                        name="minimum_amount" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Maximum
                                                Amount</label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="maximum_amount"
                                                        name="maximum_amount" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Duration
                                                </label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <input type="text" class="form-control" id="duration"
                                                        name="duration" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">days</span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Return on Investment
                                                </label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <input type="text" class="form-control" id="roi"
                                                        name="roi" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">% daily</span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Amount
                                                </label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" step=".01" min="10" class="form-control" id="amount"
                                                        name="amount" value="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Profit
                                                </label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="profit"
                                                        name="profit" value="0" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Total
                                                </label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <!-- Display plan details in separate input fields -->
                                                    <div class="input-group"><div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="total"
                                                        name="total" value="0" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Select
                                                Source</label>
                                            <div class="col-sm-10">
                                                <div class="form-control-wrap">
                                                    <select name="source" id="source"
                                                        class="js-select" data-search="true"
                                                        data-sort="false">
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
    </div>
</div>