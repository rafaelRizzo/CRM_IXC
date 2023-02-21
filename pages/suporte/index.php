<?php
session_start();

// if ($_SESSION['login'] != 'true') {
//     header("Location: ../../index.php");
// }

$_SESSION['user'] = 'Rafael Rizzo';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>
    <!-- Seta o nome do agente em Cookie -->
    <script>
        localStorage.setItem("agente", "<?php echo $_SESSION['user']; ?>")
        console.log(localStorage.getItem("agente"))
    </script>
    <!-- Seta o nome do agente em Cookie -->
</body>

</html>