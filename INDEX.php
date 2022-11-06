<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE.CSS">
    <title>Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">    
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime chat app</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">this</div>
                <div class="name-details">
                    <div class="field input">
                        <label> First Name</label>
                        <input type="text" placeholder="First Name" name = "fname" required>
                    </div>
                    <div class="field input">
                        <label> Last Name</label>
                        <input type="text" placeholder="Last Name" name = "lname" required>
                    </div>
                </div>  

                <div class="field input">
                    <label> Email Address</label>
                    <input type="text" placeholder="Enter Your Email" name = "email" required>
                </div>
                
                    <div class="field input">
                        <label> Password</label>
                        <input type="password" placeholder="Enter New Password" name = "pass" required>
                        <i class="fa-sharp fa-solid fa-eye"></i>
                    </div>
                    <div class="field  image">
                        <label> Select Image</label>
                        <input type="file" name = "image" require>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                      
            </form>
            <div class="link">Already signed Up ? <a href="#">Login Now</a></div>
        </section>
    </div>

    <script src="Javascript/script.js"></script>
</body>
</html>