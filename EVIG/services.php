<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/services.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="../EVIG/Admin/aCss/search.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" />

    <title>Document</title>
</head>

<body>
    <?php include "./includes/nav.php"; ?>
    <br>
    <br>
    <br>
    <center>
        <h2>Search</h2>
    </center>
    <form class="example" action="services.php" method="post" style="margin:auto;max-width:300px">
        <input name="search" type="text" placeholder="Search.." name="search2">
        <button name="submit" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <br>
    <br>
    <br>

        <div id="cardbox" class="boxx">
        <?php
            $query = "select * from constructor";
            $select_constructor_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_constructor_query)) {

                $name = $row['firstname'];
                $location = $row['address'];
                $role = $row['fileds'];
                $cover = $row['cover_img'];
                            ?> 
                <div class="feature-box">
        
                    <div class="feature-img">
                       <figure><a href='hire_info.php?pass=<?php echo $name?>'><img src="./image/<?php echo $cover; ?>"</a></figure>
                    </div>
                    <div class="feature-details">
                        <h4><?php echo $name ?></h4>
                        <div>
                            <span><i class="fa fa-map-marker"></i><?php echo $location ?></span>
                            <span><i class="fas fa-hard-hat"></i> <?php echo $role ?></span>
                        </div>
                    </div>
                   
                </div>
                <?php } ?>
        </div>



    <br>
</body>

</html>