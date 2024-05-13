<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lab');

define('HTTP', isset($_SERVER['HTTPS']) ? 'https' : 'http');
$get_url = isset($_GET['url'])? $_GET['url'] : null;
define('BURL', str_replace('index.php', '', $_SERVER['PHP_SELF']));
define('CURL', sprintf('%s://%s%s', HTTP, $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']));
define('GURL', $get_url);
define('SURL', str_replace(GURL, '', CURL));
define('UARR', explode('/', rtrim(GURL, '/')));
define('CTIME', date('Y-m-d H:i:s'));
define('SERVER', $_SERVER);

// Spacial URL data "https://app.com/URLA/URLB/URLC/URLD/URLE"
define('URLA' , isset(UARR[0])? UARR[0] : false);
define('URLB', isset(UARR[1])? UARR[1] : false);
define('URLC', isset(UARR[2])? UARR[2] : false);
define('URLD', isset(UARR[3])? UARR[3] : false);
define('URLE', isset(UARR[4])? UARR[4] : false);

define('MDIR', dirname(__DIR__).'/');

// Printer function
function printer($a = []){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

// vardump function
function vardump($a = []){
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

// maximum word fetch
function maxword($text, $limit = 12, $exp = false) {
    $word_arr = explode(" ", $text);
    if (count($word_arr) > $limit):
        $words = implode(" ", array_slice($word_arr , 0, $limit) ) . $exp;
        return $words;
    endif;
    return $text;
}

// maximum sentences breaker function
function max_sentence_br($text, $limit = 4) {
    $word_arr = explode("।", $text);
    $count = count($word_arr);
    foreach ($word_arr as $key => $value):
      for ($i= $limit; $i <=$count; $i+=$limit):
          if ($key == $i): echo nl2br("\n\n"); endif;
      endfor;
        echo $value."।";
    endforeach;
}

// dual foreach
function dual_foreach(array $array = [], $a = 'div', $b = null){
  foreach ($array as $i => $value):
      foreach ($value as $k => $values):
        if ($b == null): echo "<$a>".$values."</$a>";
        else: echo $a.$values.$b; endif;
      endforeach;
  endforeach;
}

// explode and implode function
function eximplode($str = 'Hello World', $exp = ' ', $imp = '_'){
    $explode = explode($exp, $str);
    $implode = implode($imp, $explode);
    return $implode;
}

// array last value collector function
function exp_end($url, $exp = '-'){
  $arr = explode($exp, $url);
  return end($arr);
}
function resize_image($file, $w, $h, $crop = false) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop):
        if ($width > $height):
            $width = ceil($width-($width*abs($r-$w/$h)));
        else:
            $height = ceil($height-($height*abs($r-$w/$h)));
        endif;

        $newwidth = $w;
        $newheight = $h;
    else:
        if ($w/$h > $r):
            $newwidth = $h*$r;
            $newheight = $h;
        else:
            $newheight = $w/$r;
            $newwidth = $w;
        endif;
    endif;

    switch (exp_end($file, '.')):
      case 'jpg': $src = imagecreatefromjpeg($file); break;
      case 'jpeg': $src = imagecreatefromjpeg($file); break;
      case 'gif': $src = imagecreatefromgif($file); break;
      case 'png': $src = imagecreatefrompng($file); break;
      case 'webp': $src = imagecreatefromwebp($file); break;
      case 'wbmp': $src = imagecreatefromwbmp($file); break;
    endswitch;

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    Header::content($file);
    imagewebp($dst);
}
//  end function



class Header {
  static function login($a, $init, $url = false){
      session_start();
      if (isset($_POST['hash'])):
        $_SESSION[$a] = $init;
      elseif (isset($_SESSION[$a])):
        self::redirect($url);
      endif;
  }
  static function logout($init, $url = ''){
      session_start();
      $_SESSION[$init] = "";
      session_unset();
      session_destroy();
      header::redirect($url);
  }

  // file type
  static function type($file){
    $ext = Base::pathinfo($file);
    switch($ext) :
        case "css":  $t = "text/css"; break;
        case "csv":  $t = "text/csv"; break;
        case "txt":  $t = "text/plain"; break;
        case "gif":  $t = "image/gif"; break;
        case "png":  $t = "image/png"; break;
        case "jpeg": $t = "image/jpeg"; break;
        case "jpg":  $t = "image/jpeg"; break;
        case "tiff": $t = "image/tiff"; break;
        case "webp": $t = "image/webp"; break;
        case "svg":  $t = "image/svg+xml"; break;
        case "js":   $t = "application/javascript"; break;
        case "json": $t = "application/json"; break;
        case "xml":  $t = "application/xml"; break;
        case "zip":  $t = "application/zip"; break;
        case "pdf":  $t = "application/pdf"; break;
        case "mp3":  $t = "audio/mp3"; break;
        case "mp4":  $t = "video/mp4"; break;
        case "webm": $t = "video/webm"; break;
        default:     $t = "text/html; charset=UTF-8"; break;
    endswitch;
    return $t;
  }
  // Location
  static function redirect($A = null, $B = BURL){
    return header('Location: ' . $B.$A);
  }
  // content type
  static function content($file) {
    return header('Content-type: ' . self::type($file));
  }

  static function statusMassage($statusCode){
      $httpStatus = [ 100 => 'Continue',
                      101 => 'Switching Protocols',
                      200 => 'OK',
                      201 => 'Created',
                      202 => 'Accepted',
                      203 => 'Non-Authoritative Information',
                      204 => 'No Content',
                      205 => 'Reset Content',
                      206 => 'Partial Content',
                      300 => 'Multiple Choices',
                      301 => 'Moved Permanently',
                      302 => 'Found',
                      303 => 'See Other',
                      304 => 'Not Modified',
                      305 => 'Use Proxy',
                      306 => '(Unused)',
                      307 => 'Temporary Redirect',
                      400 => 'Bad Request',
                      401 => 'Unauthorized',
                      402 => 'Payment Required',
                      403 => 'Forbidden',
                      404 => 'Not Found',
                      405 => 'Method Not Allowed',
                      406 => 'Not Acceptable',
                      407 => 'Proxy Authentication Required',
                      408 => 'Request Timeout',
                      409 => 'Conflict',
                      410 => 'Gone',
                      411 => 'Length Required',
                      412 => 'Precondition Failed',
                      413 => 'Request Entity Too Large',
                      414 => 'Request-URI Too Long',
                      415 => 'Unsupported Media Type',
                      416 => 'Requested Range Not Satisfiable',
                      417 => 'Expectation Failed',
                      500 => 'Internal Server Error',
                      501 => 'Not Implemented',
                      502 => 'Bad Gateway',
                      503 => 'Service Unavailable',
                      504 => 'Gateway Timeout',
                      505 => 'HTTP Version Not Supported'
                    ];
      return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $httpStatus[500];
  }

  static function setHttp($contentType, $statusCode) {
      $statusMessage = self::statusMassage($statusCode);

      header("HTTP/1.1" . " " . $statusCode . " " . $statusMessage);
      // header("Content-Type:" . $contentType);
      self::content($contentType);
  }
}

//server

class Server{
    static function url(){
           return sprintf('%s://%s', HTTP, $_SERVER['HTTP_HOST']);
    }

    static function getDomain($domain = false){
        $domain = $domain? $domain : self::url();
        return preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)? $matches['domain'] : $domain;
    }
    static function domainUrl($domain = false){
        $domain = $domain? $domain : self::url();
        return sprintf('%s://%s', HTTP, self::getDomain($domain));
    }


    static function getSubdomain($domain){
        $subdomains = $domain;
        $domain = getDomain($subdomains);
        $subdomains = ltrim(rtrim(strstr($subdomains, $domain, true), '.'), HTTP.'://');
        return $subdomains;
    }

    static function domain(){
           return self::getDomain(self::url());
    }
    static function setUrl(String $url){
           $url = !empty($url)? '/'.$url : '';
           return self::getDomain().$url;
    }

    static function mainUrl(){
        return sprintf('%s://%s', HTTP, self::domain());
    }

    static function setSubdomain($subDomain){
        return sprintf('%s://%s.%s', HTTP,$subDomain, self::domain()).'/';
    }
    static function setLocalSubdomain($subDomain){
      return sprintf('%s://%s/%s/%s/', HTTP, $_SERVER['HTTP_HOST'], explode('/', $_SERVER['REDIRECT_URL'])[1], $subDomain);
    }
}
// database class start
class Database{
    // database details
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASSWORD;
    private $db_name = DB_NAME;

    // for function constaint
    private $mysqli = "";
    private $result = [];
    private $conn = false;

    // 1. constructer
    function __construct(){
        if(!$this->conn):
          $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
          $this->conn = true;
          if($this->mysqli->connect_error): array_push($this->result, $this->mysqli->connect_error); return false; endif;
        else: return true; endif;
      }
        // 2. insert
    function insert($table,$params = array()){
        if ($this->tableExits($table)):
    
            $table_columns = implode(', ', array_keys($params));
            $table_value = implode("', '", $params);
    
            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
    
            if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->insert_id); return true;
            else: array_push($this->result, $this->mysqli->error); return false; endif;
        else: return false; endif;
    }
        // 3. update
    function update($table, $params = array(), $where = null){
        if ($this->tableExits($table)):
            $args = array();
            foreach ($params as $key => $value): $args[] = "$key =  '$value'"; endforeach;
    
            $sql = "UPDATE $table SET ". implode(', ', $args);
            if ($where != null): $sql .= " WHERE $where"; endif;
            if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->affected_rows); return true;
            else: array_push($this->result, $this->mysqli->error); return false; endif;
        else: return false; endif;
        }
        // 4. delete
    function delete($table, $where = null){
        if ($this->tableExits($table)):
            $sql = "DELETE FROM $table";
            $sql .= ($where != null)? " WHERE $where" : false;
            if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->affected_rows); return true;
            else: array_push($this->result, $this->mysqli->error); return false;
            endif;
        else: return false; endif;
        }
        // 5. select
    function select($table, $rows = "*",$join = null, $where = null, $order = null, $limit = null ){
        if ($this->tableExits($table)):
            $sql = "SELECT $rows FROM $table";
            $sql .= ($join != null)? " $join" : false;
            $sql .= ($where != null)? " WHERE $where" : false;
            $sql .= ($order != null)? " ORDER BY $order" : false;
            $sql .= ($limit != null)? " LIMIT $limit" : false;
    
            $query = $this->mysqli->query($sql);
            if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
            else: array_push($this->result, $this->mysqli->error); return false; endif;
        else: return false; endif;
        }
        // 6. pagination
    function pagination($table, $join = null, $where = null, $limit = null ){
        if ($this->tableExits($table)):
            if ($limit != null):
            $sql = "SELECT COUNT(*) FROM $table";
            $sql .= ($join != null)? " JOIN $join" : false;
            $sql .= ($where != null)? " WHERE $where" : false;
    
            $query = $this->mysqli->query($sql);
    
            $total_record = $query->fetch_array();
            $total_record = $total_record[0];
            $total_page = ceil($total_record /$limit);
    
            $url = $_SERVER['REDIRECT_URL'];
    
            $page = (isset($_GET['page']))? $_GET['page'] : 1;
            $output = "<ul class='pagination'>";
            $output .= ($page > 1)? "<li><a href='$url?page=".($page-1)."'>Prev</a></li>" : false;
    
            if ($total_record > $limit):
                for($i = 1; $i <= $total_page; $i++):
                $cls = ($i == $page)? "class = 'active'" : null;
                $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
                endfor;
                $output .= ($total_page > $page)? "<li><a href='$url?page=".($page+1)."'>Next</a></li>" : false;
            endif;
    
            $output .= "</ul>";
            echo $output;
            else: return false; endif;
        endif;
    }
        // 7. sql query
    function sql($sql){
        $query = $this->mysqli->query($sql);
        if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
        else: array_push($this->result, $this->mysqli->error); return false;
        endif;
    }
        // 8. sql table exists
    function tableExits($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if($tableInDb):
            if ($tableInDb->num_rows == 1): return true;
            else: array_push($this->result, $table, " Does not exist in this database."); return false; endif;
        endif;
    }
        // 9. get restult
    function tableList(){
        $sql = "SHOW TABLES IN $this->db_name";
        $query = $this->mysqli->query($sql);
        if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
        else: array_push($this->result, $this->mysqli->error); return false;
        endif;
    }
        // 10. get restult
    function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }
        // 11. destructer
    function __destruct(){
        if ($this->conn):
            if ($this->mysqli->close()): $this->conn = false; return true; endif;
        else: return false; endif;
    }
        // 12. call
    function __call($method, $a){
        echo  "<h1>Does not exist function : ".$method."</h1>";
    }
}
try {
    $DB = new Database;
    define('DB', $DB);
} catch (\Exception $e) {
    echo "<center><h1>Technical Error</h1></center><hr>";
    exit;
}
// end

