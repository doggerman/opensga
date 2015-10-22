<?php

    ini_set('memory_limit', "2048M");
    ini_set('xdebug.max_nesting_level', 20000);
    App::uses('AuditableConfig', 'Auditable.Lib');

    class ManutencaoShell extends AppShell
    {

        public $uses = [
            'Inscricao',
            'Turma',
            'Matricula',
            'Curso',
            'UnidadeOrganica',
            'Candidatura',
            'Aluno',
            'EstadoAluno',
            'PlanoEstudo',
            'Disciplina',
            'DisciplinaPlanoEstudo',
            'HistoricoCurso',
            'AnoLectivo',
            'AlumniCandidatoAlumni',
            'Requisicoes.RequisicoesPedido',
            'Entidade',
            'User',
            'SmsNotification',
            'Docente'
        ];






        public function ingressos()
        {
            AuditableConfig::$Logger = ClassRegistry::init('Auditable.Logger');
            App::import('Vendor', 'PHPExcel', ['file' => 'PHPExcel.php']);
            if (!class_exists('PHPExcel')) {
                throw new CakeException('Vendor class PHPExcel not found!');
            }

            $xls = PHPExcel_IOFactory::load(APP . 'Imports' . DS . 'ingressos.xlsx');

            $worksheet = $xls->getActiveSheet();
            $linha_actual = 2;


            foreach ($worksheet->getRowIterator() as $row) {


                $nome = $worksheet->getCell('B' . $linha_actual)->getCalculatedValue();
                if($nome==''){
                    break;
                }

                $anoLectivo = $worksheet->getCell('I' . $linha_actual)->getCalculatedValue();

                $array_nome = explode(' ',trim($nome));


                $this->Aluno->contain(['Entidade','EstadoAluno']);
                $aluno = $this->Aluno->find('first',array('conditions'=>array('Entidade.apelido like'=>'%'.end($array_nome).'%','Entidade.nomes like'=>'%'.$array_nome[0].'%','Aluno.ano_ingresso'=>$anoLectivo)));

                if($aluno){
                   // debug($aluno);die();
                    $worksheet->setCellValue('A' . $linha_actual, $aluno['Aluno']['codigo']); //Nome da Instituicao
                    $worksheet->setCellValue('D' . $linha_actual, $aluno['Aluno']['ano_ingresso']-$aluno['Entidade']['data_nascimento']); //Nome da Instituicao
                    $worksheet->setCellValue('P' . $linha_actual, $aluno['EstadoAluno']['name']); //Nome da Instituicao
                }

                $this->out($nome);
                $this->out($linha_actual);






                $linha_actual++;
            }

            $objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

            $objWriter->save('ingressos.xlsx');

            $xls->disconnectWorksheets();
            unset($xls);

        }

        public function senhaDocentes(){
            $this->Docente->contain(['Entidade'=>['User']]);
            $docentes   = $this->Docente->find('all');

            foreach($docentes as $docente){
                $ultimoLogin = $docente['Entidade']['User']['ultimo_login'];

                if($ultimoLogin==null){
                    $this->User->id = $docente['Entidade']['User']['id'];
                    $this->User->set('password',Security::hash('siga12345UEM','blowfish'));
                    $this->User->set('estado_objecto_id',1);
                    if($this->User->save()){
                        $this->out('Actualizando...'.$docente['Entidade']['User']['username']);
                    } else{
                        debug($this->User->validationErrors);
                        debug($docente);
                        debug($docente['Entidade']['User']['username']);
                        die();
                    }


                }
            }
        }



    }
