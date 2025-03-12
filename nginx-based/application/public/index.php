<?php

echo 'PHP-FPM + Docker + Nginx + Postgres' . '<br>';

//echo '<pre>';
//var_dump($_ENV);
//echo '</pre>';


$dsn = sprintf("pgsql:host=%s;port=5432;dbname=%s",
    getEnv('DB_HOST'), getEnv('DB_DATABASE')
);

try {
    $pdo = new PDO($dsn, getEnv('DB_USER'), getEnv('DB_PASSWORD'));

    if ($pdo instanceof PDO) {
        echo "Connected to DB successfully!" . '<br>';
    }
} catch (PDOException $e) {
    echo sprintf("DB exception: %s", $e->getMessage()) . '<br>';
}

try {
    $redis = new Redis([
        'host' => getEnv('REDIS_HOST'),
        'port' => (int)getEnv('REDIS_PORT'),
    ]);
    $redis->set('foo', 'bar');
    echo 'redis value: ' . $redis->get('foo') . '<br>';
} catch (Exception $e) {
    echo sprintf("Redis exception: %s", $e->getMessage());
}

