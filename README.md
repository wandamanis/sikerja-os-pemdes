# **SI *(paling)* KERJA** is Key Performance Index measurement and employee's performance for whose claimed to be a righful one

## **Features**

## **Things to do First**
1. Fetch all files & folder from git
2. Open directory using terminal
3. Create ``.env`` by copying from example
```
cp ./.env.example .env
```
4. Edit ``.env`` by change database connection configuration at ``DB_DATABASE``, ``DB_USERNAME``, and ``DB_PASSWORD``
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= <DATABASE_NAME>
DB_USERNAME= <USERNAME>
DB_PASSWORD= <PASSWORD>
```
5. Update using ``composer``
```
composer update
```
6. Migrating and seeding data
```
php artisan migrate
php artisan db:seed
```
7. Run project using ``artisan``
```
php artisan serve
```

## **How to Reproduce Dev Environment**

## **Getting Started on Linux**
1. Install **Apache Web Server**
```
sudo apt install apache2 -y
```
2. Check ``Apache2`` status
```
sudo service apache2 status
```
3. Establish rule in ``ufw``
```
sudo ufw allow “Apache Full”
```
4. Check ``Apache2`` default page by entering IP address or ``localhost`` in web browser
5. Install ``PHP``
```
sudo apt install php libapache2-mod-php php-mysql -y
```
6. Modify ``Apache2`` server files by changing ``dir.conf`` with root privillege
```
sudo nano /etc/apache2/mods-enabled/dir.conf
```
7. Add ``index.php`` in ``DirectoryIndex
```
<IfModule mod_dir.c>
	DirectoryIndex index.php index.html index.cgi index.pl index.php index.xhtml index.htm
</IfModule>
```
8. Restart ``Apache2``
```
sudo systemctl restart apache2
```
9. Install ``MySQL``
```
sudo apt install mysql-server -y
```
10. Install Database Manager
```
sudo mysql_secure_installation
```