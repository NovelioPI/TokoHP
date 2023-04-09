<?php

class Checkouts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_checkouts');
    }

    public function index()
    {
        $data['checkouts'] = $this->M_checkouts->getAll();
        
		$this->load->view('admin/users/checkouts', $data);
    }

    public function insert()
    {
        $listProductId = $this->input->post('product');

        $buyerId = $this->session->userdata('id');

        foreach ($listProductId as $productId) {
            $this->M_checkouts->insertCheckout([
                'product_id' => $productId,
                'user_id' => $buyerId
            ]);
        }

        redirect('customer/basket');
    }
}