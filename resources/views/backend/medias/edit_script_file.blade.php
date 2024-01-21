<script>
    document.querySelector('input[name="file"]').addEventListener('change', function() {
        const fileInput = this.files[0];
        if (fileInput) {
            const currentDate = new Date();
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const uploadedOn = currentDate.toLocaleDateString('en-US', options);
            const uploadedBy = ''; // Replace with the actual uploader's name
            const fileName = fileInput.name;
            const fileType = fileInput.type || 'Unknown';
            const fileSize = (fileInput.size / 1024).toFixed(2) + ' KB';

            // Set the values in the visible list
            document.getElementById('uploaded-on').textContent = uploadedOn;
            document.getElementById('file-name').textContent = fileName;
            document.getElementById('file-type').textContent = fileType;
            document.getElementById('file-size').textContent = fileSize;

            // Set the values in the hidden input fields
            document.getElementById('hidden-uploaded-on').value = uploadedOn;
            document.getElementById('hidden-file-name').value = fileName;
            document.getElementById('hidden-file-type').value = fileType;
            document.getElementById('hidden-file-size').value = fileSize;

            const img = new Image();
            img.src = URL.createObjectURL(fileInput);
            img.onload = function() {
                const dimensions = img.width + 'x' + img.height;
                document.getElementById('dimensions').textContent = dimensions;

                // Set the dimensions value in the hidden input field
                document.getElementById('hidden-dimensions').value = dimensions;
            };
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var copyButton = document.getElementById('copyButton');
        var fileUrlInput = document.getElementById('file_url');

        copyButton.addEventListener('click', function() {
            // Get the value from the file_url input
            var fileUrl = fileUrlInput.value;

            // Create a temporary input element and set its value to the fileUrl
            var tempInput = document.createElement("input");
            tempInput.value = fileUrl;

            // Append the temporary input element to the document
            document.body.appendChild(tempInput);

            // Select the value in the temporary input
            tempInput.select();

            // Copy the selected text to the clipboard
            document.execCommand("copy");

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // Provide some visual feedback to the user (optional)
            copyButton.textContent = 'Copied!';
            setTimeout(function() {
                copyButton.textContent = 'Copy URL to Clipboard';
            }, 2000); // Reset the button text after 2 seconds
        });
    });
</script>

<script>
    function fetchCategories() {
        $.ajax({
            type: 'GET',
            url: "{{ route('medias.get-categories') }}",
            dataType: 'json',
            success: function(response) {
                const selectElement = $('#category_id');
                // Clear existing options
                selectElement.empty();

                // Add the default option
                selectElement.append('<option readonly value="">Select Category</option>');

                // Add fetched categories to the select element
                $.each(response.categories, function(index, category) {
                    const selectedAttribute = (response.selectedCategoryID === name
                        .id) ? 'selected' : '';
                    const option =
                        `<option value="${category.id}" ${selectedAttribute}>${category.name}</option>`;
                    selectElement.append(option);
                });
            },
            error: function(xhr, status, error) {
                // Handle the error response if needed
                console.error('Error fetching categories:', error);
            }
        });
    }
    fetchCategories();

    $('#categoryForm').submit(function(event) {
        event.preventDefault();
        const formData = $(this).serialize();
        // Send the Ajax request
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                notifySuccess(response.message);
                $('#categoryForm').trigger('reset');
                $('#exampleModal1').modal('hide');
                fetchCategories();
            },
            error: function(xhr, status, error) {
                notifyError('An error occurred while submitting the form.');
            }
        });
    });

    function notifySuccess(message) {
        alert(message);
    }

    function notifyError(message) {
        alert(message);
    }
</script>