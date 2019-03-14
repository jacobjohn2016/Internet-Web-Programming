<!DOCTYPE html>
<html>
    <?php
        // define variables and set to empty values
        $nameErr = $emailErr = "";
        $name = $email = $address = $fav = $brochure = "";
        
        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed"; 
                    }
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                    }
                }
            }
    ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .error {
            color: #FF0000;
        }

        .form-sample {
            font-family: 'Open Sans Condensed', arial, sans;
            width: 700px;
            padding: 30px;
            background: #FFFFFF;
            margin: 50px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        }

        h2 {
            text-align: center;
            background: #4D4D4D;
            text-transform: uppercase;
            font-family: 'Open Sans Condensed', sans-serif;
            color: #797979;
            font-size: 26px;
            font-weight: 100;
            padding: 20px;
            margin: -30px -30px 30px -30px;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            color: #000000;
            font-size: 22px;
            font-weight: bold;
            font-weight: 100;
            margin: -30px -30px 10px -30px;
        }

        input[type="text"],
        input[type="email"],
        input[type="checkbox"],
        select {
            box-sizing: border-box;
            outline: none;
            display: inline-block;
            width: 60%;
            padding: 7px;
            border: none;
            border-bottom: 1px solid #ddd;
            background: transparent;
            margin-bottom: 10px;
            font: 16px Arial, Helvetica, sans-serif;
            height: 45px;
        }

        input[type="checkbox"] {
            position: float;
        }

        select {
            min-height: 70px;
            max-width: 27%;
            position: float;
            display: inline;
        }

        input[type="radio"] {
            display: inline-block;
            height: 15px;
            position: relative;
            margin-left: 10px;
            margin-right: 5px;
        }

        input[type="radio"].r1 {
            margin-left: 203px;
            margin-right: 5px;
        }

        textarea {
            resize: none;
            overflow: hidden;
        }

        p {
            font: 16px Arial, Helvetica, sans-serif;
            display: inline-block;
            margin: 0 20px;
        }

        p.f1 {
            width: 100px;
        }

        p.f2 {
            width: 150px;
            position: relative;

        }

        p.f3 {
            width: 150px;
            margin: -20px 25px 20px 20px;
            position: relative;
        }

        input[type="button"],
        input[type="submit"] {
            box-shadow: inset 0px 1px 0px 0px #45D6D6;
            background-color: #2CBBBB;
            border: 1px solid #27A0A0;
            display: block;
            cursor: pointer;
            color: #FFFFFF;
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 14px;
            padding: 8px 18px 10px 20px;
            margin-left: 300px;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            background: linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
            background-color: #34CACA;
        }
    </style>
    <script>
        function validate(){
        var reg = /[A-Za-z]{5,15}/i;
        var reg3 = /.+@.+\..+/i;
        if(document.forms["myForm"]["name"].value == "")
        {
            alert("Name must be filled out");
            document.forms["myForm"]["name"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if(document.forms["myForm"]["address"].value == "")
        {
            alert("Address must be filled out");
            document.forms["myForm"]["address"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if(document.forms["myForm"]["email"].value == "")
        {
            alert("E-mail must be filled out");
            document.forms["myForm"]["email"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if(document.forms["myForm"]["fruit-no"].value == "")
        {
            alert("Please select how many fruits do you eat per day");
            document.getElementById("fpd").style.textColor = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if(reg.test(document.forms["myForm"]["name"].value) != 1){
            alert("Name can only be 5 - 15 alphabetical characters");
            document.forms["myForm"]["name"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if((document.forms["myForm"]["address"].value).length < 5 || (document.forms["myForm"]["address"].value).length > 40){
            document.forms["myForm"]["name"].style.borderBottom = "2px solid rgb(56, 209, 56)";
            alert("Address can only be 5 - 40 characters");
            document.forms["myForm"]["address"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        else if(reg3.test(document.forms["myForm"]["email"].value) != 1){
            document.forms["myForm"]["name"].style.borderBottom = "2px solid rgb(56, 209, 56)";
            document.forms["myForm"]["address"].style.borderBottom = "2px solid rgb(56, 209, 56)";
            alert("Please check the format of your e-mail");
            document.forms["myForm"]["email"].style.borderBottom = "2px solid rgb(255, 51, 0)";
            return false;
        }
        document.forms["myForm"]["name"].style.borderBottom = "2px solid rgb(56, 209, 56)";
        document.forms["myForm"]["address"].style.borderBottom = "2px solid rgb(56, 209, 56)";
        document.forms["myForm"]["email"].style.borderBottom = "2px solid rgb(56, 209, 56)";
    }

</script>

    <head>
        <title>
            CAT Exam with CSS
        </title>
    </head>

    <body>
        <div class="form-sample">
            <h2>Registration form</h2>
            <form name="myForm" onsubmit="return validate()" action="insert.php" method="POST">
                <p>Name</p> <input type="text" name="name" placeholder="John Doe"><br>
                <p>E-mail</p> <input type="text" name="email" placeholder="john@doe.com"><br>
                <p>DOB</p><input type = "date" name="birth"><br>
                <p>Password</p> <input type="password" name="pass"><br>
                <p>Gender</p>
                <input type = "radio" name="gender" value = "m"><p>Male</p>
                <input type = "radio" name="gender" value="f"><p>Female</p>
                <input type = "radio" name="gender" value="u"><p>Unknown</p>
                <p>Country</p>
                <select name = "country">
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="China">China</option>
                </select><br>
                <p>Meal Preference?</p>
                <input type ="checkbox" name="pref1" value="LowCal">Low Calorie<br>
                <input type = "checkbox" name="pref2" value="LowSalt">Low Salt<br>
                <input type ="submit" name="submit">
            </form>
        </div>
    </body>

</html>