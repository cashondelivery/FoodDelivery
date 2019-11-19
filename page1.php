<?php
error_reporting(0);
$dbHost ='localhost';
$dbUsername ='root';
$dbPassword ='';
$dbDatabase ='foodsys';
 $datatable="purchase_detail";// MySQL table name
$results_per_page = 20; // number of results per page
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php
if (isset($_GET["page"])) 
	{ 
		$page  = $_GET["page"]; 
	} else 
	{ 
		$page=1; 
	};
$start_from = ($page-1) * $results_per_page;

$sql = $sql = "SELECT * FROM ".$datatable." ORDER BY pdid ASC LIMIT $start_from, ".$results_per_page;
$rs_result = $conn->query($sql);
?> 
<table border="1" cellpadding="4">
<tr>
    <td bgcolor="#CCCCCC"><strong>ID</strong></td>
   
<?php 
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><?php echo $row["pdid"]; ?></td>
 
            </tr>
<?php 
}; 
?> 
</table>
 
 