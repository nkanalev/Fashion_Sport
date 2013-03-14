<?PHP

function show_error_page($error, $query) {

$info .= '<B>when</B>: '.date("d.m.Y H:i:s")."\n\r";
$info .= '<BR><B>query:</B> '.stripslashes($query)."\n\r";
$info .= '<BR><B>what:</B> '.$error."\n\r";
$info .= '<BR><B>from</B>: '.$_SERVER["HTTP_REFERER"]."\n\r";
$info .= '<BR><B>where</B>: <a target=_blank href="http://'.$_SERVER["HTTP_HOST"].''.$_SERVER["REQUEST_URI"].'">http://'.$_SERVER["HTTP_HOST"].''.$_SERVER["REQUEST_URI"].'</a> >> '.$_SERVER["QUERY_STRING"]."\n\r";
//$info .= '<BR><B>file</B>: '.__FILE__."\n\r";
$info .= "<hr>";



	echo '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
	<title>GIBONA</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
		</head>
	<body>
<B>Внимание!</B><BR>
Съжаляваме, но се получи проблем при опит да доставим нужната ви информация. Моля, опитайте отново.
Info: <br>'.$info.'
	</body>
</html>


	';
}

class mysql_init
	{
		var $conn = "";
		function mysql_init($dbUser='db_user', $dbPass='db_pass', $dbName='db_name', $dbHost='db_host')
		{
			$this->user = $dbUser;
			$this->pass = $dbPass;
			$this->name = $dbName;
			$this->host = $dbHost;
			$this->queries = array();
			$this->last_result = FALSE;
		}		
		function connect(){
			$this->conn = mysql_connect($this->host, $this->user, $this->pass) or die(show_error_page(mysql_error(), 'свързване към базата данни'));
//			$this->conn = mysql_pconnect($this->host, $this->user, $this->pass) or die(show_error_page(mysql_error(), ''));
			mysql_query('set names cp1251', $this->conn);			
			$this->select_db($this->name);
			return $this->conn;
		}
		function select_db($db)	{
			mysql_select_db($db, $this->conn) or die(show_error_page(mysql_error()));
		}
		function query($query){
			if (!$this->conn) $this->conn = $this->connect();
			$start = microtime();
			$result = mysql_query($query, $this->conn) or die(show_error_page(mysql_error(), $query));
			$end = microtime();
			list($usec1, $sec1) = explode(' ', $start);
			list($usec2, $sec2) = explode(' ', $end);
			$diff = round($sec2-$sec1+$usec2-$usec1, 5);
			$this->queries[] = $query;
			$this->queries['time'][] = $diff;
			$this->tmp_time = ($sec2-$sec1+$usec2-$usec1);
			$this->last_result = $result;

			return $result;
		}
		function fetch_object($res=FALSE){
			$res = $res ? $res : $this->last_result;
			return mysql_fetch_object($res);
		}
		
		function fetch_array($res=FALSE){
			$res = $res ? $res : $this->last_result;
			return mysql_fetch_array($res);
		}

		function fetch_query($query) {
			$res = $this->query($query, FALSE);
			return $this->fetch_object($res);
		}
		function num_rows($res=FALSE){
			$res = $res ? $res : $this->last_result;
			return mysql_num_rows($res);
		}
		function insert_id(){
			return mysql_insert_id();
		}		
		function affected_rows(){
			return mysql_affected_rows();
		}
		function close(){
			if($this->conn)
				mysql_close($this->conn);
		}
		function query_timer(){
			return $this->tmp_time;
		}
		function print_queries(){
		if (count($this->queries)==0) return "";
			@ $html = '<hr style="clear: both"/><div style="margin-left: 10px;">';
			$html .= '<div style="color: red; text-decoration: underline; margin-bottom: 5px;">Number of queries: <b>'.count($this->queries['time']).'</b>; Total time: <b>'.array_sum($this->queries['time']).'</b></div>';
			foreach ($this->queries['time'] as $key=>$value)
			{
				$html .= nl2br($this->queries[$key]).'; <b>Time: <font color=blue>'.sprintf("%.5f", $this->queries['time'][$key]).'</font></b><hr>';
			}
			$html .= '</div>';
			return $html;
		}
	}

?>
