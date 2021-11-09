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
    <title>Home</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <ul>
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Novo Tipo Contrato</span></a>
                    <?php
                    include '../model/model.php';
                    $model = new model();
                    $rs = $model->list();
                    foreach ($rs as $v) {
                        echo  '<li class="list-group-item">' . $v['nome_tipo_contrato'] .    

                        '<a href="#deleteEmployeeModal" class="delete pull-right" data-id_tipo_contrato="'.$v["id_tipo_contrato"].'" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
                        title="Delete"></i></a>

                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="pull-right material-icons update" data-toggle="tooltip" 
                            data-id_tipo_contrato="'.$v["id_tipo_contrato"].'"
                            data-nome_tipo_contrato="'.$v["nome_tipo_contrato"].'"
                            data-cod_tipo_contrato="'.$v["cod_tipo_contrato"].'"
                            data-meses="'.$v["meses"].'"
                            data-valor="'.$v["valor"].'"
                            data-valor_pos="'.$v["valor_pos"].'"
                            data-obs="'.$v["obs"].'"
                            title="Edit"></i>
                        </a>
                    
                        </li>';
                    }

                    ?>
                </ul>
                <ul id="list">
                    
                </ul>
            </div>
        </div>

        <!--  Modal -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="add_contrato_form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Novo Tipo Contrato</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nome tipo contrato</label>
                                <input type="text" id="nome_tipo_contrato" name="nome_tipo_contrato" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Código tipo contrato</label>
                                <input type="text" id="cod_tipo_contrato" name="cod_tipo_contrato" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Meses</label>
                                <input type="number" id="meses" name="meses" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="number" id="valor" name="valor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Valor pós</label>
                                <input type="number" id="valor_pos" name="valor_pos" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Observação</label>
                                <textarea class="form-control" id="obs" name="obs" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="add" name="func">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <button type="button" class="btn btn-success" id="btn-add">Salvar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_tipo_contrato_u" name="id_tipo_contrato" class="form-control" required>
                        <div class="form-group">
                            <label>nome_tipo_contrato</label>
                            <input type="text" id="nome_tipo_contrato_u" name="nome_tipo_contrato" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>cod_tipo_contrato</label>
                            <input type="text" id="cod_tipo_contrato_u" name="cod_tipo_contrato" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>meses</label>
                            <input type="number" id="meses_u" name="meses" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>valor</label>
                            <input type="number" id="valor_u" name="valor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>valor pós</label>
                            <input type="number" id="valor_pos_u" name="valor_pos" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label>Observação</label>
                                <textarea class="form-control" id="obs_u" name="obs" style="height: 100px"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="edit" name="func">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h4 class="modal-title">Delete User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../service/tipo_contrato_service.js"></script>
    </div>
</body>

</html>