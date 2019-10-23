<?php

//Message variables
$msgClass='';
$msg = '';


if (filter_has_var(INPUT_POST, 'submit')) {
    //Pressed submit
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        //All fields have text
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg="Email is not a valid address";
            $msgClass="alert-danger";
        }
        else{
            //EMAIL VALIDATION SUCCEDED
            $msg="VALIDATION SUCCEDED";
            $msgClass="alert-success";
            
        }

    } else {
        //Some fields are empty
        $msg = "Please fill in all the required fields";
        $msgClass = "alert-danger";
    }
} else {
    echo '';
    //NOT PRESSED SUBMIT
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <header>

    </header>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Form</span>
    </nav>
    </header>

    <div class="container">
        <div class="form">
            <h2>Form Fill in</h2>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Message:</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>

            <input type="submit" name="submit" class="btn btn-danger">

        </form>
        <?php if ($msg != '') : ?>
            <div class="alert <?php echo $msgClass; ?>">
                <p><?php echo $msg; ?></p>
            <?php endif; ?>
            </div>

    </div>



</body>

</html>