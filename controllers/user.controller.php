<?php
    require_once '../models/User.php';

    if(isset($_GET['operacion'])){
        $user = new User();

        if($_GET['operacion'] == 'listarUsuarios'){
            $data = $user -> listarUsuarios();
            foreach ($data as $registro) {
                echo "
                    <tr>
                        <td>{$registro['user_id']}</td>
                        <td>{$registro['username']}</td>
                        <td>{$registro['first_name']}</td>
                        <td>{$registro['last_name']}</td>
                        <td>{$registro['gender']}</td>
                    </tr>  
                ";
            }
        }
    }
?>