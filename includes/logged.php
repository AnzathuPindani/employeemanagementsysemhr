<?php
    include '../includes/dbconn.php';
    
    $eid=$_SESSION['eid'];
    $sql = "SELECT FirstName,LastName,EmpId,image from  tblemployees where id=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;

    if($query->rowCount() > 0){
        foreach($results as $result)
    {    ?>
     <img src=<?php echo htmlentities('../images/'.$result->image)?> alt=<?php echo htmlentities($result->image)?> width="50px" height="50px" style="border-radius:50%"/>
        <p style="color:white;"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></p>
        <span><?php echo htmlentities($result->EmpId)?></span>
   
<?php }
    } 
?>