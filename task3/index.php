<?php
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
    if (!empty($_GET['save'])) {
        // Если есть параметр save, то выводим сообщение пользователю.
        print('Спасибо, результаты сохранены.');
    }
    include('form.php'); // Включаем содержимое файла form.php.
    exit(); // Завершаем работу скрипта.
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

//Объединяет элементы массива в строку
    $sup = $_POST['superpowers'];

    $usr = 'u53311';
    $password = '9113881';
//Представляет собой соединение между PHP и сервером базы данных.
    $connection = new PDO("mysql:host=localhost;dbname=u53311", $usr, $password, array(PDO::ATTR_PERSISTENT => true));

//Подготавливает инструкцию к выполнению и возвращает объект инструкции
    $user = $connection->prepare("INSERT INTO form SET name = ?, email = ?, birthday = ?, sex = ?, limbs = ?, bio = ?, contract = ?");

//Запускает подготовленный запрос на выполнение
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