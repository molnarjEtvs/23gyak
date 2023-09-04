<?php
session_start();
$host = "localhost";
$userName = "root";
$passWord = "";
$dbName = "23gyak";
$con = mysqli_connect($host,$userName,$passWord,$dbName);
if(mysqli_connect_errno()){
    echo "Adatbázis kapcsolódás sikertelen, hiba oka: ".mysqli_connect_error();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hírlevél feliratkozás</title>
     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>
<?php
/*
$a = 2;

if($a == 1){
    echo "Alma";
}else if($a == 2){
    echo "Kettő";
}else{
    echo "Barack";
}


switch($a){
    case '1':
        echo "1";
    break;

    case '2':
        echo "2";
    break;

    default:
        echo "minden más ami a többi nem";
    break;
}

while($a<100){
    $a++;
    echo "<h1>Ciklus</h1>";
}

for($b=1;$b<=100;$b++){
 echo "<h2>Címsor 2</h2>";
}*/

$users[0] = ["nev" => "Béla",
             "kor" => 16];
$users[1] = ["nev" => "Kata",
            "kor" => 20];
$users[2] = ["nev" => "Sanyi",
            "kor" => 32];


//print_r($users);
//echo $users[0]['nev'];
foreach($users as $user){
    //echo $user['nev']."<br>";
}

//$_SESSION['nev'] = "Katalin";
if($_POST){
    $nev = $_POST['nev'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `feliratkozok`(`nev`, `email`, `rogzites_ideje`) VALUES ('".$email."','".$nev."','".date('Y-m-d H:i:s')."');";
    //echo $sql;
    if(mysqli_query($con,$sql)){
        //echo "Adatok rögzítése sikeres";
        $_SESSION['valasz'] = "Adatok rögzítése sikeres";
        header("Location: /23gyak/");
        exit();
    }else{
        echo "HIBA: ".mysqli_error($con);
    }
}

if(isset($_SESSION['valasz'])){
    echo $_SESSION['valasz'];
    unset($_SESSION['valasz']);
}

?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="bg-info p-3">
                <h1>Iratkozz fel hírlevelünkre!</h1>
                <form method="POST">
                    <div>
                        <label for="nev">Név</label>
                        <input type="text" name="nev" id="nev" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="email">E-mail cím:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn bg-danger w-100 text-white">Feliratkozom</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php
 $lekerdezesSql = "SELECT * FROM feliratkozok WHERE 1 ORDER BY fel_id DESC LIMIT 100;";
 $eredmeny = mysqli_query($con,$lekerdezesSql);
?>

<div class="container">
    <table class="table table-info table-striped table-hover table-sm">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>E-mail</th>
            <th>Rögzítés dátuma</th>
        </tr>
        <?php
         if(mysqli_num_rows($eredmeny)>0){
            while($sor = mysqli_fetch_assoc($eredmeny)){
                echo "<tr>
                    <td>".$sor['fel_id']."</td>
                    <td>".$sor['nev']."</td>
                    <td>".$sor['email']."</td>
                    <td>".$sor['rogzites_ideje']."</td>
                </tr>";
            }
         }
        ?>
        
    </table>
</div>
    

</body>
</html>
<?php
    mysqli_close($con);
?>