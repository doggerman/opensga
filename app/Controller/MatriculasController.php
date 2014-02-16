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
 * * @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 *
 */
class MatriculasController extends AppController {

	var $name = 'Matriculas';

	/**
	 * Overview das Matriculas
	 * Mostra o grafico de Novos ingressos por Curso
	 */
	function index() {

		$this->Matricula->contain(array(
			'Aluno' => array(
				'Entidade'
			), 'Curso', 'EstadoMatricula', 'AnoLectivo', 'TipoMatricula'
		));
		$matriculas = $this->paginate('Matricula');

		$this->set(compact('matriculas'));
	}

	public function exportar_matriculas() {

		$this->Matricula->contain(array(
			'AnoLectivo'
		));
		$matriculas = $this->Matricula->find('all', array('conditions' => array('AnoLectivo.ano' => 2013)));
		die(debug($matriculas));
	}

	public function carregar_ficheiro_renovacao() {
		$this->loadModel('Upload');
		if ($this->request->is('post')) {

			$type = $this->request->data['Upload']['file']['type'];
			if ($type == 'text/plain') {

				$upload_sucesso = $this->Upload->uploadFiles('uploads', array($this->request->data['Upload']['file']), 'renovacao');
				if (isset($upload_sucesso['urls'])) {


					$this->request->data['Upload']['name'] = $this->request->data['Upload']['file']['name'];
					$this->request->data['Upload']['size'] = $this->request->data['Upload']['file']['size'];
					$this->request->data['Upload']['file_url'] = $upload_sucesso['urls'][0];
					$this->request->data['Upload']['tipo_upload_id'] = 1;
					$this->Upload->create();
					$this->Upload->save($this->request->data);

					$processado = $this->Matricula->processaFicheiroRenovacao($upload_sucesso['urls'][0]);
					if ($processado) {
						$this->Session->setFlash(__('Ficheiro de Renovação Processado com Sucesso'), 'default', array('class' => 'alert success'));
						$this->redirect(array('action' => 'renovacao_matriculas', 2014));
					}
				}
			} else {
				$this->Session->setFlash(__('Tentou carregar um ficheiro no formato errado.'), 'default', array('class' => 'alert error'));
			}
		}
	}

	public function processa_ficheiro_renovacao_teste() {
		$this->Matricula->processaFicheiroRenovacao('uploads/renovacao/P770011001.txt');
	}

	public function renovacao_matriculas($ano = null) {
		if ($ano == null) {
			$ano = date('Y');
		}

		$this->Matricula->AnoLectivo->contain();
		$anolectivo = $this->Matricula->AnoLectivo->findByAno($ano);
		$this->Matricula->contain(array(
			'Aluno' => array(
				'Entidade'
			), 'Curso', 'AnoLectivo'
		));
		$matriculas = $this->Matricula->find('all', array('conditions' => array('ano_lectivo_id' => $anolectivo['AnoLectivo']['id'], 'tipo_matricula_id' => 2), 'limit' => 20));
		$total = $this->Matricula->find('count', array('conditions' => array('ano_lectivo_id' => $anolectivo['AnoLectivo']['id'], 'tipo_matricula_id' => 2)));

		$this->set(compact('anolectivo', 'matriculas', 'total'));
	}

}

?>