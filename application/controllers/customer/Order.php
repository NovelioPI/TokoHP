<?php

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order');
    }

    public function index()
    {
        $action = $this->input->post('order');

        if ($action == 'insert') {
            $this->insertOrder();
        } else if ($action == 'delete') {
            $this->deleteOrder();
        } else if ($action == 'checkout') {
            $this->checkoutOrder();
        }
    }

    public function insertOrder()
    {
        $productId = $this->input->post('product');

        $buyerId = $this->session->userdata('id');

        $data = [
            'product_id' => $productId,
            'buyer_id' => $buyerId
        ];

        $this->m_order->insert_order($data);

        redirect('customer/product/' . $productId);
    }

    public function deleteOrder()
    {
        $productId = $this->input->post('product');

        $buyerId = $this->session->userdata('id');

        $data = [
            'product_id' => $productId,
            'buyer_id' => $buyerId
        ];

        $this->m_order->delete_order($data);

        redirect('customer/product/' . $productId);
    }

    public function checkoutOrder()
    {
        $listProductId = $this->input->post('product');

        $buyerId = $this->session->userdata('id');

        foreach ($listProductId as $productId) {
            $this->m_order->update_order(['status' => 1], ['product_id' => $productId, 'buyer_id' => $buyerId]);
        }

        redirect('customer/basket');
    }
}