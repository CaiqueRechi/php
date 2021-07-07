<?php 
require __DIR__ ."/../vendor/autoload.php";
session_start();

use App\Models\Model;
use App\Models\Brand;

$brands = new Brand();
$brands  = $brands->getAll();

if(isset($_POST['name']) && isset($_POST['cnpj'])) {
    if($_POST['name'] == '' || $_POST['cnpj'] == ''){
        $_SESSION['message'] = 'Todos os campos são obrigatórios!!';
        header('location: http://web.test/src/');
    }

    $brand = new Brand();
    $brand->name = $_POST['name'];
    $brand->cnpj = $_POST['cnpj'];

    if(isset($_POST['id']) && $_POST['id'] != '') {
        $result = $brand->save($_POST['id']);
    } else {
        $result = $brand->save();
    }

    if($result) {
        $_SESSION['message'] = 'Registro inserido/atualizado com sucesso!';
        header('location: http://web.test/src/');
    } else {
        echo "Erro ao tentar cadastrar/atualizar o registro!";
    }
}

if(isset($_POST['delete']) && isset($_POST['id'])) {
    if($_POST['id'] == '') {
        $_SESSION['message'] = 'Informe um ID válido!';
        header('location: http://web.test/src/');
    }

    $brand = new Brand();
    $result = $brand->destroy($_POST['id']);

    if($result) {
        $_SESSION['message'] = 'Registro excluído com sucesso!';
        header('location: http://web.test/src/');
    } else {
        echo "Erro ao tentar excluir o registro!";
    }
}

?>
<html>
    <head>
        <title> Data Manager </title>
        <meta charset="UTF-8">
        <meta name="keywords" content="html, php, database, data">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-white">
        <?php if(isset($_SESSION['message'])): ?>
            <div>
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>" />
            <input type="text" id="name" name="name" class="w-64 h-8 bg-gray-100 border-2 border-gray-200" value="<?= $_GET['name'] ?? '' ?>">
            <input type="text" id="cnpj" name="cnpj" class="w-48 h-8 bg-gray-100 border-2 border-gray-200" value="<?= $_GET['cnpj'] ?? '' ?>">
            <button type="submit" class="px-2 py-1 text-gray-100 bg-gray-900 radius-0 hover:bg-gray-700">ENVIAR</button>
        </form> 

        <table>
            <thead>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Criado por</th>
                <th>Ultima Atualização</th>
                <th>Ações</th>
            </thead>
            <tbody>
            <?php foreach ($brands as $brand): ?>
                <tr>
                    <td><?= $brand['name']; ?></td>
                    <td><?= $brand['cnpj']; ?></td>
                    <td><?= isset($brand['created_at']) ? date("d/m/Y H:i:s", strtotime($brand['created_at'])) : '-'; ?></td>
                    <td><?= isset($brand['updated_at']) ? date("d/m/Y H:i:s", strtotime($brand['updated_at'])) : '-'; ?></td>
                    <td>
                        <a href="http://web.test/src/index.php?id=<?= $brand['id'] ?>&name=<?= $brand['name'] ?>&cnpj=<?= $brand['cnpj'] ?>">Editar</a>
                        <form method="post" action="">
                            <input type="hidden" name="id" value="<?= $brand['id'] ?>" />
                            <button type="submit" name="delete">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="http://web.test/assets/js/jquery.mask.min.js"></script>
        <script>
            $("#cnpj").keydown(function(){
                try {
                    $("#cnpj").unmask();
                } catch (e) {}

                var tamanho = $("#cnpj").val().length;

                if(tamanho < 11){
                    $("#cnpj").mask("999.999.999-99");
                } else {
                    $("#cnpj").mask("99.999.999/9999-99");
                }

                // ajustando foco
                var elem = this;
                setTimeout(function(){
                    // mudo a posição do seletor
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                // reaplico o valor para mudar o foco
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            });
        </script>
    </body>
</html>

<?php

session_destroy();

?>