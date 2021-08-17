<?php

class webasystStartServerCli
{
    public function execute()
    {
        $port = waRequest::param(0, 8080, waRequest::TYPE_INT);
        $root = wa()->getConfig()->getRootPath();
        printf(
            "PHP %s Development Server started at %s\nListening on http://0.0.0.0:%d\nDocument root is %s\nPress Ctrl-C to quit.\n",
            PHP_VERSION,
            date("D M j G:i:s Y"),
            $port,
            $root
        );
        shell_exec(sprintf("php -S 0.0.0.0:%d -t %s %s", $port, $root, __FILE__));
    }
}

if (PHP_SAPI === 'cli-server') {
    chdir(__DIR__ . '/../');
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    if (preg_match(';/wa-data/protected/;', $_SERVER['REQUEST_URI']) ||
        preg_match(
            ';/(wa-apps|wa-plugins|wa-system|wa-widgets)/.*/(lib|locale|templates)/;',
            $_SERVER['REQUEST_URI']
        ) ||
        preg_match(';/wa-(cache|config|installer|log|system)/;', $_SERVER['REQUEST_URI'])) {
        header("HTTP/1.1 403 Forbidden");
        exit;
    }

    if (file_exists('.' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
        return false;
    }

    if (preg_match(';/wa-data/public/shop/products/\d+/;', $_SERVER['REQUEST_URI'])) {
        include './wa-data/public/shop/products/thumb.php';
    } elseif (preg_match(';/wa-data/public/shop/promos/\d+;', $_SERVER['REQUEST_URI'])) {
        include './wa-data/public/shop/promos/thumb.php';
    } elseif (preg_match(';/wa-data/public/contacts/photos/\d+/;', $_SERVER['REQUEST_URI'])) {
        include './wa-data/public/contacts/photos/thumb.php';
    } elseif (preg_match(';/wa-data/public/photos/\d+/;', $_SERVER['REQUEST_URI'])) {
        include './wa-data/public/photos/thumb.php';
    } elseif (preg_match(';/wa-data/public/mailer/files/\d+/;', $_SERVER['REQUEST_URI'])) {
        include './wa-data/public/mailer/files/file.php';
    } else {
        include './index.php';
    }
} else {
    $cli = new webasystStartServerCli();
    $cli->execute();
}
