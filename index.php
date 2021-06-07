<!-- Code by Brave Coder - https://youtube.com/BraveCoder/ -->
<?php
    function remove_numbers($string) {
        $numbers = array(0,1,2,3,4,5,6,7,8,9);
        return str_replace($numbers, null, $string);
    }

    if (isset($_POST["submit"])) {
        $country = $_POST["country"];
        $gender = $_POST["gender"];

        $file = file_get_contents("https://api.namefake.com/{$country}/{$gender}");
        $row = json_decode($file, true);

        $final_gender = remove_numbers($row["pict"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Fake information generator PHP</title>
</head>
<body>
    
    <div class="container wrapper">
        <h2 class="text-center mb-3 mt-2">Fake information generator</h2>

        <form action="" method="post" class="form shadow p-4 my-2">
            <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <select class="form-select" name="country" id="country">
                    <option value="random">Random</option>
                    <option value="english-united-states">United States</option>
                    <option value="english-united-kingdom">United Kingdom</option>
                    <option value="persian_Iran">Iran</option>
                    <option value="japanese-japan">Japan</option>
                    <option value="chinese-china">China</option>
                    <option value="italian-italy">Italy</option>
                    <option value="bengali-bangladesh">Bangladesh</option>
                    <option value="nepali-nepal">Nepal</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option value="random" selected>Random</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Generate</button>
        </form>

        <?php if (isset($_POST["submit"])): ?>
        <div class="content shadow p-4 my-4">
            <h3><?php echo $row["name"]; ?></h3>
            <p><?php echo $row["address"]; ?></p>
            <div class="d-flex">
                <b>Gender:</b> <p style="text-transform: capitalize;"><?php echo $final_gender; ?></p>
            </div>
            <div class="d-flex">
                <b>Mother's name:</b> <p><?php echo $row["maiden_name"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Date of birth:</b> <p><?php echo $row["birth_data"]; ?></p>
            </div>
            <div class="flex">
                <b>Home phone:</b> <p><?php echo $row["phone_h"]; ?></p>
            </div>
            <div class="flex">
                <b>Work phone:</b> <p><?php echo $row["phone_w"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Email Address:</b> <p><?php echo $row["email_u"]."@".$row["email_d"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Website:</b> <p><?php echo $row["domain"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Company:</b> <p><?php echo $row["company"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Blood type:</b> <p><?php echo $row["blood"]; ?></p>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>