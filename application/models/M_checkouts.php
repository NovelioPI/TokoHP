<?php

class M_checkouts extends CI_Model
{
	private $_table = "checkouts";

    public function insertCheckout($data)
    {
        $this->db->insert($this->_table, $data);
    }

    public function getBuyerCheckouts($buyerId)
    {
        return $this->db
            ->select(['product.id', 'product.name AS product_name', 'product.price', 'product.image', 'user.name AS admin_name', 'checkouts.admin_confirmation', 'checkouts.user_confirmation'])
            ->from('checkouts')
            ->join('product', 'product.id = checkouts.product_id')
            ->join('user', 'user.id = product.admin_id')
            ->where('checkouts.user_id', $buyerId)
            ->get()
            ->result_array();
    }

    public function getBuyerCheckout($buyerId, $productId)
    {
        return $this->db
            ->select(['product.id', 'product.name AS product_name', 'product.price', 'product.image', 'user.name AS admin_name', 'checkouts.admin_confirmation', 'checkouts.user_confirmation'])
            ->from('checkouts')
            ->join('product', 'product.id = checkouts.product_id')
            ->join('user', 'user.id = product.admin_id')
            ->where('checkouts.user_id', $buyerId)
            ->where('checkouts.product_id', $productId)
            ->get()
            ->result_array();
    }
}