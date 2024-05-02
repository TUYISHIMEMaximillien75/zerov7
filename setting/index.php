<?php
session_start();

include '../php/connect.php';
$email = $_SESSION['email'];

if (empty($email)) {
    # code...
    header("location: ../");
}

$sql2 = "SELECT * FROM `users` WHERE email='$email'";
$res2 = mysqli_query($con, $sql2);

$data = mysqli_fetch_assoc($res2);

$uname = $data['user_name'];
$uid = $data['user_id'];
$email = $data['email'];
$id = $data['id'];
$profile = $data['profile'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZERO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.ico">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="icon" href="img/logo.ico">

    <script src="script.js"></script>

    <style>
    html {
        font-family: var(--body-font);
        color: var(--text);
        scroll-behavior: smooth;

    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scrollbar-width: thin;
        scrollbar-color: var(--primary) var(--secondary);
    }

    #app {
        display: flex;
        flex-direction: row;
        height: 100vh;
        width: 100%;
        position: fixed;
    }

    input {
        outline: 0;
    }

    #left-container {

        background-color: var(--primary);
        display: flex;
        flex-direction: column;
        flex: 15%;
        left: 500px;
        padding: 30px 30px;
        gap: 30px;
        position: fixed;
        margin-top: -40px;
        margin-left: 450px;
        height: 100vh;
        position: inherit;
    }

    #left-container .profile {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    #left-container .profile .profile-details {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    #left-container .profile .profile-details h4 {
        text-transform: capitalize;
        font-weight: 200;
        margin-left: -3px;
        font-size: x-large;
        font-family: '-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    }

    #left-container .profile .profile-details h5 {
        font-weight: 500;
        font-family: Arial, Helvetica, sans-serif;

    }

    #left-container .profile .img-container {
        width: 70px;
        height: 70px;
        border-radius: 100%;
    }

    #left-container .profile .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 100%;
    }

    .head {
        margin: 0;
        padding: 0;
        margin-top: -30px;
    }

    hr {
        margin-top: 60px;
    }

    header {
        margin-top: -40px;
        margin-left: 50px;
        font-size: xx-large;
        font-family: sans-serif;
    }

    .header img {
        margin-top: -30px;
    }


    .sign-out-btn {
        background-color: rgb(214, 23, 23);
        /* Green */
        border: none;
        color: white;
        padding: 9px 45px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 17px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 3px;
        transition: background-color 0.3s;
    }

    .sign-out-btn:hover {
        background-color: red;

    }


    .Reset {
        background-color: red;
        /* Green */
        border: none;
        color: white;
        padding: 9px 45px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 17px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 3px;
        transition: background-color 0.3s;
    }

    .manage-account-btn {
        background-color: #ffffff;
        border: 1px solid #cccccc;
        color: #333333;
        padding: 9px 17px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 3px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .manage-account-btn:hover {
        background-color: #cccccc;
        border-color: #999999;
    }

    .manage-account-btn {
        display: flex;
        margin-left: 50px;

    }

    .sign-out-btn {
        margin-left: -176px;
        margin-top: 100px;

    }

    .General {
        margin-top: 55px;
        margin-left: -50px;

    }

    h4 {
        font-family: sans-serif;
        font-weight: 100;
        margin-left: 50px;
        margin-top: 20px;
    }

    #toggleSwitch {
        margin-top: -50px;
        margin-left: 10px;
    }

    input[type="radio"] {
        transform: scale(2);
        display: flex;
    }


    /* =========reset pop up============ */
    .popup {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .popup-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    button {
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>


    <hr>
    <header><a href="../"><i class="bi bi-arrow-left" style="margin-left: -15px;"></i></a> &nbsp;Setting</header>

    <section id="left-container">

        <div class="profile">
            <div class="img-container">
                <img src="../assets/img/profile/<?php echo $profile;?>">

            </div>
            <div class="profile-details">
                <h4 class="userName"><?php echo $uname;?></h4>
                <h5 class="email"><?php echo $email;?></h5>
            </div>

            <a href="./index.php?link=manage" id="link0" hidden></a>
            <button class="manage-account-btn" onclick="document.getElementById('link0').click()">Manage
                Account</button>
            <a href="../php/signout.php"><button class="sign-out-btn">Sign Out</button></a>
        </div>
        </div>
        <div class="General">
            <header>General</header>
            <h4>Play completion sound</h4>

            </hr>
            <div class="container">
                <label class="switch" id="toggleSwitch">
                    <input type="checkbox" id="switchCheckbox" onchange="toggleSwitch()">
                    <span class="slider"></span>


                </label>

            </div>

            <button id="deleteButton" class="Reset" type="submit">Delete All Tasks</button>



            <form action="truncate.php" method="post">
            </form>

            <!-- Popup action="../php/truncate.php" -->
            <div id="popup" class="popup">
                    <form  method="post">

                <div class="popup-content">
                    <span class="close" id="closePopup">&times;</span>
                    <p>Are you sure you want to delete all tasks?</p>
                        <button id="confirmDelete" name="confirmDelete">Yes, Delete</button>
                <!-- <button type="submit" name="confirmDelete">check</button> -->
                        <button type="button" id="cancelDelete" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>

            <?php 

            if (isset($_POST['confirmDelete'])) {
                # code...
                $query = "DELETE * FROM `tasks` WHERE user_id='$uid'";
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


            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var deleteButton = document.getElementById('deleteButton');
                var popup = document.getElementById('popup');
                var closePopup = document.getElementById('closePopup');
                var cancelDelete = document.getElementById('cancelDelete');
                var deleteForm = document.getElementById('deleteForm');

                deleteButton.addEventListener('click', function() {
                    popup.style.display = 'block';
                });

                closePopup.addEventListener('click', function() {
                    popup.style.display = 'none';
                });

                cancelDelete.addEventListener('click', function() {
                    popup.style.display = 'none';
                });

                deleteForm.addEventListener('submit', function(event) {
                    // Prevent the default form submission behavior
                    event.preventDefault();

                    // Logic to handle form submission
                    // For demonstration, let's alert a message
                    alert("Tasks deleted successfully!"); // You can replace this with actual deletion logic
                    popup.style.display = 'none';
                });
            });
            </script>

        </div>
        <p id="switchState" style="margin-top:-119px;
margin-left:60px;   
">Off</p>


        <header style="margin-left: 30px;
margin-top:80px;
margin-left: -0%;
">Theme</header>

        <div class="themes">
            <div class="light">
                <input type="radio" name="choice" onclick="changeTheme('light')" id="">
                <h4>Light theme</h4>
            </div>
            <div class="light">
                <input type="radio" name="choice" onclick="changeTheme('dark')" id="">
                <h4>Dark theme</h4>
            </div>
            <div class="light">
                <input type="radio" name="choice" onclick="changeTheme('light')" id="">
                <h4>default theme</h4>
            </div>
        </div>

        <style>
        .themes {

            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .themes .light {
            display: flex;
        }

        .themes .light h4 {
            margin: auto;
            margin-left: 20px;
        }
        </style>
        <?php
include '../php/director.php';
?>

        <script>
        var visisble = false;

        const wrapper = document.querySelector(".wrapper");

        const fileName = document.querySelector(".file-name");

        const defaultBtn = document.querySelector("#default-btn");

        const customBtn = document.querySelector("#custom-btn");

        const cancelBtn = document.querySelector("#cancel-btn i");

        const img = document.querySelector("img");

        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

        function defaultBtnActive() {

            defaultBtn.click();

        }

        defaultBtn.addEventListener("change", function() {

            const file = this.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function() {

                    const result = reader.result;

                    img.src = result;

                    wrapper.classList.add("active");

                }

                cancelBtn.addEventListener("click", function() {

                    img.src = "";

                    wrapper.classList.remove("active");

                })

                reader.readAsDataURL(file);

            }

            if (this.value) {

                let valueStore = this.value.match(regExp);

                fileName.textContent = valueStore;

            }

        });

        function show() {

            var ind = document.getElementById("eye");

            var pass = document.getElementById("pswd");

            if (visisble == false) {

                ind.className = "bi bi-eye-slash";

                pass.type = "text";

                visisble = true;

            } else {

                ind.className = "bi bi-eye";

                pass.type = "password";

                visisble = false;

            }

        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>