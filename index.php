<?php
  
    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records= $conn->prepare('SELECT id_usuario, nombre, apellido, email,edad, password FROM usuarios WHERE id_usuario=:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);

        $user= null;
        if(count($results)>0 ){
            $user=$results;
        }
    }

?>

<?php if(!empty($user)): ?>
    <?php require 'partials/sessionbody.php'; ?>
<?php else: ?>
    <?php require 'partials/body.php'; ?>
<?php endif; ?>
