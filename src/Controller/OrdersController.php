<?php
namespace App\Controller;

class OrdersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); 
		// Include the FlashComponent
		$this->set(compact('orders'));
        $order = $this->Orders->newEntity();
        $this->$order;
		
    }
	 public function index()
    {
         $this->set('orders', $this->Orders->find('all'));
		  $user = $this->Auth->user();
        if (!parent::isAuthorized($user)) {
            $session = $this->request->session();
            $customer_session = $session->read('customer_id');
            if ($this->Orders->isOwnedBy($customer_session)) {
                $this->set('completed_orders', $this->Orders->find()->where(['completed' => 1, 'customer' => $customer_session]));
            $this->set('orders', $this->Orders->find()->where(['completed' => 0, 'customer' => $customer_session]));
            } else {
                $this->set('completed_orders', []);
                $this->set('orders', []);
            }
        } else {
            $this->set('completed_orders', $this->Orders->find()->where(['completed' => 1]));
            $this->set('orders', $this->Orders->find()->where(['completed' => 0]));
        }
    }
	public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [] ]);
        $this->set(compact('order'));
		  $this->set('_serialize', ['order']);
    }
	public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
			$session = $this->request->session();
			  
              			  $this->request->data['Order']['user_id'] = $this->Auth->user('id');
$order = $this->Orders->patchEntity($order, $this->request->data);
            
            $order = $this->calculateTotal($order);    
	if ($this->Orders->save($order)) {
                $this->Flash->success(__('Your order has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your order.'));
        }
        $this->set('order', $order);
    }
	private function addToppings($order){
        //adding toppings as a string
        $toppings = '';
        
        if (isset($this->request->data['toppings'])){
            $count = sizeof($this->request->data['toppings']);
            
            foreach ($this->request->data['toppings'] as $row) {
                if (!empty($toppings)){
                    $toppings = $toppings.', ';
                }
                $toppings = $toppings.$row;
            }
            
            $order->toppings = $toppings;
            
            if ($count > 1){
                $order->total = $order->total + ($count * 0.5);
            }
        }
        
         return $order;
    }
	 function calculateTotal($order){
		$total = 0;
		
        $pizzaSize = $order->pizzaSize;	
		switch ($pizzaSize){
			case "Small":
				$total += 5;
				break;
			case "Med":
				$total += 10;
				break;
			case "Large":
				$total += 15;
				break;
			case "XL":
				$total += 20;
				break;			
        }
        
        if ($order->crustType === 'Stuffed'){
            $total += 2;
        }
        
        $order->total = $total;
        
        //add toppings
        $order = $this->addToppings($order);
        
        return $this->calculateProvinceTax($order);
        
    }
    
    function calculateProvinceTax($order){
        $session = $this->request->session();
        $province = $session->read('customer_province');
        $total = $order->total;
        echo $total;
        $tax = 1;
        switch ($province){
            case 'QC':
                $tax = 14.975;
				break;
             case 'MB':
                $tax = 8;
				break;
             case 'ON':
                $tax = 13;
				break;
             case 'SK':
                $tax = 10;
				break;
             default:
                $tax = 1;
        }
        
        $total = $total * ((100+$tax)/100);
        $order->total = $total;
        
        return $order;
    }
	public function edit($id = null)
{
    $order = $this->Orders->get($id, ['contain' => []]);
		if ($this->request->is(['post', 'put'])) {
        $this->Orders->patchEntity($order, $this->request->data);
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('Your order has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
		else {
        $this->Flash->error(__('Unable to update your order.'));
    }
		}
    $this->set('order', $order);
	$this->set('_serialize', ['order']);
}
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);

    $order = $this->Orders->get($id);
    if ($this->Orders->delete($order)) {
        $this->Flash->success(__('The order with id: {0} has been deleted.', h($id)));
        
    }
	else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	 public function complete($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        $order = $this->Orders->patchEntity($order, $this->request->data);
        $order->completed = 1;
        echo $order;
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('The order has been completed.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The order could not be saved.'));
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }
public function isAuthorized($user)
{
    // All registered users can add articles
    if ($this->request->action === 'add') {
        return true;
    }

    // The owner of an article can edit and delete it
    if (in_array($this->request->action, ['edit', 'delete'])) {
        $orderId = (int)$this->request->params['pass'][0];
        if ($this->Orders->isOwnedBy($orderId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}

}
?>