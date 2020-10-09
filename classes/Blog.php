<?php 

class Blog 
{
	public static function postsRecentes($totalPosts)
	{
		$totalPosts = intval($totalPosts);
		$postsRecentes = [];
		$query = 'SELECT * FROM `tb_site.noticias` ORDER BY id DESC LIMIT '.$totalPosts;
		$sql = MySql::conectar()->prepare($query);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$postsRecentes = $sql->fetchAll();
		}

		return $postsRecentes;
	}

	public static function getAllCategories()
	{
		$categories = MySql::conectar()->prepare('SELECT * FROM `tb_site.categorias` ORDER BY order_id ASC');
		$categories->execute();
		$categories = $categories->fetchAll();
		return $categories;		
	}

	public static function getCategoriaBySlug($slug)
	{
		$categoria = MySql::conectar()->prepare('SELECT * FROM `tb_site.categorias` WHERE slug = ?');
		$categoria->execute(array($slug));
		$categoria = $categoria->fetch();
		return $categoria;
	}

	public static function getCategoriaSlugByCategoriaId($id)
	{
		$categoriaSlug = MySql::conectar()->prepare('SELECT slug FROM `tb_site.categorias` WHERE id = ? LIMIT 1');
		$categoriaSlug->execute(array($id));
		$categoriaSlug = $categoriaSlug->fetch()[0];
		return $categoriaSlug;
	}

	public static function categoriaExiste($categoriaSlug) 
	{
		$sql = MySql::conectar()->prepare('SELECT slug FROM `tb_site.categorias` WHERE slug = ?');
		$sql->execute(array($categoriaSlug));
		if ($sql->rowCount() == 0)
			return false;
		return true;
	}

	public static function getCategoriaId($categoriaSlug) 
	{
		$categoriaId = 0;
		$sql = MySql::conectar()->prepare('SELECT id FROM `tb_site.categorias` WHERE slug = ?');
		$sql->execute(array($categoriaSlug));
		if ($sql->rowCount() > 0)
			$categoriaId = $sql->fetch()['id'];
		return $categoriaId;
	}

	public static function postExiste($postSlug, $categoriaId) 
	{
		$sql = MySql::conectar()->prepare('SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?');
		$sql->execute(array($postSlug, $categoriaId));
		if ($sql->rowCount() == 0)
			return false;
		return true;
	}

	public static function getPost($postSlug, $categoriaId)
	{
		$post = [];
		$sql = MySql::conectar()->prepare('SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?');
		$sql->execute(array($postSlug, $categoriaId));
		if ($sql->rowCount() >= 0)
			$post = $sql->fetch();
		return $post;
	}		
}
