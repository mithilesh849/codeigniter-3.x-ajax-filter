<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * default method of controller
	 */
	public function index()
	{
		$data['products'] = $this->db->query("select * from products ")->result_array();

		$this->load->view('products/index',$data);

	}

	public function product_ajax()
	{
		
	 $this->load->library('pagination');	

	  $limit = 5;
	  $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
	    // condtional query to get number of rows
	 	$this->db->select('p.*','pi.available_in_stock');
		$this->db->from('products as p');

		if($_REQUEST['product_name'] !="")
		{ 
			$this->db->like('p.name',$_REQUEST['product_name']);
		}
		if($_REQUEST['product_category'] !="")
		{ 
			$this->db->where('p.category = ',$_REQUEST['product_category']);
		}
		if($_REQUEST['product_status'] !="")
		{ 
			$this->db->where('p.status = ',$_REQUEST['product_status']);
		}
		if($_REQUEST['product_stock_status'] !="")
		{ 		
			$this->db->join('product_inventory as pi','pi.product_id = p.id');
			if($_REQUEST['product_stock_status'] =='out_of_stock'){							
	    	    $this->db->where('pi.available_in_stock   < 1');
			}			
			if($_REQUEST['product_stock_status'] =='in_stock'){							
	    	    $this->db->where('pi.available_in_stock  > 0');
			}
	    }

		//total rows
		$total_rows = $this->db->count_all_results();
		
		$config['base_url'] 		= site_url('product/product_ajax/');
		$config['total_rows'] 		= $total_rows;
		$config['per_page'] 		= $limit;
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open'] 	= '<li><a href="" class="current_page">';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_link'] 		= 'Next';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= 'Previous';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		
		$this->pagination->initialize($config);

		//finally get conditional data 
		// echo $_REQUEST['product_stock_status']; die();
		$this->db->select('p.*','pi.available_in_stock');
		$this->db->from('products as p');

		if($_REQUEST['product_name'] !="")
		{ 
			$this->db->like('p.name',$_REQUEST['product_name']);
		}
		if($_REQUEST['product_category'] !="")
		{ 
			$this->db->where('p.category = ',$_REQUEST['product_category']);
		}
		if($_REQUEST['product_status'] !="")
		{ 
			$this->db->where('p.status = ',$_REQUEST['product_status']);
		}

		if($_REQUEST['product_stock_status'] !="")
		{ 		
			$this->db->join('product_inventory as pi','pi.product_id = p.id');

			if($_REQUEST['product_stock_status'] =='out_of_stock'){		

	    	    $this->db->where('pi.available_in_stock   < 1');
			}
			//
			if($_REQUEST['product_stock_status'] =='in_stock'){							
	    	    $this->db->where('pi.available_in_stock  > 0');
			}
	    }

	    $this->db->limit($limit, $offset);
		
		$data['products'] = $this->db->get()->result_array();

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('products/ajax', $data);

	}


}
