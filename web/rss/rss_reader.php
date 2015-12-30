<?php
define('FILE_NAME', 'news.xml');
define('RSS_URL', 'http://localhost/rss/rss.xml');

function download($url, $file_name){
	$file = file_get_contents($url);
	if($file) file_put_contents($file_name, $file);
}
if(!is_file(FILE_NAME))
	download(RSS_URL, FILE_NAME);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Новостная лента</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
$xml = simplexml_load_file(FILE_NAME);
$i = 1;
foreach($xml->channel->item as $item){
	echo <<<RSS_URL
	<h3>{$item->title}</h3>
	<p>
		{$item->description}<br>
		<strong>КАтегория: {$item->category}</strong>&nbsp;
		<em>Опубликовано: {$item->pubDate}</em>&nbsp;
		</p>
		<p align='right'>
		<a href='{$item->link}'>Читать дальше...</a>
		</p>
RSS_URL;
 $i++;
	if($i > 5) break;
}
if(time() > filemtime(FILE_NAME) + 600)
	download(RSS_URL, FILE_NAME);
?>
</body>
</html>