class Base{
  // all file load
  static function loader($dir, $ext = false){
    $ext = $ext? ".$ext" : false;
    foreach (glob("$dir*$ext") as $file):
      if (is_file($file)): require_once $file; endif;
    endforeach;
  }

  static function module($dir = false, $ext= 'php'){
      foreach (glob(MDIR."use_module/$dir/*.$ext") as $file):
        if (is_file($file)): require_once $file; endif;
      endforeach;
  }
  // all file load
  static function read($dir, $ext= 'css'){
    foreach (glob("$dir/*.$ext") as $file){ readfile($file); };
  }
  // all file load
  static function getContent($name, $mode = true){
    if (is_file($name)):
      if (file_exists($name)):
        if ($mode):
          return htmlentities(file_get_contents($name));
        else:
          htmlentities(readfile($file));
        endif;
      else:
        return 'File Not Found';
      endif;
    else:
      return "Not Found";
    endif;
  }

  // file counter function
  static function file_count($dir, $ext = false){
    $ext = $ext? ".$ext" : false;
    $all = glob($dir.'*'.$ext);
    return count($all);
  }

  // explode and implode function
  static function eximplode($str = 'Hello World', $exp = ' ', $imp = '_'){
      $explode = explode($exp, $str);
      return implode($imp, $explode);
  }

