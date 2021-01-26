# cloudflare-ddns

This script is using [Cloudflare PHP API Binding](https://support.cloudflare.com/hc/en-us/articles/115001661191-Cloudflare-PHP-API-Binding).

Attention!
You can't use this script with .tk .ml .ga .cf .gq  domains

# How To Use
```
$ mkdir cloudflare
$ cd cloudflare
$ composer require cloudflare/sdk
$ git clone https://github.com/Klay4/cloudflare-ddns.git
### Edit update.php with your CloudFlare credentials and domain details ###
$ ./update.php
```

If you want it to update automatically, put it in your crontab.
```
0 */6 * * * ~/cloudflare/klay4.php >/dev/null 2>&1
```

# Future Updates
* Multi Domain Support
* Log File System

# Contact
If you have any problems or questions please contact me via Discord: @Klay4#0001
