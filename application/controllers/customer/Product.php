<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_product');
        $this->load->model('m_order');
        $this->load->model('M_checkouts');
    }

    public function index()
    {
        $data['title'] = 'Produk Dijual';
        $data['products'] = $this->m_product->get_all_product();

        return $this->load->view('customer/product_list', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Produk';
        $data['product'] = $this->m_product->get_product_detail($id);

        $userId = $this->session->userdata('id');
        $order = $this->m_order->get_order_detail($id, $userId);
        $checkout = $this->M_checkouts->getBuyerCheckout($userId, $id);

        isset($order) ? $data['alreadyOrder'] = true : $data['alreadyOrder'] = false;
        if (isset($checkout)) $data['alreadyCheckout'] = true;
        return $this->load->view('customer/product_detail', $data);
    }
}