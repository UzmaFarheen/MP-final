Hello Proffessor,

1. The launch script for the database subnet has the subnets according to my aws credentials so please do change it when you are testing the applications.

2. Sometimes the vendor file does not run in the install-webserver.sh so we need to run the command 
sudo php composer.phar require aws/aws-sdk-php &> /tmp/runcomposer.txt

sudo mv vendor /var/www/html &> /tmp/movevendor.txt
again from the command line.

3. 
