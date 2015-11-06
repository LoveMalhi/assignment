<?php
namespace App\Controller;

class OrdersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	 public function index()
    {
         $this->set('orders', $this->Orders->find('all'));
    }
	public function view($id = null)
    {
        $order = $this->Orders->get($id);
        $this->set(compact('order'));
    }
	public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('Your order has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your order.'));
        }
        $this->set('order', $order);
    }
	public function edit($id = null)
{
    $order = $this->Orders->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->Orders->patchEntity($order, $this->request->data);
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('Your order has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your order.'));
    }

    $this->set('order', $order);
}
public function delete($id)
{
    $this->request->allowMethod(['post', 'delete']);

    $order = $this->Orders->get($id);
    if ($this->Orders->delete($order)) {
        $this->Flash->success(__('The order with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'index']);
    }
}
}
?>