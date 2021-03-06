<?php

App::uses('AppController', 'Controller');

/**
 * UnidadeOrganicas Controller
 *
 * @property UnidadeOrganica $UnidadeOrganica
 */
class UnidadeOrganicasController extends AppController
{

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {

        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->set('unidadeOrganicas', $this->paginate());
    }

    public function faculdade_index()
    {

        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->set('unidadeOrganicas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function ver_unidade_organica($id = null)
    {
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        $this->UnidadeOrganica->contain();
        $unidadeOrganica = $this->UnidadeOrganica->read(null, $id);
        if ($unidadeOrganica['UnidadeOrganica']['tipo_unidade_organica_id'] == 1) {
            $this->redirect(['action' => 'ver_faculdade', $unidadeOrganica['UnidadeOrganica']['id']]);
        }

    }

    public function ver_direccao($id = null)
    {
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        $this->UnidadeOrganica->contain([
            'ParentUnidadeOrganica',
            'TipoUnidadeOrganica',
            'AreaAcademica',
            'AreaUnidade',
            'Director' => [
                'Entidade',
            ],
        ]);
        $this->set('unidadeOrganica', $this->UnidadeOrganica->read(null, $id));
    }

    public function ver_faculdade($id = null)
    {
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        $this->UnidadeOrganica->contain([
            'ParentUnidadeOrganica',
            'TipoUnidadeOrganica',
            'AreaAcademica',
            'AreaUnidade',
            'Director' => [
                'Entidade',
            ],
        ]);
        $this->set('unidadeOrganica', $this->UnidadeOrganica->read(null, $id));
    }

    public function ver_departamento($id = null)
    {
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        $this->UnidadeOrganica->contain([
            'ParentUnidadeOrganica',
            'TipoUnidadeOrganica',
            'AreaAcademica',
            'AreaUnidade',
            'Director' => [
                'Entidade',
            ],
        ]);
        $this->set('unidadeOrganica', $this->UnidadeOrganica->read(null, $id));
    }

    public function ver_seccao($id = null)
    {
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        $this->UnidadeOrganica->contain([
            'ParentUnidadeOrganica',
            'TipoUnidadeOrganica',
            'AreaAcademica',
            'AreaUnidade',
            'Director' => [
                'Entidade',
            ],
        ]);
        $this->set('unidadeOrganica', $this->UnidadeOrganica->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function nova_unidade($parent_id = null)
    {
        if ($this->request->is('post')) {

            //Se estivermos a registar sub_unidade
            if ($parent_id != null) {

                $this->request->data['UnidadeOrganica']['parent_id'] = $parent_id;
                $parente = $this->UnidadeOrganica->findById($parent_id);
                $this->request->data['UnidadeOrganica']['nivel_unidade'] = $parente['UnidadeOrganica']['nivel_unidade'] + 1;
            } else {
                $this->request->data['UnidadeOrganica']['nivel_unidade'] = 1;
            }
            $this->UnidadeOrganica->create();
            if ($this->UnidadeOrganica->save($this->request->data)) {
                $this->Session->setFlash(__('Unidade Orgânica Registrada com Sucesso'), 'default',
                    ['class' => 'alert success']);
                $this->redirect(['action' => 'index']);
            } else {
                $this->Session->setFlash(__('Problemas ao Registrar Unidade Orgânica'), 'default',
                    ['class' => 'alert error']);
            }
        }
        $tipoUnidadeOrganicas = $this->UnidadeOrganica->TipoUnidadeOrganica->find('list');
        $areaAcademicas = $this->UnidadeOrganica->AreaAcademica->find('list');
        $areaUnidades = $this->UnidadeOrganica->AreaUnidade->find('list');
        $parentUnidadeOrganicas = $this->UnidadeOrganica->ParentUnidadeOrganica->find('list');

        $directors = $this->UnidadeOrganica->Director->listaFuncionarios('all');
        $this->set(compact('tipoUnidadeOrganicas', 'areaAcademicas', 'areaUnidades', 'parentUnidadeOrganicas',
            'directors'));
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
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Unidade Orgânica Inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UnidadeOrganica->save($this->request->data)) {
                $this->Session->setFlash(__('A Unidade Orgânica foi editada com sucesso'), 'default',
                    ['class' => 'alert_success']);
                $this->redirect(['action' => 'index']);
            } else {
                $this->Session->setFlash(__('Problemas ao editar Unidade Orgânica'), 'default',
                    ['class' => 'alert_error']);
            }
        } else {
            $this->request->data = $this->UnidadeOrganica->read(null, $id);
        }
        $tipoUnidadeOrganicas = $this->UnidadeOrganica->TipoUnidadeOrganica->find('list');
        $areaAcademicas = $this->UnidadeOrganica->AreaAcademica->find('list');
        $areaUnidades = $this->UnidadeOrganica->AreaUnidade->find('list');
        $parentUnidadeOrganicas = $this->UnidadeOrganica->ParentUnidadeOrganica->find('list');
        $directors = $this->UnidadeOrganica->Director->listaFuncionarios('all');
        $this->set(compact('tipoUnidadeOrganicas', 'areaAcademicas', 'areaUnidades', 'parentUnidadeOrganicas',
            'directors'));
    }


    /**
     * @todo Implementar se necessario
     * @param type $action_seguinte
     */
    public function pesquisa_entidade_action($action_seguinte)
    {

    }

    public function definir_director_faculdade($unidade_organica_id)
    {

        $unidadeOrganica = $this->UnidadeOrganica->findById($unidade_organica_id);
        $this->UnidadeOrganica->Funcionario->contain([
            'UnidadeOrganica',
            'Entidade',
            'Docente',
        ]);
        $sub_unidades = $this->UnidadeOrganica->children($unidade_organica_id);
        $sub_unidades_ids = Hash::extract($sub_unidades, '{n}.UnidadeOrganica.id');
        $sub_unidades_ids[] = $unidade_organica_id;
        debug($sub_unidades_ids);
        $funcionarios = $this->UnidadeOrganica->Funcionario->find('all',
            ['conditions' => ['Funcionario.unidade_organica_id' => $sub_unidades_ids]]);
        debug(count($funcionarios));


        $this->set(compact('funcionarios', 'unidadeOrganica'));
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
        $this->UnidadeOrganica->id = $id;
        if (!$this->UnidadeOrganica->exists()) {
            throw new NotFoundException(__('Invalid unidade organica'));
        }
        if ($this->UnidadeOrganica->delete()) {
            $this->Session->setFlash(__('Unidade organica deleted'));
            $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash(__('Unidade organica was not deleted'));
        $this->redirect(['action' => 'index']);
    }

    public function direccoes()
    {
        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->paginate = [
            'conditions' => [
                'UnidadeOrganica.tipo_unidade_organica_id' => 4,
            ],
        ];
        $this->set('unidadeOrganicas', $this->paginate());
    }

    public function faculdades()
    {
        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->paginate = [
            'conditions' => [
                'UnidadeOrganica.tipo_unidade_organica_id' => 1,
            ],
        ];
        $this->set('unidadeOrganicas', $this->paginate());
    }

    public function departamentos()
    {
        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->paginate = [
            'conditions' => [
                'UnidadeOrganica.tipo_unidade_organica_id' => 2,
            ],
        ];
        $this->set('unidadeOrganicas', $this->paginate());
    }

    public function seccoes()
    {
        $this->UnidadeOrganica->contain([
            'TipoUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
            'ParentUnidadeOrganica' => [
                'fields' => ['id', 'name'],
            ],
        ]);
        $this->paginate = [
            'conditions' => [
                'UnidadeOrganica.tipo_unidade_organica_id' => 3,
            ],
        ];
        $this->set('unidadeOrganicas', $this->paginate());
    }


}

