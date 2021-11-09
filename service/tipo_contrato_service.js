// $(document).ready(function () {

//     $.ajax({
//         url: '../controller/controller.php',
//         data: { func: "list" },
//         success: function (response) {
//             const obj = JSON.parse(response);
//             obj.forEach(function (data) {
//                 let item = document.createElement("li");
//                 item.classList.add("list-group-item");
//                 item.innerHTML = data.nome_tipo_contrato;
//                 list.appendChild(item);
//             });

//         }

//     })
// });

$(document).on('click', '#btn-add', function (e) {
    var data = $("#add_contrato_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: '../controller/controller.php',
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
            }
        }
    });
});

$(document).on('click', '.update', function (e) {
    var id = $(this).attr("data-id_tipo_contrato");
    var nome = $(this).attr("data-nome_tipo_contrato");
    var cod = $(this).attr("data-cod_tipo_contrato");
    var meses = $(this).attr("data-meses");
    var valor = $(this).attr("data-valor");
    var valor_pos = $(this).attr("data-valor_pos");
    var obs = $(this).attr("data-obs");
    $('#id_tipo_contrato_u').val(id);
    $('#nome_tipo_contrato_u').val(nome);
    $('#cod_tipo_contrato_u').val(cod);
    $('#meses_u').val(meses);
    $('#valor_u').val(valor);
    $('#valor_pos_u').val(valor_pos);
    $('#obs_u').val(obs);
});

$(document).on('click', '#update', function (e) {
    var data = $("#update_form").serialize();
    console.log(data)
    $.ajax({
        data: data,
        type: "post",
        url: '../controller/controller.php',
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
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

});
$(document).on("click", "#delete", function () {
    $.ajax({
        url: '../controller/controller.php',
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function (dataResult) {
            $('#deleteEmployeeModal').modal('hide');
            $("" + dataResult).remove();
            location.reload();

        }
    });
});

$(document).on("click", "#delete_multiple", function () {
    var user = [];
    $(".user_checkbox:checked").each(function () {
        user.push($(this).data('user-id'));
    });
    if (user.length <= 0) {
        alert("Please select records.");
    }
    else {
        WRN_PROFILE_DELETE = "Are you sure you want to delete " + (user.length > 1 ? "these" : "this") + " row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if (checked == true) {
            var selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: '../controller/controller.php',
                cache: false,
                data: {
                    type: 4,
                    id: selected_values
                },
                success: function (response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                    }
                }
            });
        }
    }
});
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});
