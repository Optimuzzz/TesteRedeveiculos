
$(document).on('click', '#btn-add', function (e) {
    var data = $("#add_contrato_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: '../controller/tipo_contrato_controller.php',
        success: function (dataResult) {
            console.log(dataResult)
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#addEmployeeModal').modal('hide');
                alert('Operação efetuada com sucesso!');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert("Erro ao efetuar operação!");
                e.preventDefault();
            }
        }
    });
    
});

$(document).on('click', '.update', function (e) {

    $('#id_tipo_contrato_u').val($(this).attr("data-id_tipo_contrato"));
    $('#nome_tipo_contrato_u').val($(this).attr("data-nome_tipo_contrato"));
    $('#cod_tipo_contrato_u').val($(this).attr("data-cod_tipo_contrato"));
    $('#meses_u').val($(this).attr("data-meses"));
    $('#valor_u').val($(this).attr("data-valor"));
    $('#valor_pos_u').val($(this).attr("data-valor_pos"));
    $('#obs_u').val($(this).attr("data-obs"));

});

$(document).on('click', '#update', function (e) {
    var data = $("#update_form").serialize();
   // console.log(data)
    $.ajax({
        data: data,
        type: "post",
        url: '../controller/tipo_contrato_controller.php',
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editEmployeeModal').modal('hide');
                alert('Operação efetuada com sucesso !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert("Erro ao efetuar operação!");                
            }            
        }
    });
    
});

$(document).on("click", ".delete", function () {
   
    $('#id_tipo_contrato_u').val($(this).attr("data-id_tipo_contrato"));

});

$(document).on("click", "#delete", function (e) {
    $.ajax({
        url: '../controller/tipo_contrato_controller.php',
        type: "POST",
        cache: false,
        data: {
            func: 'del',
            id_tipo_contrato: $('#id_tipo_contrato_u').val()
        },
        success: function (dataResult) {
            console.log(dataResult)
            $('#deleteEmployeeModal').modal('hide');
           // $("#" + dataResult).remove();
            location.reload();

        }
    });
    e.preventDefault();
});
