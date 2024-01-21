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
            document.getElementById('uploaded-by').textContent = uploadedBy;
            document.getElementById('file-name').textContent = fileName;
            document.getElementById('file-type').textContent = fileType;
            document.getElementById('file-size').textContent = fileSize;

            // Set the values in the hidden input fields
            document.getElementById('hidden-uploaded-on').value = uploadedOn;
            document.getElementById('hidden-uploaded-by').value = uploadedBy;
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
            url: "{{ route('medias.media-categories.add') }}",
            data: formData,
            dataType: 'json',
            success: function(response) {
                notifySuccess(response.message);
                $('#categoryForm').trigger('reset');
                $('#customModal').hide();
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

<script>
    $('#subcategoryContainer').hide();
    // Function to fetch subcategories
    function fetchSubcategories(selectedCategoryId) {
        $.ajax({
            type: 'GET',
            url: "{{ route('medias.get-subcategories') }}",
            data: {
                category_id: selectedCategoryId
            },
            dataType: 'json',
            success: function(response) {
                const subcategoryContainer = $('#subcategoryContainer');
                const subcategorySelect = $('#subcategory_id');

                subcategorySelect.empty(); // Clear existing options

                // Check if there are subcategories in the response
                if (response.subcategories.length > 0) {
                    subcategoryContainer.show(); // Show the subcategory container
                    subcategorySelect.append('<option readonly value="">Select Subcategory</option>');

                    // Add subcategories to the subcategory select element
                    $.each(response.subcategories, function(index, subcategory) {
                        const selectedAttribute = (response.selectedSubcategoryID === subcategory
                            .id) ? 'selected' : '';
                        const subcategoryOption =
                            `<option value="${subcategory.id}" ${selectedAttribute}>${subcategory.name}</option>`;
                        subcategorySelect.append(subcategoryOption);
                    });
                } else {
                    // Hide the subcategory container if no subcategories are present
                    subcategoryContainer.hide();
                }
            },
            error: function(xhr, status, error) {
                notifyError('An error occurred while fetching subcategories.');
                console.error('Error fetching subcategories:', error);
            }
        });
    }

    // Event handler for category selection change
    $('#category_id').change(function() {
        const selectedCategoryId = $(this).val();
        if (selectedCategoryId) {
            fetchSubcategories(selectedCategoryId);
        } else {
            // Clear subcategories if no category is selected
            $('#subcategory_id').empty();
            // Hide the subcategory container when no category is selected
            $('#subcategoryContainer').hide();
        }
    });
</script>

<script>
    // JavaScript to open and close the modal
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const customModal = document.getElementById('customModal');

    openModalButton.addEventListener('click', () => {
        customModal.style.display = 'block';
    });

    closeModalButton.addEventListener('click', () => {
        customModal.style.display = 'none';
    });

    // Close the modal if the user clicks outside of it
    window.addEventListener('click', (event) => {
        if (event.target === customModal) {
            customModal.style.display = 'none';
        }
    });
</script>

<script>
    // Function to toggle visibility and name attributes based on checkbox state
    function toggleFileUpload() {
        const fileCheckbox = document.getElementById('fileCheckbox');
        const fileUpload = document.getElementById('fileUpload');
        const urlUpload = document.getElementById('urlUpload');
        const fileInput = document.getElementById('fileInput');
        const fileUrlInput = document.getElementById('fileUrlInput');

        if (fileCheckbox.checked) {
            // Remove the name attribute from fileInput and add it to fileUrlInput
            fileInput.removeAttribute('name');
            fileUrlInput.setAttribute('name', 'url_link');
            fileUpload.style.display = 'none';
            urlUpload.style.display = 'block';
            fileInput.removeAttribute('required');
            fileUrlInput.setAttribute('required', 'required');
        } else {
            // Remove the name attribute from fileUrlInput and add it to fileInput
            fileUrlInput.removeAttribute('name');
            fileInput.setAttribute('name', 'file');
            fileUpload.style.display = 'block';
            urlUpload.style.display = 'none';
            fileUrlInput.removeAttribute('required');
            fileInput.setAttribute('required', 'required');
        }
    }

    // Attach the event listener to the checkbox
    const fileCheckbox = document.getElementById('fileCheckbox');
    fileCheckbox.addEventListener('change', toggleFileUpload);

    // Initial call to set the initial state
    toggleFileUpload();
</script>
