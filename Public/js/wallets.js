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