<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print('Спасибо, результаты сохранены.');
    }
    include('form.php'); 
    exit();
}

$result = false;

try {
    $errors = FALSE;
    if (empty($_POST['name'])) {
        print('Заполните имя.<br/>');
        $errors = TRUE;
    }
    if (empty($_POST['email'])) {
        print('Заполните почту.<br/>');
        $errors = TRUE;
    }

    if (empty($_POST['bio'])) {
        print('Заполните биографию.<br/>');
        $errors = TRUE;
    }
    if (empty($_POST['contract'])) {
        print('Согласитесь.<br/>');
        $errors = TRUE;
    }


    if ($errors) {
        exit();
    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['birthday'];
    $gender = $_POST['gender'];
    $limbs = $_POST['limbs'];
    $bio = $_POST['bio'];
    $che = $_POST['contract'];

    $sup = $_POST['superpowers'];

    $usr = 'u53311';
    $password = '9113881';
    $connection = new PDO("mysql:host=localhost;dbname=u53311", $usr, $password, array(PDO::ATTR_PERSISTENT => true));

    $user = $connection->prepare("INSERT INTO form SET name = ?, email = ?, birthday = ?, sex = ?, limbs = ?, bio = ?, contract = ?");

    $user->execute([$_POST['name'], $_POST['email'], date('Y-m-d', strtotime($_POST['birthday'])), $_POST['sex'], $_POST['limbs'], $_POST['bio'], $_POST['contract']]);
    $id_user = $connection->lastInsertId();

    $user1 = $connection->prepare("INSERT INTO superpowers SET id = ? superpower = ?");
    foreach ($sup as $item) {
        $user1->execute([$id_user, $item]);
    }

    $result = true;
} catch (PDOException $e) {
    print('Error : ' . $e->getMessage());
    exit();
}


if ($result) {
    echo "Информация занесена в базу данных под ID №" . $id_user;
}
?>
