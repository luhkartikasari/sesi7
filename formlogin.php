<?php
    include_once("konfigurasi.php");

    $psn ="";
    if (isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pwd = $_POST["txPASS"];
        
        echo "DEBUG: username: " . $user;
        echo " Password: ".$pwd ;

        $sql = "SELECT tu.name, tu.email, tu.passkey, yu.iduser FROM `tbuser` tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Gagal koneksi ke dbms");
        $hasil = mysqli_query($cnn, $sql);
        $jdata = mysqli_num_rows($hasil);
        //echo "DEBUG: jdata=>".$jdata;
        if($jdata > 0 ){
            $h = mysqli_fetch_assoc($hasil);

            //echo "DEBUG: <br>Nama: ".$h["passkey"];
            if(md5($pwd) == $h["paskey"]){
                echo "DEBUG: password sama";
            }else{
                $psn = "Akses Ditolak"; 
        }
    }else{
        $psn = "Akses Ditolak";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form action="formlogin.php" method="POST">

    <div>
        Username
        <input type="text" name="txUSER">
    </div><br>

    <div>
        Password
        <input type="text" name="txPASS">
    </div><br>

    <div>
    <button type="submit">Login</button>  
    <button type="submit">Registrasi</button><br>
    </div><br>
    
</body>
</html>
