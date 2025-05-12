<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Requests</title>
    <link rel="icon" href="../images/School-logo.png">
    <link rel="stylesheet" href= "../css/normalize.css">
    <link rel="stylesheet" href="../css/tech_requests_style.css">

</head>

<!-- above uniformity of the pages has been kept with the same tab favicon in the link rel = icon line. Alongside this normalise css has been used to reset any default stylings of the browser -->
<!-- the styling itself is linked in an external css file on the last line of the code block -->

<body>

<!-- firstly creation of the generic bar header with the school logo and any necessary nav elements  and then a seperate block containing the tile of the page itself -->

    <header>
        
        <img src="../images/School-logo.png" alt="Wearview Academy school logo" id="logo" height="150px" width="150px">
    
        <nav>
            <a href = "https://24m74bi64oi.uoswebspace.co.uk/BI64OI_AT2/html/login.html" id="logout">Logout</a>
        </nav>
    
    </header>
    
    <div id="box">
        <h1 id="title"><strong>Technician IT Requests</strong></h1>
    </div>


    <div id="container">    

        
    
        <?php
            
        #for ease of assembly with this page and legibility the entire page will be created within this one file containing both the html and php. However database connection will still be established through an external file for security purposes. In future designs I would aim to seperate the two files. 

        $mysqli = require __DIR__. "/database.php";
        set_error_handler("customErrorHandler");


        # creating the sql query that will display the form data in a table within the html page tech request 
            
        # a href button also needs to be added that will allow later functionallity of updating jobs where necessary this is linked to an external php page where the prepared statement for the sql query to update jobs in the database is provided
            
        # I have inserted id's into some of the echos of the table tag and the td tags in order to allow for selection within the css styling sheet
             
        $sql = "SELECT * FROM Form_Data ORDER BY CASE WHEN Job_Status = 'Incomplete' THEN 1 ELSE 2 END";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
            
        # above the sql statement is prepared in this case there is no need to bind parameters as there is no user input needed this is just a basic select all statement with CASE logic applied to sort the rows based upon the job status value 
        
        # the ORDER BY CASE in the query can be looked at as an if else similar to other logic encountered and used throughout the project. If Job_Status is incomplete these results will be displayed first as 1 is a lower number than 2 assigned to the complete status. 

        # Using the get result method on the stmt object allows retrieval of the entire result set. This result set in this case all rows contained in the form data table are there stored in a result variable. 

        if($result->num_rows > 0 ) {
        
            echo "<table id = request_table>";
            echo "<th>ID</th>";
            echo "<th>Staff Name</th>";
            echo "<th>Staff Email</th>";
            echo "<th>Issue Location</th>";
            echo "<th>Issue Description</th>";
            echo "<th>Priority (1-5)</th>";
            echo "<th>Job Status</th>";
            echo "<th>Update</th>";
                
            while ($row = $result->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>"; 
                    echo "<td>" . $row['Staff_Name'] . "</td>";
                    echo "<td>" . $row['Staff_Email'] . "</td>";
                    echo "<td>" . $row['Issue_Location'] . "</td>";
                    echo "<td id ='description'>" . $row['Issue_Description'] . "</td>";
                    echo "<td>" . $row['Priority_Level'] . "</td>";
                    echo "<td>" . $row['Job_Status'] . "</td>";
                    echo "<td id = 'complete'>" . "<a href = './job_status_update.php?ID=" . $row["ID"] ."'>Complete</a>";
                    echo "</tr>";
                    
                }
                echo "</table>";
            }
        $mysqli->close();
        # above ,firstly the if conditional checks the number of rows is greater than 0 this is achieved by calling the num_rows method on the result object 

        # this is then responsible for echo the  the table opening tag, table headers, and closing tag outside of the while loop.

        # we then intiate a while loop within the if statement so while number of rows is greater than zero we fetch the assoc row as individual arrays assigning this to a row variable. 
        
        # This will iterate over every row in the result set until it has done all of the rows 

        # the column names then act as our index which can be called upon to specify where we want the associated data to be displayed within each row
        
        # the indexes are then called within the table data tags so each rows data will be displayed 

        # the last td contains a href that allows jobs to be marked as complete using an external php file containing a prepared statement this row has an id assigned to it in order to call upon in it  in the css file so the hover animations can be applied 

        # remember to ensure table closing tags are outside of the while loop to avoid issues displaying data 
        
        # the extra text within the href '?ID=" signifies that a parameter is being passed to the url we then specify which parameter with $row["ID"] this is the ID of the current row 

        #passing this value allows us to retrieve it within our php script using a GET method 

        

            
        ?>
            
            
    </div>       
   
</body>

</html>




