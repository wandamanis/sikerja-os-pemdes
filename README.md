# sikerja-os-pemdes

## **Features**

## **Things to do First**

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