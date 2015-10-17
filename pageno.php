<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Title of the document</title>
        
         <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme-->
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
ob_start();
ini_set('display_errors', 1);
if( isset($_POST["datefrom"]) && isset($_POST["dateto"])){
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
         $date1 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-',($_POST["datefrom"]))));
         $date2 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', ($_POST["dateto"]))));
     
      $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      mysql_select_db('mydba');
      if(! $conn )
      {
         die('Could not connect : ' . mysql_error());
      }
      
      $sql = "SELECT COUNT( * ), b.epaperid as epaper_id FROM eg_paper_page_master as a inner join eg_paper_issue_master as b on a.issueid=b.issueid
          where b.created_date BETWEEN '$date1' AND '$date2' GROUP BY epaperid";
    
      $retval = mysql_query( $sql, $conn );
      
       if(! $retval ){
            die('Could not get data: ' . mysql_error());
         }
     echo '<div id="dvData">
         <table id="customers" class="table table-bordered" id="dvData">
         <tr>
            <th>S.no</th>
            <th>E-PaperId</th>
            <th>PageNo</th> 
         </tr>';
    
         $i=1;
         while($row = mysql_fetch_array($retval)){ 
        
       echo '<tr> 
         <td>'. $i++ .'</td> 
         <td><a href="epaper.php?epaper='.$row['epaper_id'].'">'. $row['epaper_id'] .'</a></td>
         <td>'. $row['COUNT( * )'].' </td>
         </tr>';
     
         } 
      echo  '</table>';
      echo  '</div>';
      // if(isset($_GET('excel'))){
      //   header("Content-Type: application/vnd.ms-excel");
      //   $file="demo.xls";

      //   header("Content-type: application/vnd.ms-excel");
      //   header("Content-Disposition: attachment; filename=$file");
      //   echo $test;
      // }
 ob_end_flush();
 } 
 ?>

        <div>
    </div>
    <form action="">
    <input type="button" id="btnExport" value=" Export Table data into Excel " class="btn btn-info" name="excel" />
    </form>
     <script>
    //      $("#btnExport").click(function(e) {
    //             window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
    //             e.preventDefault();
    //             });
    </script>
</body>
</html>
