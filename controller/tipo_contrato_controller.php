<?php
include_once '../model/tipo_contrato_model.php';

$model = new TipoContrato();

switch ($_REQUEST['func']) {
		// case 'list':
		// 	$model->list();
		// 	break;

	case 'edit':
		$model->edit($_REQUEST['id_tipo_contrato'], $_REQUEST['nome_tipo_contrato'], $_REQUEST['cod_tipo_contrato'], $_REQUEST['meses'], $_REQUEST['valor'], $_REQUEST['valor_pos'], $_REQUEST['obs']);
		break;

	case 'add':
		$model->add($_REQUEST['nome_tipo_contrato'], $_REQUEST['cod_tipo_contrato'], $_REQUEST['meses'], $_REQUEST['valor'], $_REQUEST['valor_pos'], $_REQUEST['obs']);
		break;

	case 'del':
		$model->del($_REQUEST['id_tipo_contrato']);
		break;
}
