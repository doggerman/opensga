<?php

    App::uses('CakeSession', 'Model/Datasource');
    App::uses('CakeEvent', 'Event');

    /**
     * Model de Matricula
     *
     * @copyright       Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
     * * @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
     * @author          Elisio Leonardo (elisio.leonardo@gmail.com)
     * @package         opensga
     * @subpackage      opensga.core.controller
     * @since           OpenSGA v 0.10.0.0
     *
     */
    class Matricula extends AppModel {

        public $actsAs = array('Auditable.Auditable');
        //The Associations below have been created with all possible keys, those that are not needed can be removed
        var $belongsTo = array(
            'Aluno'           => array(
                'className'  => 'Aluno',
                'foreignKey' => 'aluno_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Curso'           => array(
                'className'  => 'Curso',
                'foreignKey' => 'curso_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'PlanoEstudo'     => array(
                'className'  => 'PlanoEstudo',
                'foreignKey' => 'plano_estudo_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'EstadoMatricula' => array(
                'className'  => 'EstadoMatricula',
                'foreignKey' => 'estado_matricula_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'User'            => array(
                'className'  => 'User',
                'foreignKey' => 'user_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Turno'           => array(
                'className'  => 'Turno',
                'foreignKey' => 'turno_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'AnoLectivo'      => array(
                'className'  => 'AnoLectivo',
                'foreignKey' => 'ano_lectivo_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'TipoMatricula'   => array(
                'className'  => 'TipoMatricula',
                'foreignKey' => 'tipo_matricula_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'FinanceiroPagamento'   => array(
                'className'  => 'FinanceiroPagamento',
                'foreignKey' => 'financeiro_pagamento_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
        var $name = 'Matricula';
        var $validate = array(
            'Aluno_id' => array(
                'rule'    => 'validaMatricula',
                'message' => 'Este aluno ja possui uma matricula activa'
            )
        );

        /**
         * Retorna todos os alunos matriculados num dado plano de estudos
         */
        function getAllAlunosMatriculados($ano_lectivo_id) {
            $alunos = $this->find('all', array('conditions' => array('ano_lectivo_id' => $ano_lectivo_id), 'fields' => array('aluno_id', 'Aluno.codigo')));

            return $alunos;
        }

        public function getAllMatriculasByAluno($alunoId) {
            $this->contain(array(
                'TipoMatricula', 'EstadoMatricula', 'AnoLectivo', 'Curso', 'PlanoEstudo'
            ));
            $matriculas = $this->find('all', array('conditions' => array('aluno_id' => $alunoId), 'order' => 'AnoLectivo.ano DESC'));

            return $matriculas;
        }

        /**
         * Retorna a renovacao dado o id do aluno e o ano lectivo
         *
         * @todo rever essa funcao/melhorar
         * @param type $aluno_id
         * @param type $ano
         * @return type
         */
        public function getRenovacaoByAlunoAndAnoLectivo($aluno_id, $ano) {
            $ano_lectivo_id = $this->AnoLectivo->getAnoLectivoIdByAno($ano);

            $matricula = $this->find('first', array('conditions' => array('aluno_id' => $aluno_id, 'ano_lectivo_id' => $ano_lectivo_id)));

            return $matricula;
        }

        /**
         * Retorna o estado da renovacao de matricula do Aluno.
         * @param type $aluno_id
         */
        public function getStatusRenovacao($aluno_id, $renovacoes_futuras = false) {

            //Primeiro vamos buscar todos os anos lectivos que ele devia matricular
            $this->Aluno->contain('HistoricoCurso');
            $aluno = $this->Aluno->findById($aluno_id);


            $this->AnoLectivo->contain();
            $ano_lectivo_conditions = array('ano >=' => $aluno['Aluno']['ano_ingresso']);
            if ($aluno['Aluno']['estado_aluno_id'] == 3) {
                $this->Aluno->HistoricoCurso->contain();
                $historicoAluno                   = $this->Aluno->HistoricoCurso->find('first', array('conditions' => array('aluno_id' => $aluno['Aluno']['id'], 'curso_id' => $aluno['Aluno']['curso_id'])));
                $ano_lectivo_conditions['ano <='] = $historicoAluno['HistoricoCurso']['ano_fim'];
            } else {
                if ($renovacoes_futuras) {
                    $ano_lectivo_maximo               = $this->AnoLectivo->find('first', array('order' => 'AnoLectivo.ano DESC'));
                    $ano_lectivo_conditions['ano <='] = $ano_lectivo_maximo['AnoLectivo']['ano'];
                } else {
                    $ano_lectivo_conditions['ano <='] = Configure::read('OpenSGA.ano_lectivo');
                }
            }
            $ano_lectivos          = $this->AnoLectivo->find('all', array('conditions' => $ano_lectivo_conditions, 'order' => 'ano desc'));
            $array_renovacao_falta = array();
            foreach ($ano_lectivos as $ano_lectivo) {
                $matricula = $this->find('first', array('conditions' => array('aluno_id' => $aluno_id, 'ano_lectivo_id' => $ano_lectivo['AnoLectivo']['id'])));
                if (empty($matricula)) {
                    $array_renovacao_falta[] = $ano_lectivo;
                } else {
                    return $array_renovacao_falta;
                }
            }

            return $array_renovacao_falta;
        }

        /**
         * Retorna o Total de Alunos que nao renovou matricula num determinado ano lectivo
         * @param type $semestre_id
         */
        public function getTotalMatriculasNaoRenovadas($unidades_organicas = null, $ano_lectivo_id = null) {

            $total_matriculas_renovadas = $this->getTotalMatriculasActivas($unidades_organicas, $ano_lectivo_id);

            $total_alunos_activos = $this->Aluno->getTotalAlunosActivos($unidades_organicas);

            return $total_alunos_activos - $total_matriculas_renovadas;
        }

        public function getTotalMatriculasActivas($unidades_organicas = null, $ano_lectivo_id = null) {
            if ($ano_lectivo_id == null) {

                $ano_lectivo_id = Configure::read('OpenSGA.ano_lectivo_id');
            }

            $conditions                             = array();
            $conditions['estado_matricula_id']      = 1;
            $conditions['Matricula.ano_lectivo_id'] = $ano_lectivo_id;
            if ($unidades_organicas) {
                $conditions['Curso.unidade_organica_id'] = $unidades_organicas;
            }
            $this->contain('Curso');

            return $this->find('count', array('conditions' => $conditions));
        }


        /**
         * @param $file_url
         * @return bool
         * @todo dinamizar o ano lectivo
         */
        public function processaFicheiroRenovacao($file_url, $anoLectivoAno) {
            App::uses('File', 'Utility');
            $linhas     = file(Configure::read('OpenSGA.save_path') . DS . $file_url, FILE_IGNORE_NEW_LINES);
            foreach ($linhas as $linha) {

                switch ($linha[0]) {
                    case '0': //Primeira Linha
                        break;
                    case '1':
                        $referencia = substr($linha, 1, 11);
                        $montante   = substr($linha, 12, 16);
                        $comissao   = substr($linha, 28, 16);
                        $dia        = substr($linha, 44, 2);
                        $mes        = substr($linha, 46, 2);
                        $ano        = substr($linha, 48, 4);
                        $hora       = substr($linha, 52, 2);
                        $minuto     = substr($linha, 54, 2);
                        $segundo    = substr($linha, 56, 2);
                        $data       = $ano . '-' . $mes . '-' . $dia . " " . $hora . ":" . $minuto . ":" . $segundo;

                        $transacaoId     = substr($linha, 58, 7);
                        $atm_id           = substr($linha, 65, 10);
                        $localizacao_atm  = substr($linha, 75, 16);
                        $montante_decimal = substr($montante, -2);
                        $montante_real = ltrim(substr($montante, 0, -2), '0');
                        $montante = $montante_real . '.' . $montante_decimal;


                        $transacao                      = array();
                        $deposito                       = array();
                        $transacao['tipo_transacao_id'] = 1;
                        $transacao['valor']             = $montante;

                        //Temos de gravar deposito antes
                        $aluno = $this->Aluno->getByReferenciaRenovacaoMatricula($referencia);
                        $anoLectivo = $this->AnoLectivo->findByAno(Configure::read('OpenSGA.ano_lectivo'));
                        if($this->Aluno->Entidade->FinanceiroTransacao->FinanceiroDeposito->setNovoDeposito(
                            $aluno['Aluno']['entidade_id'],$transacaoId,$montante,$referencia,$data
                        )){
                            $pagamento = $this->FinanceiroPagamento->setPagamentoRenovacaoMatricula(
                                $aluno['Aluno']['id'],$aluno['Aluno']['curso_id'],$montante,$data,$referencia,
                            $aluno['Aluno']['entidade_id']
                            );
                            if($pagamento){
                                //verifica se o aluno é regular
                                if ($aluno && $this->Aluno->isRegular($aluno['Aluno']['id'])) {
                                    $this->create();
                                    $matricula = array(
                                        'aluno_id'            => $aluno['Aluno']['id'],
                                        'curso_id'            => $aluno['Aluno']['curso_id'],
                                        'plano_estudo_id'     => $aluno['Aluno']['plano_estudo_id'],
                                        'data'                => $data,
                                        'estado_matricula_id' => 1,
                                        'ano_lectivo_id'      => $anoLectivo['AnoLectivo']['id'],
                                        'tipo_matricula_id'   => 2,
                                        'user_id'             => CakeSession::read('Auth.User.id'),
                                        'financeiro_pagamento_id'=>$pagamento
                                    );
                                   $this->save(array('Matricula'=>$matricula));
                            }
                        }
                        }
                }
            }
        }

        /**
         * Renova a Matricula de um estudante. Tambem processa o pagamento da renovação de matricula
         * @param type $data
         */
        public function renovaMatricula($data) {
            $dataSource = $this->getDataSource();
            $dataSource->begin();
            foreach ($data['AnoLectivo'] as $k => $v) {
                if ($v != 0) {
                    $data['Matricula']['ano_lectivo_id'] = $v;
                    $this->Aluno->Matricula->create();
                    $this->Aluno->Matricula->save($data);
                }
            }
            $dataSource->commit();
            /**$event = new CakeEvent('Model.Matricula.afterRenovacao', $this, array(
                'data' => $data
            ));
            $this->getEventManager()->dispatch($event); */
            return true;
        }
        function validaMatricula($check) {
            $aluno  = $check['aluno_id'];
            $alunos = $this->find('all', array('conditions' => array('aluno_id' => $aluno, 'estado_matricula_id' => 4)));

            if (empty($alunos)) {
                return true;
            }

            return false;
        }

    }

?>