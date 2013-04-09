<?php

class News_Model extends Model
{
	public function getNews()
	{
		$sql = "SELECT
					a.id,
					a.title,
					a.intro,
					DATE_FORMAT(a.date, '%d.%m.%Y.') as date,
					c.category_name
				FROM 
					articles a
				INNER JOIN 
					categories AS c ON a.category = c.category_id 
				ORDER BY a.date DESC";
		
		$this->_setSql($sql);
		$articles = $this->getAll();
		
		if (empty($articles))
		{
			return false;
		}
		
		return $articles;
	}
	
	public function getArticleById($id)
	{
		$sql = "SELECT
					a.title,
					a.article,
					DATE_FORMAT(a.date, '%d.%m.%Y.') as date,
					c.category_name 
				FROM 
					articles a
				INNER JOIN categories AS c ON a.category = c.category_id 
				WHERE 
					a.id = ?";
		
		$this->_setSql($sql);
		$articleDetails = $this->getRow(array($id));
		
		if (empty($articleDetails))
		{
			return false;
		}
		
		return $articleDetails;
	}
}
