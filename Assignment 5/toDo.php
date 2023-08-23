<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task = $_POST['task'];

    $link = mysqli_connect("localhost", "root", "", "todoList");

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "INSERT INTO todo (task) VALUES ('$task')";

    if (mysqli_query($link, $sql)) {
        echo "Task added successfully.";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
