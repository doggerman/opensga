<?php
	App::uses('AppController', 'Controller');

	/**
	 * Months Controller
	 *
	 * @property Month $Month
	 */
	class MonthsController extends AppController
	{


		/**
		 * index method
		 *
		 * @return void
		 */
		public function index()
		{
			$this->Month->recursive = 0;
			$this->set('months', $this->paginate());
		}

		/**
		 * view method
		 *
		 * @param string $id
		 * @return void
		 */
		public function view($id = null)
		{
			$this->Month->id = $id;
			if (!$this->Month->exists()) {
				throw new NotFoundException(__('Invalid month'));
			}
			$this->set('month', $this->Month->read(null, $id));
		}

		/**
		 * add method
		 *
		 * @return void
		 */
		public function add()
		{
			if ($this->request->is('post')) {
				$this->Month->create();
				if ($this->Month->save($this->request->data)) {
					$this->Session->setFlash(__('The month has been saved'));
					$this->redirect(['action' => 'index']);
				} else {
					$this->Session->setFlash(__('The month could not be saved. Please, try again.'));
				}
			}
		}

		/**
		 * edit method
		 *
		 * @param string $id
		 * @return void
		 */
		public function edit($id = null)
		{
			$this->Month->id = $id;
			if (!$this->Month->exists()) {
				throw new NotFoundException(__('Invalid month'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Month->save($this->request->data)) {
					$this->Session->setFlash(__('The month has been saved'));
					$this->redirect(['action' => 'index']);
				} else {
					$this->Session->setFlash(__('The month could not be saved. Please, try again.'));
				}
			} else {
				$this->request->data = $this->Month->read(null, $id);
			}
		}

		/**
		 * delete method
		 *
		 * @param string $id
		 * @return void
		 */
		public function delete($id = null)
		{
			if (!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->Month->id = $id;
			if (!$this->Month->exists()) {
				throw new NotFoundException(__('Invalid month'));
			}
			if ($this->Month->delete()) {
				$this->Session->setFlash(__('Month deleted'));
				$this->redirect(['action' => 'index']);
			}
			$this->Session->setFlash(__('Month was not deleted'));
			$this->redirect(['action' => 'index']);
		}
	}
