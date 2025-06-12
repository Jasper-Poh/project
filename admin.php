<!DOCTYPE html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistics</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<body>
    <span class="limitedOffer" onclick="location.href='index.html';" style="cursor: pointer;">Back</span>
<table>
    <tr>
        <th>#</th>
        <th>Store Name</th>
        <th>Address</th>
        <th>Phone number</th>
        <th>Date</th>
        <th>Month</th>
        <th>Year</th>
    </tr>
    <?php
    $conn = new mysqli("localhost:3306", "root", "", "myform");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT shopName, address, phoneNumber, date, month, year FROM myform";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $serialNumber = 1;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $serialNumber . "</td>";
            echo "<td>" . $row["shopName"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phoneNumber"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["month"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "</tr>";
            $serialNumber++;
        }
    } else {
        echo "<tr><td colspan='7'>No store found.</td></tr>";
    }

    $conn->close();
    ?>
</table>
</body>