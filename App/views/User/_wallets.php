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
                            <?php foreach ($wallets as $wallet): ?>
                                <option value="<?= $wallet['currency'] ?>">
                                    <?= $wallet['currency'] ?>
                                </option>
                            <?php endforeach; ?>
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

            <!-- <div id="wallet_details">
                       Wallet details will be displayed here based on user selection 
                    </div> -->

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        // Add JavaScript to handle the currency select change event
                        $('#currency_select').change(function () {
                            var selectedCurrency = $(this).val();

                            // Make an AJAX request to fetch wallet details for the selected currency
                            $.ajax({
                                url: '/wallet/fetchWalletDetails', // Adjust the URL
                                method: 'POST',
                                contentType: 'application/json', // Set the content type to JSON
                                data: JSON.stringify({        // Convert the data to JSON format
                                    currency: selectedCurrency
                                }),
                                success: function (response) {
                                    if (response.length > 0) {
                                        var walletDetails = response[0]; // Access the first object in the array

                                        $('#wallet_details').css('display', 'block');

                                        $('#currency').html(walletDetails.currency);
                                        $('#network').html(walletDetails.network);
                                        $('#address').html(walletDetails.address);
                                        $('#barcode').attr('src', 'Public/images/barcodes/' + walletDetails.barcode);

                                    } else {
                                        console.error('No wallet details found in the response.');
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error fetching wallet details: ' + error);
                                }
                            });

                            // Add a click event listener to the "Copy" button
                            $('#copyButton').on('click', function () {
                                var walletAddress = $('#address').text(); // Get the wallet address

                                // Create a temporary input element
                                var tempInput = $('<input>').val(walletAddress).appendTo('body').select();

                                // Copy the selected text (address) to the clipboard
                                document.execCommand('copy');

                                // Remove the temporary input element
                                tempInput.remove();

                                // Alert the user that the address has been copied
                                displayAlert('Copied to clipboard: ' + walletAddress);
                            });

                            function displayAlert(message) {
                                // Display the alert
                                var alertElement = $('#alert');
                                var alertText = $('#alert-text');
                                alertElement.css('display', 'block');
                                alertText.text(message);

                                // Automatically hide the alert after 3 seconds
                                setTimeout(function () {
                                    alertElement.css('display', 'none');
                                }, 3000);
                            }


                        });
                    </script>


        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->