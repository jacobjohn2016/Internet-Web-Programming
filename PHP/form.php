<!DOCTYPE html>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<style type="text/css">
    table {
        font-family: 'Open Sans Condensed', arial, sans;
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){
        background-color: #f2f2f2
    }

    th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<html>
    <body>
    <?php
        $user = "root";
        $pass = "Password";
        $database = "FormActivity";
        $conn = new mysqli("localhost",$user, $pass, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connected successfully <br>";

        //take form data as input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $nfruits = $_POST['fruit-no'];
        $fav = $_POST['favorite'];
        $brochure = $_POST['brochure'];  

        $q = "INSERT INTO FruitData (name, email, address, nfruits, fav, brochure) VALUES('$name','$email','$address','$nfruits','$fav','$brochure')";
        if ($conn->query($q) === TRUE) {
            echo "<br>New record created successfully";
        } else {
            echo "Error: " . $q . "<br>" . $conn    ->error;
        }
        
        echo '<br><table border="0" cellspacing="2" cellpadding="2"> 
            <tr> 
                <th>Name</th> 
                <th>Email</th> 
                <th>Address</th> 
                <th>Fruit No.</th> 
                <th>Favorite</th> 
                <th>Brochure</th>
            </tr>';  

        $q = "SELECT * FROM FruitData";
        $result = $conn->query($q); 
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
            $nfruits = $row['nfruits'];
            $fav = $row['fav'];
            $brochure = $row['brochure']; 
                
            echo '<tr> 
                    <td>'.$name.'</td> 
                    <td>'.$email.'</td> 
                    <td>'.$address.'</td> 
                    <td>'.$nfruits.'</td> 
                    <td>'.$fav.'</td> 
                    <td>'.$brochure.'</td>
                </tr>';
            }
            echo '</table>';
        }     
        //closing connection
        mysqli_close($conn);
        echo "<br>Connection closed";
    ?>
    </body>
</html>