  //Comman function only use of file read
  /*static function reader($folder, $name = false, $exicute = false){
    $root = $folder."/";
    $file = $root.$name;
    if(is_dir($file)):
      if ($exicute):
          header::content("$file.$folder");
          self::loader($root, $folder);
      endif;
    else:
      if (file_exists($file)) :
          Header::content($file);
          require_once $file;
      endif;
    endif;
  }*/

  // Extention function
  static function pathinfo($file, $e = 'e'){
    switch ($e):
      case 'd': $info = PATHINFO_DIRNAME; break;
      case 'b': $info = PATHINFO_BASENAME; break;
      case 'e': $info = PATHINFO_EXTENSION; break;
      case 'f': $info = PATHINFO_FILENAME; break;
      default: $info = PATHINFO_EXTENSION; break;
    endswitch;
    return strtolower(pathinfo($file, $info));
  }

  // Generator random String
  static function genRandStr($length = 5, $str = false, $strcase = true){
      $char = "abcdefghijklmnopqrstuvwxyz";
      $char .= "ABCDEFGHIJKLMNOPQRSTUVWZYZ";
      $char .= '0123456789';

      $real_string_length = strlen($char) ;
      $string = $str;

      for ($p = 0; $p < $length; $p++) {
          $string .= $char[mt_rand(0, $real_string_length-1)];
      }
      return $strcase? strtolower($string) : $string;
   }

