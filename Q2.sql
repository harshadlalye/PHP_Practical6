/* Q2. Create a database " MCA" with table "faculty_master"
 add information of faculty as Faculty_Id( Primary Key), Name, Designation,course, AcademicYear
 Create another table "course" with information as course, class, subject, Faculty_Id, AcademicYear.
 
 1) Insert 7 records in Faculty table
 2) Insert 10 records in course tale
 3) Display information of subject where Faculty_Id is 200301
 4) Display all faculty for class BSC-II */
-- Create database "MCA"
CREATE DATABASE MCA;
-- Use database "MCA"
USE MCA;
-- Create table "faculty_master"
CREATE TABLE faculty_master (
    Faculty_Id INT PRIMARY KEY,
    Name VARCHAR(50),
    Designation VARCHAR(50),
    course VARCHAR(50),
    AcademicYear YEAR(4)
);
-- Create table "course"
CREATE TABLE course (
    course VARCHAR(50),
    class VARCHAR(50),
    subject VARCHAR(50),
    Faculty_Id INT,
    AcademicYear YEAR(4),
    FOREIGN KEY (Faculty_Id) REFERENCES faculty_master(Faculty_Id)
);
-- Insert 7 records in "faculty_master" table
INSERT INTO faculty_master (
        Faculty_Id,
        Name,
        Designation,
        course,
        AcademicYear
    )
VALUES (200301, 'John Doe', 'Professor', 'BSC', 2022),
    (
        200302,
        'Jane Smith',
        'Associate Professor',
        'MCA',
        2022
    ),
    (
        200303,
        'Amit Sharma',
        'Assistant Professor',
        'BBA',
        2021
    ),
    (200304, 'Sara Khan', 'Professor', 'MBA', 2023),
    (
        200305,
        'David Lee',
        'Associate Professor',
        'BSC',
        2022
    ),
    (
        200306,
        'Sonia Gupta',
        'Assistant Professor',
        'MCA',
        2023
    ),
    (200307, 'Kiran Patel', 'Professor', 'BBA', 2021);
-- Insert 10 records in "course" table
INSERT INTO course (course, class, subject, Faculty_Id, AcademicYear)
VALUES ('BSC', 'BSC-I', 'Mathematics', 200301, 2022),
    ('BSC', 'BSC-I', 'Physics', 200301, 2022),
    ('BSC', 'BSC-I', 'Chemistry', 200305, 2022),
    ('BSC', 'BSC-II', 'Botany', 200301, 2022),
    ('BSC', 'BSC-II', 'Zoology', 200305, 2022),
    ('MCA', 'MCA-I', 'Programming', 200302, 2022),
    (
        'MCA',
        'MCA-I',
        'Database Management',
        200306,
        2023
    ),
    ('MCA', 'MCA-II', 'Web Development', 200302, 2022),
    ('MBA', 'MBA-I', 'Marketing', 200304, 2023),
    ('MBA', 'MBA-II', 'Finance', 200304, 2023);
-- Display information of "subject" where "Faculty_Id" is 200301
SELECT subject
FROM course
WHERE Faculty_Id = 200301;
-- Display all "faculty" for "class" BSC-II
SELECT f.Name,
    f.Designation,
    f.course,
    f.AcademicYear
FROM faculty_master f
    INNER JOIN course c ON f.Faculty_Id = c.Faculty_Id
WHERE c.class = 'BSC-II';