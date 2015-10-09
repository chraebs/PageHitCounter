//Developed by David Bunker (bunk58) 28/08/08
//Requires the PageHitCounter 2.0 by Susan Otwell (http://modxcms.com/repository-upload.html?repotype=addition&resourceid=878)
//Create a new snippet named PHCResults
//Copy & Paste the code below into it
//The snippet takes 4 parameters:
//&excludeIDs => default = 0 , a comma seperated list of document ID's to exclude from the results (might be useful for 404 pages, Home page etc.)
//&limit => default = 5 , maximum number of results
//&table_prefix => default = modx_ , your database prefix if different to modx_
//&tpl => default = top_pages , name of template chunk for sidplaying the results
//Example call => [!PHCResults? &excludeIDs=`1,2,3` &limit=`10` &table_prefix=`custom_` &tpl=`your_tpl`!]
//The example template chunk below lists the four placeholders available
//Example template chunk => 
//<p>Total Hits = [+phc.count+] for <a href="[~[+phc.pageID+]~]" title="[+phc.title+]">[+phc.longtitle+]</a> - [+phc.description+]</p>
//Copy & Paste the above into a chunk and name it top_pages or create your own
//Here's the snippet code =>

<?php
$table_prefix = (isset($table_prefix)) ? $table_prefix : 'modx_';
$limit = (isset($limit)) ? $limit : 5;
$excludeIDs = (isset($excludeIDs)) ? $excludeIDs : '0';
$tpl = (isset($tpl)) ? $tpl : 'top_pages';
$output = '';
$sql = mysql_query('SELECT * FROM `'.$table_prefix.'page_hit_counter`, `'.$table_prefix.'site_content` WHERE '.$table_prefix.'page_hit_counter.page_id='.$table_prefix.'site_content.id AND '.$table_prefix.'site_content.id NOT IN('.$excludeIDs.')ORDER BY `page_count` DESC LIMIT '.$limit.'');
$resultArray = $modx->db->makeArray( $sql );
foreach($resultArray as $item)
{
$params['phc.count']=$item['page_count'];
$params['phc.pageID']=$item['page_id'];
$params['phc.title']=$item['pagetitle'];
$params['phc.longtitle']=$item['longtitle'];
$params['phc.description']=$item['description'];
$output.=$modx->parseChunk(''.$tpl.'', $params, '[+', '+]');
}
return $output;
?>