  static function sth($str){
     return htmlspecialchars_decode($str);
  }
  static function hts($html, $pattern = "/<.+?>/", $cod = ''){
     $str = htmlspecialchars_decode($html);
     return preg_replace($pattern, $cod, $str);
  }

  static function dft($date, $format = 'd-m-Y g:i A'){
      $date = new DateTime($date);
      return $date->format($format);
  }
  static function ddf($timea = CTIME, $timeb = CTIME, $format = "%R%a"){
      $date1 = date_create($timeb);
      $date2 = date_create($timea);
      $diff  = date_diff($date1,$date2);
      return $diff->format($format);
  }
  // date days count as ddc function
  static function ddc($date1 = CTIME){
    $dob = new DateTime($date1);
    $td = new DateTime(CTIME);
    $days = $td->diff($dob)->days;
  }
  static function scr($str = 'spacial chartor remover'){
    $str = base::hts($str);
    $pat = [':', '&#39;', '&nbsp;', '"', "'", '', '&zwj;', '&ndash;', ';'];
    return str_ireplace($pat, [''], $str);
  }

  // json encode function
  static function ejson($arr = [], $header = true){
    $count  = count($arr);
    $status = $count > 0? true : false;
    $header? header::content('.json') : false;
    $json = ["status" => $status, "total" => $count, "data" => $arr];
    echo json_encode($json);
  }
  static function fileSize($size) {
    if($size < 1024):
      return "{$size} bytes";
    elseif($size < 1048576):
      $size_kb = round($size/1024);
      return "{$size_kb} KB";
    else:
      $size_mb = round(size/1048576, 1);
      return "{$size_mb} MB";
    endif;
  }

  static function realFileSize($path){
      if (!file_exists($path))
          return false;

      $size = filesize($path);

      if (!($file = fopen($path, 'rb')))
          return false;

      if ($size >= 0){
        //Check if it really is a small file (< 2 GB)
          if (fseek($file, 0, SEEK_END) === 0){
            //It really is a small file
              fclose($file);
              return $size;
          }
      }

      //Quickly jump the first 2 GB with fseek. After that fseek is not working on 32 bit php (it uses int internally)
      $size = PHP_INT_MAX - 1;
      if (fseek($file, PHP_INT_MAX - 1) !== 0){
          fclose($file);
          return false;
      }

      $length = 1024 * 1024;
      while (!feof($file)){
        //Read the file until end
          $read = fread($file, $length);
          $size = bcadd($size, $length);
      }
      $size = bcsub($size, $length);
      $size = bcadd($size, strlen($read));

      fclose($file);
      return $size;
  }
  static function folderSize ($dir) {
      $size = 0;
      $contents = glob(rtrim($dir, '/').'/*', GLOB_NOSORT);

      foreach ($contents as $contents_value) {
          if (is_file($contents_value)) {
              $size += filesize($contents_value);
          } else {
              $size += realFolderSize($contents_value);
          }
      }

      return $size;
  }

}

?>