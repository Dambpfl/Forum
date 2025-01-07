<?php
use App\Session;

$users = $result["data"]["users"];

?>

<?php
foreach($users as $user) {
    echo $user->getPseudo();?> <br>
<?php } ?>
