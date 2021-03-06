<?php

ini_set('memory_limit', "2048M");
App::uses('AuditableConfig', 'Auditable.Lib');
App::uses('AppShell', 'Console/Command');

class SMSShell extends AppShell
{

    public $uses = ['Aluno', 'SmsEnviada'];


    public function envia_sms_estrangeiros()
    {
        AuditableConfig::$Logger = ClassRegistry::init('Auditable.Logger');
        $this->Aluno->contain([
            'Entidade' => [
                'EntidadeContacto' => [
                    'conditions' => ['tipo_contacto_id' => 2],
                ],
            ],
        ]);
        $alunos = $this->Aluno->find('all', ['conditions' => ['Aluno.ano_ingresso' => 2015]]);
        $this->out('Enviando SMS para um total de ' . count($alunos) . ' Estudantes');

        $mensagem = "BAILE DE CALOIROS 2015, dia 4 de Abril pelas 18h. Local: COLMEIA 2(Campus), Bilhetes a venda:825616204. AEU-UEM.";
        $this->SmsEnviada->sendSMS('826489374', $mensagem);
        $this->SmsEnviada->sendSMS('844683674', $mensagem);
        $this->SmsEnviada->sendSMS('825616204', $mensagem);
        $this->SmsEnviada->sendSMS('825509623', $mensagem);

        foreach ($alunos as $aluno) {
            if ($aluno['Entidade']['telemovel'] != '') {
                $numero = $aluno['Entidade']['telemovel'];
                if (is_numeric($numero)) {
                    debug($numero);


                    $this->SmsEnviada->sendSMS($numero, $mensagem);
                    $this->out('SMS Enviada para---' . $numero);
                }


            }
        }
    }


    public function envia_sms_excel()
    {
        AuditableConfig::$Logger = ClassRegistry::init('Auditable.Logger');
        App::import('Vendor', 'PHPExcel', ['file' => 'PHPExcel.php']);
        if (!class_exists('PHPExcel')) {
            throw new CakeException('Vendor class PHPExcel not found!');
        }

        $xls = PHPExcel_IOFactory::load(APP . 'Imports' . DS . 'ELISIO.xlsx');


        $worksheet = $xls->getActiveSheet();
        $linha_actual = 2;
        $mensagem = "A A DRA-UEM, informa que para o pagamento do seu subsidio de bolsa deve trazer a esta Direccao o seu NIB, NUIT e nr de conta";
        foreach ($worksheet->getRowIterator() as $row) {
            if ($worksheet->getCell('A' . $linha_actual)->getValue() == '') {
                break;
            }

            $numero = $worksheet->getCell('A' . $linha_actual)->getCalculatedValue();


            $this->Aluno->contain([
                'Entidade' => [
                    'EntidadeContacto' => [
                        'conditions' => ['tipo_contacto_id' => 2],
                    ],
                ],
            ]);

            $aluno = $this->Aluno->findByCodigo($numero);
            if (!empty($aluno)) {
                if ($aluno['Entidade']['telemovel'] != '') {
                    $numero = $aluno['Entidade']['telemovel'];
                    if (is_numeric($numero)) {
                        debug($numero);


                        $this->SmsEnviada->sendSMS($numero, $mensagem);
                        $this->out('SMS Enviada para---' . $numero);
                    }


                }

            }


            $linha_actual++;


        }

    }


    public function envia_sms_graduados()
    {
        AuditableConfig::$Logger = ClassRegistry::init('Auditable.Logger');
        $this->Aluno->contain([
            'Entidade' => [
                'EntidadeContacto' => [
                    'conditions' => ['tipo_contacto_id' => 2],
                ],
            ],
        ]);
        $candidatos = $this->Aluno->CandidatoGraduacao->find('all', [
            'conditions' => [
                'CandidatoGraduacao.estado_candidatura_id' => [1, 2, 3, 4, 5],
                'cerimonia_graduacao_id' => 5,
            ],
        ]);
        $this->out('Enviando SMS para um total de ' . count($candidatos) . ' Estudantes');

        $mensagem = "Caro estudante, queira contactar a DRA da UEM com Urgencia para tratar sobre a cerimonia de graduacao. Sergio";
        //$this->SmsEnviada->sendSMS('826614965', $mensagem);
        //$this->SmsEnviada->sendSMS('842587341', $mensagem);
        //$this->SmsEnviada->sendSMS('824601330', $mensagem);
        //$this->SmsEnviada->sendSMS('842015744', $mensagem);

        foreach ($candidatos as $candidato) {

            if ($candidato['CandidatoGraduacao']['telemovel'] != '') {
                $numero = $candidato['CandidatoGraduacao']['telemovel'];
                if (is_numeric($numero)) {
                    debug($numero);


                    //$this->SmsEnviada->sendSMS($numero, $mensagem);
                    $this->out('SMS Enviada para---' . $numero);
                }


            }
        }


    }

    public function testReport()
    {

        $jasper = new JasperPHP\JasperPHP;

        $dir = ROOT . '/Vendor/cossou/jasperphp/examples/hello_world.jrxml';

        // Compile a JRXML to Jasper
        $jasper->compile(ROOT . '/Vendor/cossou/jasperphp/examples/Teste.jrxml')->execute();


        // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
        $resultado = $jasper->process(
            ROOT . '/Vendor/cossou/jasperphp/examples/Teste.jasper',
            false,
            ["pdf", "rtf"],
            [],
            ['driver' => 'mysql', 'username' => 'root', 'host' => 'localhost', 'database' => 'opensga']
        // array("php_version" => "xxx")
        )->execute();

        debug($resultado);

    }

}

     