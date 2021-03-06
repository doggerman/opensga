<?php

App::uses('AppController', 'Controller');

/**
 * BolsaBolsas Controller
 *
 * @property BolsaBolsa $BolsaBolsa
 */
class BolsaBolsasController extends AppController
{


//    public $helpers = 
    /**
     * index method
     *
     * @return void
     */
    // var $components = array("RequestHandler");

    public function index()
    {
        $this->BolsaBolsa->recursive = 0;
        $this->set('bolsaBolsas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        $this->BolsaBolsa->id = $id;
        if (!$this->BolsaBolsa->exists()) {
            throw new NotFoundException(__('Invalid bolsa bolsa'));
        }
        $this->set('bolsaBolsa', $this->BolsaBolsa->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->BolsaBolsa->create();
            if ($this->BolsaBolsa->save($this->request->data)) {
                $this->Session->setFlash(__('<div class="alerta alert-success">Bolsa gravada com sucesso!</div>'));
                $this->redirect(['action' => 'index']);
            } else {
                $this->Session->setFlash(__('<div class="alerta alert-danger">A bolsa nao foi atribuida. Por favor, Tente novamente.</div>'));
            }
        }
        $alunos = $this->BolsaBolsa->Aluno->find('list');
        $bolsaCandidaturas = $this->BolsaBolsa->BolsaPedido->find('list');
        $anolectivos = $this->BolsaBolsa->AnoLectivo->find('list');
        $bancos = $this->BolsaBolsa->Banco->find('list');
        $bolsaFonteBolsas = $this->BolsaBolsa->BolsaFonteBolsa->find('list');
        $bolsaCriadorContas = $this->BolsaBolsa->BolsaCriadorContum->find('list');
        $bolsaEstadoBolsas = $this->BolsaBolsa->BolsaEstadoBolsa->find('list');
        $bolsaResultados = $this->BolsaBolsa->BolsaResultado->find('list');
        $this->set(compact('alunos', 'bolsaCandidaturas', 'anolectivos', 'bancos', 'bolsaFonteBolsas',
            'bolsaCriadorContas', 'bolsaEstadoBolsas', 'bolsaResultados'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->BolsaBolsa->id = $id;
        if (!$this->BolsaBolsa->exists()) {
            throw new NotFoundException(__('Invalid bolsa bolsa'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->BolsaBolsa->save($this->request->data)) {
                $this->Session->setFlash(__('The bolsa bolsa has been saved'));
                $this->redirect(['action' => 'index']);
            } else {
                $this->Session->setFlash(__('The bolsa bolsa could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->BolsaBolsa->read(null, $id);
        }
        $alunos = $this->BolsaBolsa->Aluno->find('list');
        $bolsaCandidaturas = $this->BolsaBolsa->BolsaPedido->find('list');
        $anolectivos = $this->BolsaBolsa->AnoLectivo->find('list');
        $bancos = $this->BolsaBolsa->Banco->find('list');
        $bolsaFonteBolsas = $this->BolsaBolsa->BolsaFonteBolsa->find('list');
        $bolsaCriadorContas = $this->BolsaBolsa->BolsaCriadorContum->find('list');
        $bolsaEstadoBolsas = $this->BolsaBolsa->BolsaEstadoBolsa->find('list');
        $bolsaResultados = $this->BolsaBolsa->BolsaResultado->find('list');
        $this->set(compact('alunos', 'bolsaCandidaturas', 'anolectivos', 'bancos', 'bolsaFonteBolsas',
            'bolsaCriadorContas', 'bolsaEstadoBolsas', 'bolsaResultados'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->BolsaBolsa->id = $id;
        if (!$this->BolsaBolsa->exists()) {
            throw new NotFoundException(__('Invalid bolsa bolsa'));
        }
        if ($this->BolsaBolsa->delete()) {
            $this->Session->setFlash(__('Bolsa bolsa deleted'));
            $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash(__('Bolsa bolsa was not deleted'));
        $this->redirect(['action' => 'index']);
    }

    public function exportar_bolseiros_ano_ingresso($anoIngresso = null)
    {
        if ($anoIngresso == null) {
            $anoIngresso = Configure::read('OpenSGA.ano_lectivo');
        }

        $this->loadModel('BolsaTemporaria');
        $this->BolsaTemporaria->contain([
            'BolsaTipoBolsa',
        ]);
        $bolsas = $this->BolsaTemporaria->find('all');
        foreach ($bolsas as $k => $bolsa) {
            $this->BolsaBolsa->Aluno->contain([
                'Entidade' => [
                    'ProvinciaNascimento',
                    'Genero',
                ],
                'Curso',
            ]);
            $aluno = $this->BolsaBolsa->Aluno->find('first', [
                'conditions' => [
                    'Aluno.ano_ingresso' => $anoIngresso,
                    'Aluno.codigo' => $bolsa['BolsaTemporaria']['numero_estudante'],
                ],
            ]);
            if (!empty($aluno)) {
                $bolsas[$k]['Aluno'] = $aluno['Aluno'];
                $bolsas[$k]['Entidade'] = $aluno['Entidade'];
                $bolsas[$k]['Curso'] = $aluno['Curso'];
            }
        }


        $this->set(compact('bolsas'));
    }

    public function exportar_bolseiros_ano_ingresso_escolas($anoIngresso = null)
    {
        if ($anoIngresso == null) {
            $anoIngresso = Configure::read('OpenSGA.ano_lectivo');
        }

        $this->loadModel('BolsaTemporaria');
        $this->BolsaTemporaria->contain([
            'BolsaTipoBolsa',
            'Candidatura' => ['Genero'],
        ]);
        $bolsas = $this->BolsaTemporaria->find('all');
        foreach ($bolsas as $k => $bolsa) {
            $this->BolsaBolsa->Aluno->contain([
                'Entidade' => [
                    'ProvinciaNascimento',
                    'Genero',
                ],
                'Curso',
            ]);
            $aluno = $this->BolsaBolsa->Aluno->find('first', [
                'conditions' => [
                    'Aluno.ano_ingresso' => $anoIngresso,
                    'Aluno.codigo' => $bolsa['BolsaTemporaria']['numero_estudante'],
                ],
            ]);
            if (!empty($aluno)) {
                unset($bolsas[$k]);
            }
        }


        $this->set(compact('bolsas'));
    }

    public function atribuir_bolsas()
    {
        $this->loadModel('Cidade');
        $this->loadModel('Aluno');
        $this->loadModel('BolsaTemporaria');
        $this->loadModel('Candidatura');
        $this->loadModel('Curso');
        $this->loadModel('Genero');
        //Requisicao de busca de dados...
        if ($this->request->is('POST')) {


            $numero_candidato = $this->request->data('numero');
            $nome_candidato = $this->request->data('nome');
            $apelido_candidato = $this->request->data('apelido');

            $conditions = [];

            if ($numero_candidato != '') {
                $conditions['Candidatura.numero_estudante'] = $numero_candidato;
            } else {
                $conditions['Candidatura.nomes LIKE'] = '%' . $nome_candidato . '%';
                $conditions['Candidatura.apelido LIKE'] = '%' . $apelido_candidato . '%';
            }


            // $conditions['Candidatura.estado_candidatura_id'] = array(2, 3);
            $conditions['Candidatura.ano_lectivo_admissao'] = 2015;
            $option = ['conditions' => $conditions];
            $candidatura = $this->Candidatura->find('first', $option);

            if (!empty($candidatura)) {


                //Buscando o curso
                $options_Curso = ['conditions' => ['Curso.' . $this->Curso->primaryKey => $candidatura['Candidatura']['curso_id']]];
                $curso = $this->Curso->find('first', $options_Curso);

                //Buscando cidade

                //Buscando o genero
                $options_Genero = ['conditions' => ['Genero.' . $this->Genero->primaryKey => $candidatura['Candidatura']['genero_id']]];
                $genero = $this->Genero->find('first', $options_Genero);
                $genero1 = [];
                if (empty($genero)) {
                    $genero1 = ['Genero' => ['name' => 'Indefinido']];
                } else {
                    $genero1 = $genero;
                }

                $array = ['candidatos' => $candidatura, 'curso' => $curso, 'genero' => $genero1];
            } else {
                $array = [
                    'invalido' => 'Invalido',
                    'candidatura' => $numero_candidato . ' ' . $nome_candidato . ' ' . $apelido_candidato,
                ];
            }


            return new CakeResponse(['body' => json_encode($array)]);

        }


        $this->BolsaTemporaria->contain('Curso');
        $cursos = $this->BolsaTemporaria->find('list',
            ['fields' => ['BolsaTemporaria.curso_id', 'Curso.name'], 'order' => 'Curso.name']);
        $bolsas = [];
        foreach ($cursos as $k => $v) {
            $this->BolsaTemporaria->contain('BolsaTipoBolsa');
            $bolsa = $this->BolsaTemporaria->find('all',
                ['conditions' => ['curso_id' => $k], 'order' => ['apelido', 'nomes']]);
            $bolsas[$v] = $bolsa;
        }


        $bolsaTipoBolsa = $this->BolsaBolsa->BolsaTipoBolsa->find('all');
        $bolsaFonteBolsa = $this->BolsaBolsa->BolsaFonteBolsa->find('all');
        $cidade = $this->Cidade->find('all');

        $this->set(compact('bolsaFonteBolsa', 'bolsaTipoBolsa', 'cidade', 'bolsas'));


    }


    public function renovar_bolsas()
    {

    }


}
