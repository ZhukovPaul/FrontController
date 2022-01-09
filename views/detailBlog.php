<? $blogDetail = $context->get("blogDetail");

//print_r($blogDetail);

?>
<b>Views :</b> <?=$blogDetail->getViews()?><br>
<small>Create date: <?= date('m/d/Y',$blogDetail->getTimeСreate()) ?></small> 
<h1><?=$blogDetail->getTitle()?></h1>
<div><?=$blogDetail->getBody()?></div>