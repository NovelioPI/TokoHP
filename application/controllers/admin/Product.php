<?php

class Product extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/product.php');
	}
}