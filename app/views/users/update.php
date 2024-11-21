<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Minimalistic Form Container -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Card for a structured layout -->
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Create New User</h3>
                </div>
                <div id="flash-alert" class="alert d-none"></div>
                 <!-- Card with a minimalistic style -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <!-- Form -->
                        <form id="update_form">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $u['JPACM_lastname']?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $u['JPACM_firstname']?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $u['JPACM_email']?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="Male" <?= $u['JPACM_gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= $u['JPACM_gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option value="Other" <?= $u['JPACM_gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2" required><?= $u['JPACM_address']?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                        <!-- Back Button -->
                        <div class="d-grid">
                            <a href="<?= site_url('/') ; session_destroy()?>" class="btn btn-secondary">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (including Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#update_form').on('submit', function (e) {
            e.preventDefault(); 

            const formData = $(this).serialize();

            $.ajax({
                url: '<?= site_url("/update/" . $u["JPACM_id"]) ?>', 
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#flash-alert')
                        .removeClass('d-none alert-danger')
                        .addClass('alert-success')
                        .text('User has updated successfully!');
                },
                error: function (xhr, status, error) {
                    $('#flash-alert')
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('Error updating user: ' + xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
