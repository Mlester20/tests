<?php
    session_start();
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