<?php
mysql_connect(
getenv('IP'),
getenv('C9_USER')
);
mysql_select_db("world");

$LOOKUP = $_REQUEST['lookup'];
$ALL = $_REQUEST['all'];
$FORMAT = $_REQUEST['format'];


# execute a SQL query on the database
 //$results = $db->execute("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");
$results = mysql_query("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");
print $results;

if($LOOKUP == null && $ALL == 'false'){
  return 0;
}
elseif($ALL == 'true' && $FORMAT =='xml'){
  $string='<?xml version="1.0" encoding="utf-8"?> <ul> <countrydata>';
  while ( $row = mysql_fetch_array($results)) {
    $string.='<li>';
    $string.='<country>';
    $string.='<name>';
    $string.=$row["name"];
    $string.='</name>';
    $string.='<ruler>, ';
    $string.=$row["head_of_state"];
    $string.='</ruler>';
    $string.='</country>';
    $string.='</li>';
  }
  $string.='</countrydata></ul>';
  
  $ok = utf8_encode($string);
  $xml=new SimpleXMLElement($ok);
  echo $xml -> asXML();
  //echo $string;
}
 else{
   while ($row = mysql_fetch_array($results)) {
     ?>
     <li> <?php echo $row["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
     <?php
   }
}
?>