<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'db_dumkal_new';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
   $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT particular FROM td_fee_collection WHERE particular LIKE '%".$searchTerm."%' ORDER BY fee_id ASC");
    while ($row = $query->fetch_assoc()) {
	$exp = explode('-',$row['particular']);
        $data[] = $exp[0];
    }
    
    //return json data
    echo json_encode($data);

?>