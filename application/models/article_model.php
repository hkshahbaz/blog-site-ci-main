<?php

/**
 * 
 */
class Article_model extends CI_Model
{
	public function article_list($limit,$offset)
	{
		$user_id = $this->session->userdata('id');

		$query= $this->db
						->select(['title','article_id'])
						->from('articles')
						->where('id',$user_id)
						->limit($limit,$offset)
						->get();

		return $query->result(); //return array
	}
	public function all_article_list($limit,$offset)
	{
		$query= $this->db
						->select(['title','article_id','created_at'])
						->from('articles')
						->limit($limit,$offset)
						->order_by('created_at','DESC')
						->get();

		return $query->result(); //return array
	}

	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}

	public function find_article($article_id)
	{
		$q=	$this->db
					->select(['article_id','title','body'])
					->from('articles')
					->where('article_id',$article_id)
					->get();
		return $q->row(); //return object
	}

	public function update_article($article_id,$article)
	{
		return $this->db
				->where('article_id',$article_id)
				->update('articles',$article); //return number of row affected either 0 or 1 (true or false)
	}
	public function delete_article($article_id)
	{
		return $this->db
					->delete('articles',['article_id' => $article_id['article_id']]);
					 //rows affected
	}		
	public function num_rows()
	{
		$user_id = $this->session->userdata('id');

		$query= $this->db
						->select(['title','article_id'])
						->from('articles')
						->where('id',$user_id)
						->get();

		return $query->num_rows (); //return array
	}	
	public function all_articles()
	{

		$query= $this->db
						->select(['title','article_id'])
						->from('articles')
						->get();

		return $query->num_rows (); //return array
	}	
	public function search($query, $limit , $offset)
	{
	$q =	$this->db
					 ->from('articles')
					 ->like('title',$query)
					 ->limit($limit,$offset)
					 ->get();
	return $q->result();
	}
	public function count_search_results($query)
	{
		$q = $this->db
				  ->from('articles')
				  ->like('title',$query)
				  ->get();
		return $q->num_rows();
	}
	public function find($article_id)
	{
	$q =$this->db
			 ->from('articles')
			 ->where('article_id',$article_id)
			 ->get();
		if($q->num_rows())
		{
			return $q->row();
		}
		return false;
	}
}