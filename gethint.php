<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

//$hint = "";
$con = mysqli_connect('localhost', 'root', '', 'qrs');
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q != "") {
    /* $q = strtolower($q);
      $len=strlen($q);
      foreach($a as $name) {
      if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
      $hint = $name;
      } else {
      $hint .= ", $name";
      }
      }
      } */
    $result = mysqli_query($con, "SELECT * FROM logs WHERE name='$q'");
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $ret = mysqli_query($con, "INSERT INTO `logs`(name,Time) VALUES ('$q',NOW())");
        if ($ret) {
            echo '<div class="alert alert-success"><strong>Success!</strong> matric number successfully extracted</div>' + date('l jS \of F Y h:i:s A');
            ?>
            <?php
        } else {
            
        }
    } else {
//echo 'employee is already registered';  
        echo '<div class="alert alert-success"><strong>Success!</strong>Matric number successfully extracted</div>';
        echo date('l jS \of F Y h:i:s A');
    }
}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>