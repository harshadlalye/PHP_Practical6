/* Q1. Create a databasse "MCA", with table "StudentInfo" 
 add fields as PRN,fname, lname, DOB, Address,City, Pincode, AdmissionYear
 
 1) Insert 5 records
 2) Update pincode for PRN 103
 3) Display information of student where lname is "sharma"
 4) Delete information of student with AdmissionYear is "2007" */
-- Create database "MCA"
CREATE DATABASE MCA;
-- Use database "MCA"
USE MCA;
-- Create table "StudentInfo"
CREATE TABLE StudentInfo (
    PRN INT PRIMARY KEY,
    fname VARCHAR(50),
    lname VARCHAR(50),
    DOB DATE,
    Address VARCHAR(100),
    City VARCHAR(50),
    Pincode INT,
    AdmissionYear YEAR(4)
);
-- Insert 5 records
INSERT INTO StudentInfo (
        PRN,
        fname,
        lname,
        DOB,
        Address,
        City,
        Pincode,
        AdmissionYear
    )
VALUES (
        101,
        'John',
        'Doe',
        '2000-01-01',
        '123 Main St',
        'Anytown',
        12345,
        2005
    ),
    (
        102,
        'Jane',
        'Smith',
        '2001-02-02',
        '456 Elm St',
        'Othertown',
        23456,
        2006
    ),
    (
        103,
        'Amit',
        'Sharma',
        '2002-03-03',
        '789 Maple St',
        'Anothertown',
        34567,
        2007
    ),
    (
        104,
        'Sara',
        'Khan',
        '2003-04-04',
        '321 Oak St',
        'Sometown',
        45678,
        2008
    ),
    (
        105,
        'David',
        'Lee',
        '2004-05-05',
        '654 Pine St',
        'Citytown',
        56789,
        2009
    );
-- Update pincode for PRN 103
UPDATE StudentInfo
SET Pincode = 45678
WHERE PRN = 103;
-- Display information of student where lname is "sharma"
SELECT *
FROM StudentInfo
WHERE lname = 'Sharma';
-- Delete information of student with AdmissionYear is "2007"
DELETE FROM StudentInfo
WHERE AdmissionYear = 2007;