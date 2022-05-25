<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

	public function index()
	{
		//Initialize
		$data = array();
		$data['cartBarang'] = $this->cart->contents();

		$this->load->view('market/cart', $data);
	}

	public function updateItemQty()
	{
		$update = 0;

		// Get cart item info
		$rowid = $this->input->get('rowid');
		$qty = $this->input->get('qty');

		// Update item in the cart
		if (!empty($rowid) && !empty($qty)) {
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);
			$update = $this->cart->update($data);
		}

		// Return response
		echo $update ? 'ok' : 'err';
	}

	public function removeItem($rowid)
	{
		// Remove item from cart
		$remove = $this->cart->remove($rowid);

		// Redirect to the cart page
		redirect('cart/');
	}
}
