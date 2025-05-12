CREATE TABLE Form_Data (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Staff_Name VARCHAR(70) NOT NULL,
    Staff_Email VARCHAR(80) NOT NULL,
    Issue_Location VARCHAR(100) NOT NULL,
    Issue_Description VARCHAR(500) NOT NULL,
    Priority_Level INT,
    Job_Status VARCHAR(200) DEFAULT ('Incomplete')

);


CREATE TABLE Staff_User_Auth (
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    Staff_User_Name VARCHAR(255) NOT NULL,
    Staff_Password VARCHAR(300) NOT NULL
);

CREATE TABLE Tech_User_Auth (
    Tech_User_ID INT AUTO_INCREMENT PRIMARY KEY,
    Tech_User_Name VARCHAR(255) NOT NULL,
    Tech_Password VARCHAR(300) NOT NULL
);

INSERT INTO Staff_User_Auth (Staff_User_Name, Staff_Password)
VALUES ('staffmember', SHA2('letmein!123', 256));

INSERT INTO Tech_User_Auth (Tech_User_Name, Tech_Password)
VALUES ('admin', SHA2('heretohelp!456', 256));

