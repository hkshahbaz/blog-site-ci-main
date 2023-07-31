<?php 

class Admin extends MY_Controller 
{
		public function dashboard()
		{	
			$config = [
				//three parameters are must for pagination
				'base_url' => base_url('index.php/admin/dashboard'),
				'per_page' => 5,
				'total_rows' => $this->articles->num_rows(),
				'full_tag_open' => "<ul class='pagination'>",
				'full_tag_close' => "</ul>",
				'first_tag_open' => "<li class='page-item'>",
				'first_tag_close' => "</li>",
				// 'first_link' => TRUE,
				// 'last_link' => TRUE,
				'prev_link' => '< Previous',
				'next_link' => 'Next >',
				'last_tag_open' => "<li class='page-item'>",
				'last_tag_close' => "</li>",
				'next_tag_open' => "<li class='page-item page-link'>",
				'next_tag_close' => "</li>",
				'prev_tag_open' => "<li class='page-item page-link'>",
				'prev_tag_close' => "</li>",
				'num_tag_open' => "<li class='page-item page-link'>",
				'num_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active'><a class='page-link'>",
				'cur_tag_close' => '</a></li>',
			];
			$this->pagination->initialize($config); //receives array of attributes
			$articles = $this->articles->article_list($config['per_page'],$this->uri->segment(4)); // segement is name of each oject in url with slashes
			$this->load->view('admin/dashboard',['articles'=>$articles]); //passing 											     second parameter articles to 											view using name of  first parameter 
		}
		public function add_article()
		{
			$this->load->view('admin/add_article');
		}
		public function store_article()
		{
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_article_rules')) 
									// setting  validation rules using config file
		{
			$post = $this->input->post();
			unset($post['submit']); // function used to unset submit value from													array($post) to insert data
			$this->flashAndRedirect($this->articles->add_article($post),
								"Article Added Successfully",
								"Article Failed to Add.Please Try Again.");
			
			}
			else
			{
				//echo validation_errors();
				$this->load->view('admin/add_article');	
			}
		}
		public function edit_article($article_id)
		{
			$this->load->model('article_model','find');
			$article = $this->find->find_article($article_id);

			$this->load->view('admin/edit_article',['article' => $article]);
			//passing data to view using second parameter with key.
		}
		public function update_article($article_id) //receving id using get
		{
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_article_rules')) 
									// setting  validation rules using config file
		{
			$post = $this->input->post();
			unset($post['submit']); // function used to unset submit value from													array($post) to insert data
			$this->flashAndRedirect($this->articles->update_article($article_id,$post),
								"Article Updated Successfully",
								"Article Failed to Update.Please Try Again.");
			}
			else
			{
				//echo validation_errors();
				//redirect('index.php/admin/edit_article');	
				$this->edit_article($article_id);		
			}

		}
		public function delete_article()
		{
			$article_id = $this->input->post(['article_id']);
			$this->flashAndRedirect($this->articles->delete_article($article_id),
								"Article Deleted Successfully",
								"Article Failed To Delete.Please Try Again.");
		}
		public function __construct()
		{
			parent:: __construct(); //method of creating construter
			$this->load->model('article_model','articles'); // load in every function
			if (!$this->session->userdata('id')) //if user is not logged in than redirect 
			{
				return redirect('index.php/login');
			}
		}
		private function flashAndRedirect($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('index.php/admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('index.php/admin/dashboard');
			}
		}
}