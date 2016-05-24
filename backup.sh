mysqldump -h localhost -u root -p@#UERR#DB_%2014 -R --opt uerr >banco.sql
tar -zcf app.tar.gz /var/www/uerr/ 
tar -zcf backup_`date +%Y_%m_%d`.tar.gz app.tar.gz banco.sql
mv backup_`date +%Y_%m_%d`.tar.gz backup/
rm app.tar.gz banco.sql
