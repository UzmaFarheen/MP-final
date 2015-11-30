<?php
session_start();
require 'vendor/autoload.php';
$introspec=true;
$_SESSION['introspec']=$introspec;
echo "=========== $introspec =======";
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
$backupFile = '/tmp/FinalDB'.date("Y-m-d-H-i-s").'.gz';
$command = "mysqldump --opt -h $endpointrdb -u UzmaFarheen -p UzmaFarheen Project | gzip > $$
exec($command);
echo "success";
                        $s3 = new Aws\S3\S3Client([
                                'version' => 'latest',
                                'region'  => 'us-east-1'
                        ]);
$bucket='mpuzma'.rand().'-dbdump';
                        if(!$s3->doesBucketExist($bucket)) {
                                $result = $s3->createBucket([
                                        'ACL' => 'public-read',
                                        'Bucket' => $bucket,
                                        ]);
  $s3->waitUntil('BucketExists', array('Bucket' => $bucket));
    echo "$bucket Created Successfully";
                        }
$result = $s3->putObject([
'ACL' => 'public-read',
'Bucket' => $bucket,
'Key' => $backupFile,
'SourceFile'   => $backupFile,
'Body' => fopen($backupFile,'r+'),
]);
$url = $result['ObjectURL'];
echo $url;
echo "Database backup created successfully.";
$urlintro       = "index.php";
   header('Location: ' . $urlintro, true);
   die();
$linkrdb->close();
?>
