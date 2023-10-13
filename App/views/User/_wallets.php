@extend('layout/user/_layout')

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
                        <h4 class="card-title">Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        <select id="currency_select" name="currency_select" class="default-select form-control">
                            <option value="">Select Currency/Network</option>
                            @foreach(wallets as wallet)
                                <option value="{{ wallet.currency }}">
                                {{ wallet.currency }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card text-white bg-info" id="wallet_details"  style="display: none;">
                    <img class="card-img-top img-fluid" src="" id="barcode" alt="Card image cap">
                    <div class="card-header">
                        <h5 class="card-title text-white"><span id="currency"></span> Address</h5>
                        <span>Network: </span><span id="network"></span>
                    </div>
                    <div class="card-body mb-0">
                        <p class="card-text" id="address"></p> <button id="copyButton" class="btn btn-primary">Copy
                            Address</button>

                    </div>
                    <div class="card-footer bg-transparent border-0 text-white">
                        <div id="alert" style="display: none;" class="alert alert-success solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <strong>Success!</strong> <span id="alert-text"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->