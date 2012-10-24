<?php
/**
 * OpenSGA - Sistema de Gest�o Acad�mica
 *   Copyright (C) 2010-2011  INFOmoz (Inform�tica-Mo�ambique)
 *
 * Este programa � um software livre: Voc� pode redistribuir e/ou modificar
 * todo ou parte deste programa, desde que siga os termos da licen�a por nele
 * estabelecidos. Grande parte do c�digo deste programa est� sob a licen�a
 * GNU Affero General Public License publicada pela Free Software Foundation.
 * A vers�o original desta licen�a est� dispon�vel na pasta raiz deste software.
 *
 * Este software � distribuido sob a perspectiva de que possa ser �til para
 * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
 * os termos da licen�a GNU Affero General Public License para mais detalhes
 *
 * As redistribui��es deste software, mesmo quando o c�digo-fonte for modificado significativamente,
 * devem manter est� informa��o legal, assim como a licen�a original do software.
 *
 * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
 ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 *
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/958/The-Pages-Controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set('current_section','homepage');
                $this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

    function home(){
        App::import('Model','Message');
        $this->loadModel('Aluno');
        $alerta = new Message;
        $recipient_id = $this->Session->read('Auth.User.id');
        $total_alunos = $this->Aluno->getTotalAlunos();

        $total_matriculas_activas = $this->Aluno->Matricula->getTotalMatriculasActivas();

        //Dados de Pagamento
         //Resumo Mensal
        $facturas_geradas = $this->Aluno->FinanceiroPagamento->find('count',array('conditions'=>array('MONTH(FinanceiroPagamento.created)'=>date('m'),'YEAR(FinanceiroPagamento.created)'=>date('Y'))));
        $facturas_pagas = $this->Aluno->FinanceiroPagamento->find('count',array('conditions'=>array('MONTH(FinanceiroPagamento.data_pagamento)'=>date('m'),'YEAR(FinanceiroPagamento.data_pagamento)'=>date('Y'),'FinanceiroPagamento.financeiro_estado_pagamento_id'=>2)));
        $valor_arrecadado = $this->Aluno->FinanceiroPagamento->find('all',array('conditions'=>array('MONTH(FinanceiroPagamento.data_pagamento)'=>date('m'),'YEAR(FinanceiroPagamento.data_pagamento)'=>date('Y'),'FinanceiroPagamento.financeiro_estado_pagamento_id'=>2),'fields'=>'sum(FinanceiroPagamento.valor) as valor'));

        $valor_divida = $this->Aluno->FinanceiroPagamento->getValorDividaTotal();


        $alertas = $alerta->find('all',array('conditions'=>array('recipient_id'=>$recipient_id,'datainicio <='=>date('Y-m-d').' 23:59:59','datafim >='=>date('Y-m-d').' 00:00:00')));
        $this->set('alertas',$alertas);
        $this->set(compact('total_alunos','total_matriculas_activas','facturas_geradas','facturas_pagas','valor_arrecadado','valor_divida'));

    }

		function beforeFilter(){
		parent::beforeFilter();
		$user = $this->Auth->user();

		if($user!=null){
			$this->Auth->allowedActions = array('display');
		}

	}
    public function docente_home(){
        
    }
    public function estudante_home(){

    }


}

?>