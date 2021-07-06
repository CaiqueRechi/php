<?php 
require __DIR__ ."/../vendor/autoload.php";
session_start();

use App\Models\Model;
use App\Models\Brand;

$brands = new Brand();
$brands  = $brands->getAll();

if((isset($_POST['name']) && isset($_POST['cnpj'])) ?? false) {
    $brand = new Brand();
    $brand->name = $_POST['name'];
    $brand->cnpj = $_POST['cnpj'];

    $result = $brand->save();

    if($result) {
        $_SESSION['message'] = 'Registro inserido com sucesso!';
        header('location: http://web.test/src/');
    } else {
        echo "Erro ao tentar cadastrar o registro!";
    }
}

?>
<html>
    
    <head>

    </head>

    <body>
        <?php if(isset($_SESSION['message'])): ?>
            <div>
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" id="name" name="name">
            <input type="text" id="cnpj" name="cnpj">
            <button type="submit">enviar</button>
        </form> 

        <table>
            <thead>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Criado por</th>
                <th>Ultima Atualização</th>
            </thead>
            <tbody>
            <?php foreach ($brands as $brand): ?>
                <tr>
                    <td><?= $brand['name']; ?></td>
                    <td><?= $brand['cnpj']; ?></td>
                    <td><?= isset($brand['created_at']) ? date("d/m/Y H:i:s", strtotime($brand['created_at'])) : '-'; ?></td>
                    <td><?= isset($brand['updated_at']) ? date("d/m/Y H:i:s", strtotime($brand['updated_at'])) : '-'; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>