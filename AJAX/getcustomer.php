<?php
$mysqli = new mysqli("localhost", "root", "MyNewPass", "FormActivity");
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT name, address, email, nfruits, fav FROM fruitdata WHERE name = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $address, $email, $nfruits, $fav);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Name</th>";
echo "<td>" . $_GET['q'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Address</th>";
echo "<td>" . $address . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Email</th>";
echo "<td>" . $email . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>No. of fruits</th>";
echo "<td>" . $nfruits . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Favorite fruit</th>";
echo "<td>" . $fav . "</td>";
echo "</tr>";
echo "</table>";
?>