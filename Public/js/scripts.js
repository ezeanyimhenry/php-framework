// scripts.js

// Function to copy text to the clipboard
function copyToClipboard(text) {
    const textField = document.createElement('textarea');
    textField.innerText = text;
    document.body.appendChild(textField);
    textField.select();
    document.execCommand('copy');
    textField.remove();
}

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

// Get the referral link text from the <p> element by its id
const referralLink = document.getElementById('referralLinkText').textContent;

// Add a click event listener to the "Copy Link" button
document.getElementById('copyLinkButton').addEventListener('click', function () {
    copyToClipboard(referralLink);
    // alert('Link copied to clipboard!');
    displayAlert('Copied to clipboard: ' + referralLink);
});

function fetchPlanDetails(selectedPlanName, selectedPlanType) {
    $.ajax({
        url: '/investment/fetchPlanDetails/', // Use the appropriate URL pattern
        method: 'POST',
        contentType: 'application/json', // Set the content type to JSON
        data: JSON.stringify({        // Convert the data to JSON format
            planName: selectedPlanName,
            planType: selectedPlanType
        }),
        success: function (response) {
            // Define a function to update calculations
            function updateCalculations() {
                var userAmount = parseFloat($('#amount').val()); // Parse the input as a float

                if (response.length > 0) {
                    var planDetails = response[0]; // Access the first object in the array

                    var profit = (planDetails.roi * planDetails.duration / 100) * userAmount;
                    var total = profit + userAmount;

                    $('#minimum_amount').val(planDetails.minimum_amount);
                    $('#maximum_amount').val(planDetails.maximum_amount);
                    $('#roi').val(planDetails.roi);
                    $('#duration').val(planDetails.duration);
                    $('#profit').val(profit.toFixed(2));
                    $('#total').val(total.toFixed(2));
                } else {
                    console.error('No plan details found in the response.');
                }
            }

            // Attach an input event listener to the "amount" field
            $('#amount').on('input', updateCalculations);

            // Initially, trigger the calculations when the page loads
            updateCalculations();

        },
        error: function (xhr, status, error) {
            console.error('Error fetching plan details: ' + error);
        },
    });
}

