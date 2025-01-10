<?php
use App\Session;

$users = $result["data"]["users"];

?>

<h1>Liste des utilisateurs</h1>

<div class="container-table">
    <table>
        <thead>
            <tr>
                <th class="id-table">ID</th>
                <th class="pseudo-table">Pseudo</th>
                <th class= "role-table">Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) { ?> 
                <tr>
                    <td class="id-table"><?php echo $user->getId();?> </td>
                    <td class="pseudo-table"><?php echo $user->getPseudo();?> </td>
                    <td class= "role-table"> <?php echo $user->getRole();?></td>
                </tr>   
            <?php } ?>
        </tbody>
    </table>
</div>
