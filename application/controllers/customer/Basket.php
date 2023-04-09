<?php

class Basket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order');
        $this->load->model('M_checkouts');
    }

    public function index()
    {
        $userId = $this->session->userdata('id');

        $data['title'] = 'Keranjang';
        $data['orders'] = $this->m_order->get_order_buyer($userId);
        $data['checkouts'] = $this->M_checkouts->getBuyerCheckouts($userId);

        return $this->load->view('customer/basket', $data);
    }
}