<pre>
<?php

$people = [
    'matt  ',
    'jo    ',
    'liz   ',
    'bill  ',
    'angela',
];

do {
    $assignments = [];

    foreach ($people as $person) {

        $available = array_diff($people, $assignments, [$person]);

        if (empty($available)) {
            continue;
        }

        $assignments[$person] = $available[array_rand($available)];
    }

} while (count($people) !== count($assignments));

print_r($assignments);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'mysql';
    $db = 'development';
    $user = 'root';
    $pass = 'password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }


    $sql = "INSERT INTO users (name, surname, sex) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $surname, $sex]);

}
?>
</pre>

<form method="post">
    <label>
        <input type="text" name="email" placeholder="Email Address">
    </label>

    <input type="submit" value="Join the 2019 Gift Exchange"
</form>