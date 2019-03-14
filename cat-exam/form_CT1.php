<!DOCTYPE html>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<style type="text/css">
    table {
        font-family: 'Open Sans Condensed', arial, sans;
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
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
        //take form data as input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $date = $_POST['birth'];

    echo '<br><table border="0" cellspacing="2" cellpadding="2"> 
            <tr> 
                <th>Name</th> 
                <th>Email</th> 
                <th>Gender</th> 
                <th>Country</th> 
                <th>DOB</th>
            </tr>';
    
    $myfile = fopen("newfile.txt", "a+");
    $txt = file_get_contents("newfile.txt");
    fclose($myfile);
    $txt .= '<tr> 
                  <td>' . $name . '</td> 
                  <td>' . $email . '</td> 
                  <td>' . $gender . '</td> 
                  <td>' . $country . '</td> 
                  <td>' . $date . '</td> 
              </tr>';
    echo $txt;
    $myfile = fopen("newfile.txt", "w");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo '</table>';


    ?>
</body>

</html> 