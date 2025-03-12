<?php

echo 'PHP + Docker + Apache2 + MariaDB' . '<br>';

$dsn = sprintf("mysql:host=%s;dbname=%s;charset=UTF8",
    getEnv('DB_HOST'), getEnv('DB_DATABASE')
);

try {
    $pdo = new PDO($dsn, getEnv('DB_USER'), getEnv('DB_PASSWORD'));

    if ($pdo instanceof PDO) {
        echo "Connected to DB successfully!" . '<br>';
    }
} catch (PDOException $e) {
    echo sprintf("DB exception: %s", $e->getMessage());
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

