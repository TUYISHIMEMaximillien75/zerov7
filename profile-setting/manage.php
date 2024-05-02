

    <style>

        .main_manage{
            position: absolute;
            width: 100%;
            background: rgb(50,50,50,0.7);
            left: 0;
            top: 0;
            min-height: 100vh;
        }

        .form-control:focus {

            box-shadow: none;

            border-color: #BA68C8
        }



        .profile-button {

            background: rgb(99, 39, 120);

            box-shadow: none;

            border: none
        }



        .profile-button:hover {

            background: #682773
        }



        .profile-button:focus {

            background: #682773;

            box-shadow: none
        }



        .profile-button:active {

            background: #682773;

            box-shadow: none
        }



        .back:hover {

            color: #682773;

            cursor: pointer
        }



        .labels {

            font-size: 11px
        }



        .add-experience:hover {
            margin-top: 20px;

            background: #BA68C8;

            color: #fff;

            cursor: pointer;

            border: solid 1px #BA68C8
        }

        .container {
            position: relative;
            top: 100px;
        }
    </style>



<div class="main_manage">
<form method="post" class="manage_form"  enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">

    <div class="row">
    <a href="./index.php?link=home" class="close" style="float: right; text-decoration: none;   ">&times;</a>

        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="wrapper">

                    <p style="text-align: center;" class="image profile">

                        <img src="../assets/img/profile/<?php echo $profile;?>" class="rounded-circle" alt=""
                            style="width: 200px;height: 200px;">

                    </p>

                    <div class="content" hidden>

                        <div class="icon">

                            <i class="fas fa-cloud-upload-alt"></i>

                        </div>

                        <div class="text" hidden>

                            No file chosen, yet!

                        </div>

                    </div>

                    <div id="cancel-btn" hidden>

                        <i class="fas fa-times"></i>

                    </div>

                    <div class="file-name" hidden>

                        File name here

                    </div>

                    <input type="button" onclick="defaultBtnActive()" class="form-control btn-danger"
                        id="custom-btn" value="Upload" name="upload">



                    <input id="default-btn" type="file" name="profile" hidden>



                </div><span class="font-weight-bold" id="uname"></span><span class="text-black-50"
                    id="email"></span><span> </span>
            </div>

        </div>

        <div class="col-md border-right">

            <div class="p-3 py-5">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h4 class="text-right">Profile Settings</h4>

                </div>

                <div class="row mt-2">

                    <div class="col-md-6"><label class="labels">User name</label><input type="text"
                            class="form-control" placeholder="username" name="uname" value="<?php echo $uname;?>" required></div>

                    <div class="col-md-6"><label class="labels">Email</label><input type="text"
                            class="form-control" placeholder="email" name="email" value="<?php echo $email;?>" required></div>

                </div>



                <div class="row mt-3" style="display: flex;">

                    <div class="col-md-12">
                        <label class="labels">Current password</label>
                        <input type="password" class="form-control"
                            placeholder="Old password" name="cpassword">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">new password</label>
                        <input type="password" class="form-control"
                            placeholder="new password" name="password">
                    </div>
                    <label class="labels">Reenter Password</label>

                    <div class="col-md-12 input-group">

                        <input type="password" class="form-control" placeholder="Re-enter password" name="repassword"
                            style="width: 90%;" id="pswd">

                        <a href="javascript:void(0)" class="form-control btn btn-warning" onclick="show()"><i
                                class="bi bi-eye" id="eye"></i></a>

                    </div>

                </div>



                <div class="mt-5 text-center">

                    <button class="btn btn-primary profile-button" type="submit" name="save">Save Changes</button>



                </div>

            </div>

        </div>

    </div>

</div>

</div>

</div>
<!-- <p>pet</p> -->

</form>


