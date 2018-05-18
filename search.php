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
    $query = $db->query("SELECT bank_id FROM td_fin_bank_accounts WHERE bank_id LIKE '%".$searchTerm."%' ORDER BY bank_id ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['bank_id'];
    }
    
    //return json data
    echo json_encode($data);

?>