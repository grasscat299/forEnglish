<?php
$elmstr = $_GET["str"];
$title = $_GET["title"];
$str = preg_split( "/,/", $elmstr );
$a = 0;
$fp = fopen( $title.".json","w");
while( $a < count( $str ) ){
    if( $a == 0 || $a+1 == count( $str ) ||$a+2 == count( $str )){
        fputs( $fp, $str[$a]."\n" );
    }else{
        fputs( $fp, $str[$a].",\n");
    }
    $a++;
}
fclose($fp);

$fp = fopen( "index.json", "r" );
$bunelm = file_get_contents( "index.json" );
$bun = preg_split( "/\n/", $bunelm );
$sen = [];
$a = 0;
while( $a < count( $bun )-1 ){
    $sen[$a] = $bun[$a];
    if( $a == count( $bun )-2 ){
        $sen[$a] .= ",";
        $sen[$a+1] = '"'.$title.'"';
        $sen[$a+2] = "]";
    }
    $a ++ ;
}
fclose( $fp );

$fp = fopen( "index.json", "w" );
$a = 0;
while( $a < count( $sen ) ){
    if( $a == count( $sen )-1 ){
        fputs( $fp, $sen[ $a ] );
        $a ++ ;
    }else{
        fputs( $fp, $sen[ $a ]."\n" );
        $a++; 
    }
    
}
fclose( $fp );

?>