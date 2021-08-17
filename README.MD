# Webasyst Docker PHP-FPM 7.4 & MariaDb

No nginx webserver. Internal php-server and a running script.

## Quickstart

1. Download current repository
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

### Shop-Script
If you have access to Shop-Script repository, you can add it to the folder `webasyst`
```
git clone git@github.com:webasyst/shop-script.git wa-apps/shop
```