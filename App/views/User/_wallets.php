<!-- wallets.php -->

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">


                    <select name="currency_select" class="js-select" data-search="true" data-sort="false"
                        id="currency_select">
                        <option value="">Select Currency/Network</option>
                        <?php foreach ($wallets as $wallet): ?>
                            <option value="<?= $wallet['currency'] ?>">
                                <?= $wallet['currency'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="col-md-6 col-12">
                        <div class="card" id="wallet_details" style="display: none;"> <img id="barcode" src=""
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title"><span id="currency"></span> Address</h3>
                                <span>Network: </span><span id="network"></span>
                                <p class="card-text" id="address"></p> <button id="copyButton"
                                    class="btn btn-primary">Copy
                                    Address</button>
                                <div id="alert" style="display: none;" class="alert alert-success" role="alert">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="wallet_details">
                        <!-- Wallet details will be displayed here based on user selection -->
                    </div>

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
                                alertElement.text(message).css('display', 'block');

                                // Automatically hide the alert after 3 seconds
                                setTimeout(function () {
                                    alertElement.css('display', 'none');
                                }, 3000);
                            }


                        });
                    </script>



                </div>
            </div>
        </div>
    </div>
</div>