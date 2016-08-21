<?php 
$article = $this->requestAction('/contents/getArticle/' . $id);

echo $article['Content']['content'];
