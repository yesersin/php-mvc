<?php  

class News_Controller extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
	
	public function index()
	{
		try {
			
			$articles = $this->_model->getNews();
			$this->_view->set('articles', $articles);
			$this->_view->set('title', 'News articles from database');
			
			$h=$this->loadHelper("session_helper");
			$h->set("selo","deneysel");
			//echo var_dump($h->get("selo1"));
			
			return $this->_view->output();
			
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
	
	public function details($articleId)
	{
		try {
			
			$article = $this->_model->getArticleById((int)$articleId);
			
			if ($article)
			{
				$this->_view->set('title', $article['title']);
				$this->_view->set('articleBody', $article['article']);
				$this->_view->set('datePublished', $article['date']);
			}
			else 
			{
				$this->_view->set('title', 'Invalid article ID');
				$this->_view->set('noArticle', true);
			}
			
			return $this->_view->output();
			 
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
	
}
