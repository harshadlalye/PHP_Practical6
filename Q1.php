<?php
// Database connection settings
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "MCA";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE MCA";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Select database
$conn->select_db($dbname);

// Create table
$sql = "CREATE TABLE StudentInfo (
    PRN INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    DOB DATE,
    Address VARCHAR(50),
    City VARCHAR(30),
    Pincode INT(6),
    AdmissionYear YEAR(4)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table StudentInfo created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert 5 records
$sql = "INSERT INTO StudentInfo (fname, lname, DOB, Address, City, Pincode, AdmissionYear) 
VALUES ('John', 'Doe', '1995-03-10', '123 Main St', 'New York', 10001, 2020),
       ('Jane', 'Smith', '1996-05-15', '456 Park Ave', 'Los Angeles', 90001, 2020),
       ('Mark', 'Johnson', '1994-02-28', '789 Broadway', 'Chicago', 60601, 2021),
       ('Samantha', 'Sharma', '1997-07-18', '321 Elm St', 'San Francisco', 94101, 2021),
       ('Alex', 'Lee', '1993-12-01', '654 Oak St', 'Boston', 02101, 2022)";
if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully\n";
} else {
    echo "Error inserting records: " . $conn->error . "\n";
}

// Update pincode for PRN 103
$sql = "UPDATE StudentInfo SET Pincode=90210 WHERE PRN=103";
if ($conn->query($sql) === TRUE) {
    echo "Pincode updated successfully\n";
} else {
    echo "Error updating pincode: " . $conn->error . "\n";
}

// Display information of student where lname is "Sharma"
$sql = "SELECT * FROM StudentInfo WHERE lname='Sharma'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "PRN: " . $row["PRN"] . " - Name: " . $row["fname"] . " " . $row["lname"] . " - DOB: " . $row["DOB"] . " - Address: " . $row["Address"] . " - City: " . $row["City"] . " - Pincode: " . $row["Pincode"] . " - Admission Year: " . $row["AdmissionYear"] . "\n";
    }
} else {
    echo "0 results\n";
}

// Delete information of student with AdmissionYear is "2007"
$sql = "DELETE FROM StudentInfo WHERE AdmissionYear='2007'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully\n";
} else {
    echo "Error deleting record: " . $conn->error . "\n";
}

// Close connection
$conn->close();
?>