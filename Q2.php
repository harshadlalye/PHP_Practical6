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

// Create faculty_master table
$sql = "CREATE TABLE faculty_master (
    Faculty_Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    Designation VARCHAR(30) NOT NULL,
    Course VARCHAR(30),
    AcademicYear YEAR(4)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table faculty_master created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create course table
$sql = "CREATE TABLE course (
    Course VARCHAR(30),
    Class VARCHAR(10),
    Subject VARCHAR(50),
    Faculty_Id INT(6) UNSIGNED,
    AcademicYear YEAR(4),
    FOREIGN KEY (Faculty_Id) REFERENCES faculty_master(Faculty_Id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table course created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert 7 records in faculty_master table
$sql = "INSERT INTO faculty_master (Name, Designation, Course, AcademicYear) 
VALUES ('John Doe', 'Professor', 'BSC', 2020),
       ('Jane Smith', 'Associate Professor', 'BCA', 2020),
       ('Mark Johnson', 'Professor', 'MCA', 2021),
       ('Samantha Sharma', 'Assistant Professor', 'BSC', 2021),
       ('Alex Lee', 'Associate Professor', 'MCA', 2022),
       ('David Williams', 'Professor', 'BCA', 2022),
       ('Sarah Brown', 'Assistant Professor', 'MCA', 2023)";
if ($conn->query($sql) === TRUE) {
    echo "Records inserted into faculty_master table successfully\n";
} else {
    echo "Error inserting records: " . $conn->error . "\n";
}

// Insert 10 records in course table
$sql = "INSERT INTO course (Course, Class, Subject, Faculty_Id, AcademicYear) 
VALUES ('BSC', 'BSC-I', 'Mathematics', 200101, 2020),
       ('BSC', 'BSC-I', 'Physics', 200101, 2020),
       ('BSC', 'BSC-I', 'Chemistry', 200102, 2020),
       ('BSC', 'BSC-II', 'Mathematics', 200201, 2021),
       ('BSC', 'BSC-II', 'Physics', 200201, 2021),
       ('BSC', 'BSC-II', 'Chemistry', 200202, 2021),
       ('MCA', 'MCA-I', 'Database Management Systems', 200301, 2022),
       ('MCA', 'MCA-I', 'Software Engineering', 200301, 2022),
       ('MCA', 'MCA-II', 'Data Mining', 200401, 2023),
       ('MCA', 'MCA-II', 'Web Technologies', 200401, 2023)";
if ($conn->query($sql) === TRUE) {
    echo "Records inserted into course table successfully\n";
} else {
    echo "Error inserting records: " . $conn->error . "\n";
}

// Display information of subject where Faculty_Id is 200301
$sql = "SELECT Subject FROM course WHERE Faculty_Id = 200301";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Subjects taught by Faculty_Id 200301:\n";
    while ($row = $result->fetch_assoc()) {
        echo $row["Subject"] . "\n";
    }
} else {
    echo "No subjects found\n";
}

// Display all faculty for class BSC-II
$sql = "SELECT * FROM faculty_master WHERE Course = 'BSC' AND AcademicYear = 2021";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Faculty teaching BSC-II in Academic Year 2021:\n";
    while ($row = $result->fetch_assoc()) {
        echo "Faculty_Id: " . $row["Faculty_Id"] . " | Name: " . $row["Name"] . " | Designation: " . $row["Designation"] . "\n";
    }
} else {
    echo "No faculty found\n";
}

// Close database connection
$conn->close();
?>