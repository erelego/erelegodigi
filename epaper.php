<?php
// echo "ho";
echo $_GET["epaper"];
?>
<!DOCTYPE html>
<html en="us">
<head>
        <meta charset="UTF-8">
        <title>Title of the document</title>
        
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
      <nav class="navbar navbar-default ">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img alt="Brand" src="erelego.png" width="40" height="40" style="margin-top:0px">
          </a>
       </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="">Home</a></li>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Menu 3</a></li>
          </ul>
      </nav>
    
    <div class="container">
        <div class="jumbotron">
 <?php
 $epaper =mysql_real_escape_string($_GET["epaper"]);
ini_set('display_errors', 1);
// if( isset($_POST["datefrom"]) && isset($_POST["dateto"])){
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
         // $date1 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-',($_POST["datefrom"]))));
         // $date2 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', ($_POST["dateto"]))));
     
      $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      mysql_select_db('mydba');
      if(! $conn )
      {
         die('Could not connect : ' . mysql_error());
      }
      
      $sql1 = "SELECT COUNT(*),b.epaperid, b.issueid, b.created_date FROM eg_paper_page_master as a INNER JOIN
              eg_paper_issue_master as b on a.issueid=b.issueid WHERE b.epaperid='$epaper' group by b.issueid";
    
      $retval = mysql_query( $sql1, $conn );
     
       if(! $retval ){
            die('Could not get data: ' . mysql_error());
         }
       
     echo  '<table id="customers" class="table ">
            <tr>
            <th>S.no</th>
            <th>epaperid</th>
            <th>issueid</th>
            <th>PageNo</th> 
        
            </tr>';
    
           $i=1;

          while($row1 = mysql_fetch_array($retval)){ 
        
          
          echo '<tr>'; 
          echo ' <td>'. $i++ .'</td> ';
          echo ' <td>'. $row1['epaperid'] .'</td>';
          echo '<td>'. $row1['issueid'] .'</td>';
          echo  '<td>'. $row1['COUNT(*)'].' </td>';
         
          echo'</tr>';
     
          } 
          echo  '</table>';
  
 ?>

        <div>
    </div>
</body>
</html>
