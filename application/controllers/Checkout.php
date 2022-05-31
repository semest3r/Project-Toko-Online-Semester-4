<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    //menampilkan halaman Checkout
    function index(){
        // Redirect jika Cart kosong
        if($this->cart->total_items() <= 0){
            redirect('market_produk/');
        }
        
        $custData = $data = array();
        
        // Jika Cart/Order sudah dimasukkan
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required',['requerd' => 'Nama Pembeli Harus Diisi']);
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email',['requerd' => 'Email Harus Diisi', 'valid_email' => 'Email Tidak Valid']);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required',['requerd' => 'Alamat Harus diisi']);
            $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric|min_length[8]|max_length[12]',['requerd' => 'Notelp harud diisi', 'numeric' => 'Notelp tidak valid', 'max_length' => 'maksimal 12 digit', 'min_length' => 'minimal 8 digit']);
            
            // Prepare customer data
            $custData = array(
                'name'   => strip_tags($this->input->post('name')),
                'email'  => strip_tags($this->input->post('email')),
                'alamat' => strip_tags($this->input->post('alamat')),
                'notelp' => strip_tags($this->input->post('notelp')),
                //'status' => strip_tags($this->input->post('status'))
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert customer data
                $insert = $this->Model_market->simpanPembeli($custData);
                
                // Check customer data insert status
                if($insert){
                    // Insert order
                    $order = $this->placeOrder($insert);
                    
                    // If the order submission is successful
                    if($order){
                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect('Checkout/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed, please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        // Customer data
        $data['custData'] = $custData;
        
        // menampilkan data cart dari session
        $data['cartItems'] = $this->cart->contents();
        
        // Pass products data to the view
        $this->load->view('market/checkout', $data);
    }

    function placeOrder($custID){
        // Insert order data
        $ordData = array(
            'id_pembeli' => $custID,
            'id_user' => '1',
            'status' => '1',
            'total_harga' => $this->cart->total()
        );
        $insertOrder = $this->Model_market->insertOrder($ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['id_transaksi'] = $insertOrder;
                $ordItemData[$i]['id_barang'] = $item['id'];
                $ordItemData[$i]['total_Barang'] = $item['qty'];
                $ordItemData[$i]['total_harga_barang'] = $item["subtotal"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->Model_market->insertOrderItems($ordItemData);
                
                if($insertOrderItems){

                    
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }

    function orderSuccess($ordID){
        // Fetch order data from the database
        $transaksi = $this->Model_market->getOrder($ordID);
        $data['transaksi'] = $transaksi;
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => 'f5afd82df79411',
            'smtp_pass' => 'a5620976a43ac0',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('TokoElectrik@test.test');
        $this->email->to($transaksi['email']);
        $this->email->subject('Update Transaksi');
        $this->email->message($this->load->view('email_template', $data, true));
        $this->email->set_mailtype('html');
        if ($this->email->send()) {
            $this->load->view('market/checkout_sukses');
        } else {
            show_error($this->email->print_debugger());
        }
    }
    

    //Tidak dipakai hanya untuk percobaan
    public function Order()
    
    {
        //mengambil session data cart
        $cartItems = $this->cart->contents();

        //cart items
        $ordItemdata = array();
        $i = 0;
        foreach($cartItems as $item) {
            $ordItemdata[$i]['id_barang'] = $item['id'];
            $ordItemdata[$i]['total_barang'] = $item['qty'];
            $ordItemdata[$i]['total_harga_barang'] = $item['subtotal'];

        }
        $this->Model_market->insertOrderItems($ordItemdata);
        $this->cart->destroy();
        redirect('Checkout');

    }

    
}