<?php
if (isset($_POST['save'])) {

    $image = $_FILES['profile']['name'];
    $uname = $_POST['uname'];

    $email = $_POST['email'];
    $cpass = $_POST['cpassword'];

    $pass = $_POST['password'];
    $rpass = $_POST['repassword'];

    $file_loc = $_FILES['profile']['tmp_name'];
    $folder = "../assets/img/profile";

    $new_name = uniqid('Binary-titans', true).$image;
    // =======check pswd====
    $encript = md5($cpass);
    $sql3 = "SELECT * FROM `users` WHERE email='$email' AND pswd = '$encript'";
    $res3 = mysqli_query($con, $sql3);
    $rec3 = mysqli_num_rows($res3);

    if (empty($image) && empty($pass)) {
        # code...
        $sql = "UPDATE `users` SET user_name='$uname',email='$email'WHERE id='$id'";
        $res = mysqli_query($con, $sql);
        
    
    }
    elseif ($pass!=""){
   
        
        if ($rec3 >=1) {
            # code...
            if ($pass === $rpass) {
                # code...
                $encript2=md5($pass);
                $sql = "UPDATE `users` SET pswd = '$encript2' WHERE id='$id'";
                $res = mysqli_query($con, $sql);
    
                if ($res) {
                    # code...
                    echo "
                    <script>
                    alert('Updated sucessfull now');
                    window.location.href='./index.php?link=home';
                    </script>
                    ";
                }else{
                    echo "
                    <script>
                    alert('not added');
                    // window.location.href='./index.php?link=home';
                    </script>
                    ";
                }
            }else {
                # code...
                echo "
                <script>
                // alert('Two passwords does not match');
                window.location.href='./index.php?link=home';
                </script>
                ";
            }

        }else{
            echo "
            <script>
            alert('Old password not correct');
            window.location.href='./index.php?link=manage';
            </script>
            ";
        }


    }elseif (empty($image) && !empty($pass)) {
        # code...
        # 
   
        
        if ($rec3 >=1) {
            # code...
            if ($pass === $rpass) {
                # code...
                $sql = "UPDATE `users` SET user_name='$uname',email='$email', pswd = '$encript' WHERE id='$id'";
                $res = mysqli_query($con, $sql);
    
                if ($res) {
                    # code...
                    echo "
                    <script>
                    // alert('Updated sucessfull');
                    window.location.href='./index.php?link=home';
                    </script>
                    ";
                }
            }else {
                # code...
                echo "
                <script>
                // alert('Two passwords does not match');
                window.location.href='./index.php?link=home';
                </script>
                ";
            }

        }else{
            echo "
            <script>
            alert('Old password not correct');
            window.location.href='./index.php?link=manage';
            </script>
            ";
        }

    }elseif (!empty($image) && !empty($pass)) {
        # code...
        $sql = "UPDATE `users` SET user_name='$uname',email='$email', pswd = '$encript', profile='$new_name' WHERE id='$id'";
        $res = mysqli_query($con, $sql);

        if ($res) {
            # code...
            $move = move_uploaded_file($file_loc, $folder.'/'.$new_name);
            echo $file_loc;
            if ($move) {
                # code...
                echo"
                <script>
                alert('Updated successfull');
                window.location.href='./index.php?link=home';

                </script>
                ";
            }else{
                echo"
                <script>
                alert('not moved');
                </script>
                ";     
            }
        }

    }elseif (!empty($image) && empty($pass)) {
        # code...
        $sql = "UPDATE `users` SET profile='$new_name' WHERE id='$id'";
        $res = mysqli_query($con, $sql);

        if ($res) {
            # code...   
            $move = move_uploaded_file($file_loc, $folder.'/'.$new_name);
            echo $file_loc;
            if ($move) {
                # code...
                echo"
                <script>
                alert('Updated successfull');
                window.location.href='./index.php?link=home';

                </script>
                ";
            }else{
                echo"
                <script>
                alert('Update failed');
                </script>
                ";     
            }
        }

    }
    
    // elseif (!empty($pass)) {
    //     # code...
   
        
    //     if ($rec3 >=1) {
    //         # code...
    //         if ($pass === $rpass) {
    //             # code...
    //             $sql = "UPDATE `users` pswd = '$encript' WHERE id='$id'";
    //             $res = mysqli_query($con, $sql);
    
    //             if ($res) {
    //                 # code...
    //                 echo "
    //                 <script>
    //                 // alert('Password Updated successfully');
    //                 window.location.href='./index.php?link=home';
    //                 </script>
    //                 ";
    //             }
    //         }else {
    //             # code...
    //             echo "
    //             <script>
    //             // alert('Two passwords does not match');
    //             window.location.href='./index.php?link=home';
    //             </script>
    //             ";
    //         }
    //     }else{
    //         echo "
    //         <script>
    //         alert('Old password not correct');
    //         window.location.href='./index.php?link=manage';
    //         </script>
    //         ";
    //     }


    // }
    else {
        # code...
        echo "ths";
        echo "
        <script>
        alert('what else');
        window.location.href='./index.php?link=manage';
        </script>
        ";
    }

    

}
?>


</div>
