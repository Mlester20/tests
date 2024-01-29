<?php
    include_once('connection.php');

    // Fetch department data from the database
    $departmentQuery = "SELECT * FROM departments";
    $departmentResult = $conn->query($departmentQuery);

    if (isset($_POST['add'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $department_id = $_POST['department_id'];

        $sql = "INSERT INTO members (firstname, lastname, address, department_id) VALUES ('$firstname', '$lastname', '$address', '$department_id')";

        // Use for MySQLi OOP
        if($conn->query($sql)){
            $_SESSION['success'] = 'Member added successfully';
        } else {
            $_SESSION['error'] = 'Something went wrong while adding';
        }
    } else {
        $_SESSION['error'] = 'Fill up add form first';
    }

    header('location: index.php');
?>

<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <form method="POST" action="add.php">

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Firstname:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Lastname:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Address:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>

                        <!-- New Dropdown for Department -->
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Department:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id" required>
                                    <?php
                                    while ($department = $departmentResult->fetch_assoc()) {
                                        echo "<option value='" . $department['department_id'] . "'>" . $department['department_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div> <!-- //container-fluid -->
                </div> <!-- // Body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel
                    </button>

                    <button type="submit" name="add" class="btn btn-primary">
                        <span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
