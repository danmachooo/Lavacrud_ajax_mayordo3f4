<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Container to center the form and give some margin -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Card for a structured layout -->
            <div class="card shadow-sm">
                <div class="card-header text-center bg-success text-white">
                    <h3>Create New User</h3>
                </div>
                <div id="flash-alert" class="alert d-none"></div>                
                
                <div class="card-body p-4">
                    <!-- User Form -->
                    <form id="create_form">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                        </div>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="" disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address" required></textarea>
                        </div>


                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-block">Create User</button>
                        </div>

                        
                        <!-- Back Button -->
                        <div class="d-grid mt-2">
                            <a href="<?php echo site_url('/'); session_destroy();?>" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (including Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#create_form').on('submit', function (e) {
            e.preventDefault(); 
            const formData = $(this).serialize(); 

            $.ajax({
                url: '<?= site_url("/add"); ?>', // Backend endpoint for adding user
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Display success message
                    $('#flash-alert')
                        .removeClass('d-none alert-danger')
                        .addClass('alert-success')
                        .text('User has added successfully!');

                    // Clear the form fields
                    $('#create_form')[0].reset();
                },
                error: function (xhr, status, error) {
                    // Display error message
                    $('#flash-alert')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('Error adding user: ' + xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
