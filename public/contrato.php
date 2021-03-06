<?php
    include '../model/contrato_model.php';
    $model = new contrato();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Contrato</title>
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <h2>Contrato</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="con">Contratos</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label >Clientes</label>
                    <select class="form-control"  onchange="selContratos()">
                        <option>Selecione</option>
                        <?php
                            $rs = $model->listClientes();
                            foreach ($rs as $v) echo '<option value="' . $v['id'] . '">' . $v['nome'] . '</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</body>

</html>