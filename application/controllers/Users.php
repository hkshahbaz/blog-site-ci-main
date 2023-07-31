<?php

class Users extends MY_Controller 
{
	public function index()
		{
			$this->load->model('article_model','articles');
			$config = [//three parameters are must for pagination
				'base_url' => base_url('index.php/users/index'),
				'per_page' => 5,
				'total_rows' => $this->articles->all_articles(),
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
			$articles = $this->articles->all_article_list($config['per_page'],$this->uri->segment(3));
			$this->load->view('public/articles_list',compact('articles')); //php method to pass value as an array to view
		}
		public function search()
		{
			$this->form_validation->set_rules('query','Query','required');
			if(!$this->form_validation->run())
			{
				$this->index();
			}
			else {
				$query = $this->input->post('query');
				return redirect("index.php/users/search_results/$query"); // passing var to func.
			}
		}
		public function search_results( $query)
		{
			$this->load->model('article_model','articles');
			$config = [//three parameters are must for pagination
				'base_url' => base_url("index.php/users/search_results/$query"),
				'per_page' => 5,
				'total_rows' => $this->articles->count_search_results($query),
				'full_tag_open' => "<ul class='pagination'>",
				'full_tag_close' => "</ul>",
				'first_tag_open' => "<li class='page-item page-link'>",
				'first_tag_close' => "</li>",
				// 'first_link' =>"First",
				// 'last_link' => TRUE,
				'prev_link' => '< Previous',
				'next_link' => 'Next >',
				'last_tag_open' => "<li class='page-item page-link'>",
				'last_tag_close' => "</li>",
				'next_tag_open' => "<li class='page-item page-link'>",
				'next_tag_close' => "</li>",
				'prev_tag_open' => "<li class='page-item page-link'>",
				'prev_tag_close' => "</li>",
				'num_tag_open' => "<li class='page-item page-link'>",
				'num_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active page-link'><a class='page-link'>",
				'cur_tag_close' => '</a></li>',
			];
			$this->pagination->initialize($config); //receives array of attributes
			$articles = $this->articles->search($query,$config['per_page'],$this->uri->segment(4));
			$this->load->view('public/search_result',compact('articles'));
		}
		public function article($article_id)
		{
			$this->load->model('article_model','articles');
		$article =	$this->articles->find($article_id);
		$this->load->view('public/article_detail',compact('article'));

		}
}
