<?php
require 'vendor/autoload.php';
$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);
$resultrdb = $rds->describeDBInstances(array(
    'DBInstanceIdentifier' => 'mp1-replica'
));
$endpointrdb = $resultrdb['DBInstances'][0]['Endpoint']['Address'];
    echo "============\n". $endpointrdb . "================";
$linkrdb = mysqli_connect($endpointrdb,"UzmaFarheen","UzmaFarheen","Project");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else {
echo "Connection to RDB Success";
}
$tableName  = 'ITMO544';
$backupFile = 'FP_database_backup_'.date('G_a_m_d_y').'.sql';
$query      = "SELECT * INTO ITMO544 '$backupFile' FROM $tableName";
$result = mysql_query($query);
$linkrdb->close();
?>
