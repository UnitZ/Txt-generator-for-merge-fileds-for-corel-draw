<?
(isset($_GET["numer_from"])) ? $from = $_GET["numer_from"] : $from = "00";
(isset($_GET["numer_to"])) ? $to = $_GET["numer_to"] : $to = "10";
(isset($_GET["var_name"])) ? $custom_var = $_GET["var_name"] : $custom_var = "nomer";
$filename = "Слияние ".$from."-".$to.".txt";
(empty($custom_var)) ? $out = "nomer" : $out = $custom_var;
$col_digits = strlen($from);
if($from < $to) {
    for($i = $from; $i <= $to; $i++) {
        $out .= "\r\n". str_pad($i, $col_digits, '0', STR_PAD_LEFT);
    }
}
header("HTTP/1.1 200 OK");
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
header("Content-type: application/download");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Transfer-Encoding: binary");
echo $out;
?>