<?php
include "connect.php";
if (isset($_POST['confirmDelete'])) {
    # code...
    $query = "TRUNCATE TABLE `tasks`";
    $resp = mysqli_query($con,$query);
    if ($resp) {
        # code...
        echo "
        <script>
        alert('All Tasks deleted successfully!'); // You can replace this with actual deletion logic
    
        </script>
        ";
        
    }else{
        echo "
        <script>
        alert('Sorry!! Tasks not deleted successfully!'); // You can replace this with actual deletion logic
        </script>
        ";
    }

    header('location: ../setting/index.php?link=home');
}
?>  