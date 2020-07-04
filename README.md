# web-scraping

clone repository ini dengan cara

`git clone https://github.com/danz63/web-scraping.git`

Atur web server `AllowOverride All` di file configurasi Apache 2 (Di Ubuntu biasanya dalam direktori /etc/apache2/apache2.conf)

```
<Directory /var/www/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Lalu restart apache2
`sudo systemctl restart apache2`

/var/www/ tergantung dimana folder server.

Pastikan `mod_rewrite enable`
untuk meng enable mod_rewrite ketikan perintah pada terminal

`sudo a2enmod rewrite`

Lalu restart apache2
`sudo systemctl restart apache2`
