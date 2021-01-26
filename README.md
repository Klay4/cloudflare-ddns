# cloudflare-ddns

This script is using [Cloudflare PHP API Binding](https://support.cloudflare.com/hc/en-us/articles/115001661191-Cloudflare-PHP-API-Binding)

# How To Use
```
$ mkdir coudflare
$ cd cloudflare
$ composer require cloudflare/sdk
$ git clone https://github.com/Klay4/cloudflare-ddns.git
$ ./update.php
```

If you want it to update automatically, put it in your crontab.
```
0 */6 * * * ~/cloudflare/klay4.php >/dev/null 2>&1
```
