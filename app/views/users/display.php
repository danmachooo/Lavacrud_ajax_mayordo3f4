<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayordo 3F4 - LAVACRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">All Users</h2>
    <h6 class="text-center" style="font-weight: normal">programmed by danmachooo</h6>
    
    <!-- Create User Button -->
    <a href="<?= site_url('/add'); ?>" class="btn btn-success mb-2" id="createUserBtn">Add new user</a>
    <?php flash_alert(); ?>
    
    <!-- User Table -->
    <div class="table-responsive">
        <table id="userTable" class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['JPACM_id']?></td>
                    <td><?= $user['JPACM_lastname']?></td>
                    <td><?= $user['JPACM_firstname']?></td>
                    <td><?= $user['JPACM_email']?></td>
                    <td><?= $user['JPACM_gender']?></td>
                    <td><?= $user['JPACM_address']?></td>
                    <td>
                        <!-- Update Button -->
                        <a href="<?=site_url('/update/'. $user['JPACM_id']);?>" class="btn btn-primary btn-sm">Update</a>
                        <!-- Delete Button -->
                        <a href="<?=site_url('/delete/'. $user['JPACM_id']);?>" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery (necessary for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS Bundle (including Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "dom": '<"d-flex justify-content-between mb-3"<"#createUserContainer">f>t<"d-flex justify-content-between"lp>',
        });
        
        // Move Create User Button into DataTables control area
        $('#createUserContainer').html($('#createUserBtn'));
        $('.delete-btn').on('click', function (e) {
                e.preventDefault(); 

                var deleteUrl = $(this).attr('href'); 
                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'GET',    
                        success: function (response) {
                            console.log('Response:', response); 
                            alert('User has deleted successfully!');
                            location.reload(); 
                        },
                        error: function (xhr, status, error) {
                            console.log('Error:', error); 
                            console.log('Status:', status); 
                            console.log('Response:', xhr.responseText); 
                            alert('An error occurred while deleting the user.');
                        }
                    });
                }
            });
    });
</script>

</body>
</html>
