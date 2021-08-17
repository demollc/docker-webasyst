# Webasyst Docker PHP-FPM 7.4 & MariaDb

No nginx/apache webserver. Internal php-server and a running script.

## Quickstart

1. Clone current repository
   ```shell
   git clone https://github.com/demollc/docker-webasyst.git
   ```
2. Clone Webasyst Framework repository to subfolder `webasyst`.
    ``` shell
   cd webasyst
   git clone https://github.com/webasyst/webasyst-framework.git .
    ```        
3. Copy or move wa-config folder to `webasyst/wa-config`. It will add default config files.
   ```shell
   cd ..
   cp -r wa-config/* webasyst/wa-config/
   ```
4. From main folder execute
    ``` shell
    docker-compose up
    ```
   This will download and execute containers.
5. The site should be available on http://localhost/ 

### Shop-Script
If you have access to Shop-Script repository, you can add it to the folder `webasyst`
```
git clone git@github.com:webasyst/shop-script.git wa-apps/shop
```