<?php
   include_once "confg.php";
   $fname = mysqli_real_eacape_string($conn, $_POST['fname']);
   $lname = mysqli_real_eacape_string($conn, $_POST['lname']);
   $email = mysqli_real_eacape_string($conn, $_POST['email']);
   $password = mysqli_real_eacape_string($conn, $_POST['pass']);


   if(!empty($fname) && !empty ($lname) && !empty($email) && !empty($password)){

    // email verifaction
    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        // check email validity
        $sql = mysqli_query($conn , "SELECT email FROM users WHERE email= '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - already exits";
        } else{
            // check user upload file or not
            if(isset($_FILES['image'])){  // if file is uploaded
              $img_name = $_FILES['image']['name']; // getting user uploaded image name
              
              $tem_name = $_FILES['image']['tmp_name']; // this temp name used to save the file


              // let's explode the image and get the last extension like .jpg 
              $img_explode = explode('.',$img_name);
              $img_ext = end($img_explode); // here we get the uploaded image extension


              $extension = ['png','jpg','jpeg']; // this is the extension we have store in array
              if(in_array($img_ext, $extension) === true){  // if users uploaded image matches with any array extension
                  $time = time(); // this will return us current time 
                                  // we all need ths time because when uploaded image to our folder and rename it to current time 
                                  // so all file name are unique

                // lets move this user uploaded image to folder
                $new_img_name = $time.$img_name;
                
                if( move_uploaded_file($tem_name , "image/" .$new_img_name)){ // if user uploaded image move to our folder successfully
                     
                  $status = "Active Now "; // user once signup then his status will be active now
                  $random_id = rand(time(), 10000000); // creating rendom id for user

                  // insert user data into table 

                  $sql2 = mysqli_query($conn,"INSERT INTO users( unique_id,fname , lname , email , password , image	,status	)
                                       VALUES({$random_id}, '{$fname}', '{$lname}' , '{$email} , '{$password}' , '{$new_img_name}' , '{$status}')");

                                       if($sql2){
                                        $sql3 = mysqli_query($conn , "SELECT * FROM users WHERS email = '{$email}'");
                                        if(mysqli_num_rows($sql3) > 0){
                                              $rows = mysqli_fetch_assoc($sql3);
                                              $_SESSION['unique_id'] = $rows['unique_id']; // using this function we use user unique id in others php files
                                              echo "success";
                                        }   
                                        
                                       } else{
                                          echo "SomeThing Went Wrong !";
                                       }
                }

              } else {
                echo "Please select an image file-- .jpg , .png , .jpeg !";
              }
            } else {
                echo "please upload the image file";
            }
        }
    } else{
        echo "$email- this is not valid mail";
    }

   } else{
    echo "all field are required";
   }
?>