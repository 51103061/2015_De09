<?php
//xac dinh hang so cho dia chi tuyet doi
define('BASE_URL', 'http://localhost/raovat/');
//kiem tra xem ket qua tra ve co dung hay ko
function confirm_query($result,$query){
    global $dbc;
    if(!$result){
        die("Query {$query} \n<br/> mySQL error:". mysqli_error($dbc));
    }
}

//kiem tra nguoi dung da dang nhap hay chua?
function is_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('login.php');
    }
}

//tai dinh huong nguoi dung ve trang index
function redirect_to($page = 'index.php'){
    $url = BASE_URL . $page;
    header("Location: $url");
    exit();
}

function the_excerpt($text){
    $sanitized = htmlentities($text,ENT_COMPAT,'utf-8');
    if(strlen($sanitized) > 400){
        $cut_str = substr($sanitized,0,400);
        $words = substr($sanitized,0,strrpos($cut_str, ' '));
        return $words;
    }else{
    return $sanitized;
    }
}

//tao paragraph tu CSDL
function the_content($text){
    $sanitized = htmlentities($text,ENT_COMPAT,'utf-8');
    return str_replace(array("\r\n", "\n"),array("<p>", "</p>"),$sanitized);
}

function validate_id($id){
    if(isset($id) && filter_var($id,FILTER_VALIDATE_INT,array('min_rage' => 1))){
    $val_id = $id;
     return   $val_id;
    }else{
     return NULL;
    }
}

function get_page_by_id($id){
    global $dbc;
        $q = "SELECT p.page_id, p.page_name, p.content,";
        $q .= " DATE_FORMAT(p.post_on,'%b %d, %Y') AS date,";
        $q .= " CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id";
        $q .= " FROM pages AS p";
        $q .= " INNER JOIN user AS u";
        $q .= " USING(user_id)";
        $q .= " WHERE p.page_id = {$id}";
        $q .= " ORDER BY date ASC LIMIT 1";
        $result = mysqli_query($dbc,$q);
        confirm_query($result,$q);
        return $result;
}

function captcha(){
    $qna = array(
    1 => array('question' => 'Mot cong mot', 'answer' => 2 ),
    2 => array('question' => 'hai cong mot', 'answer' => 3 ),
    3 => array('question' => 'ba cong mot', 'answer' => 4 ),
    4 => array('question' => 'bon cong hai', 'answer' => 6 ),
    5 => array('question' => 'hai cong mot', 'answer' => 3 ),
    6 => array('question' => 'nam cong mot', 'answer' => 6 ),
    7 => array('question' => 'sau cong tam', 'answer' => 14 ),
    8 => array('question' => 'bay cong ba', 'answer' => 10 )
    );
    $rand_key = array_rand($qna);
    $_SESSION['q'] = $qna[$rand_key];
    return $question = $qna[$rand_key]['question'];
}//END function captcha

function pagination($aid, $display = 4){
    global $dbc; global $start;
    if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_rage' => 1))){
        $page = $_GET['p'];
    }else{
        //neu bien p ko co, truy suat du lieu de tim xem co bao nhieu page de hien thi
        $q = "SELECT COUNT(page_id) FROM pages";
        $r = mysqli_query($dbc, $q);
        confirm_query($r,$q);
        list($record) = mysqli_fetch_array($r,MYSQLI_NUM);
        // tim so trang bang cach chia so du lieu cho so display
        if($record > $display){
            $page = ceil($record/$display);
        }else{
            $page = 1;
        }
    }
    
    $output = "<ul class='pagination'";
    if($page > 1){
        $current_page = ($start/$display) + 1;
        //neu khong fai o trang dau hoac 1 thi se hien thi trang truoc
        if($current_page != 1){
            $output .= "<li><a href='author.php?aid={$aid}&s=".($start - $display)."'>Previous</a></li>";
        }
        //hien thi nhung phan so con lai cua trang
        for($i = 1; $i <= $page; $i ++){
            if($i != $current_page){
                $output .= "<li><a href='author.php?aid={$aid}&s=".($display*($i-1))."&p={$page}'>{$i}</a></li>";
            }else{
                $output .= "<li class='current'>{$i}</li>";
            }
        }
        if($current_page != $page){
                $output .= "<li><a href='author.php?aid={$aid}&s=".($start + $display)."'>Next</a></li>";
            }
        
    }//end pagination section
    $output .= "</ul>";
    return $output;
}

function clean_email($value){
    $suspects = array('to:', 'bcc:', 'cc:', 'content-type:', 'mime-version:', 'multipart-mixed:','content-transfer-encoding:');
    foreach($suspects as $s){
        if(strpos($value,$s) !== FALSE){
            return '';
        }
        //tra ve gia tri cho dau xuong hang
        $value = str_replace(array('\n', '\r','%0a','%0d'),'',$value);
        return trim($value);
    }
}
function report_error($message){
    if(!empty($message)){
        foreach($message as $msg){
            echo $msg;
        }
    }
}

function view_counter($pg_id) {
        $ip = $_SERVER['REMOTE_ADDR'];
        global $dbc;

        // Truy van CSDL de xem page view
        $q = "SELECT num_views, user_ip FROM page_views WHERE page_id = {$pg_id}";
        $r = mysqli_query($dbc, $q); confirm_query($r, $q);

        if(mysqli_num_rows($r) > 0) {
            
            // Neu ket qua tra ve, co nghia la da ton tai trong table, Update page view
            list($num_views, $db_ip) = mysqli_fetch_array($r, MYSQLI_NUM);
            
            // So sanh IP trong CSDL va IP cua nguoi dung, neu khac nhau thi se update CSDL
            if($db_ip !== $ip) {
            $q = "UPDATE page_views SET num_views = (num_views + 1) WHERE page_id = {$pg_id} LIMIT 1";
            $r = mysqli_query($dbc, $q); confirm_query($r, $q);
        }

        } else {
            // Neu ko co ket qua tra ve, thi se insert vao table.
            $q = "INSERT INTO page_views (page_id, num_views, user_ip) VALUES ({$pg_id}, 1, '{$ip}')";
            $r = mysqli_query($dbc, $q); confirm_query($r, $q);
            $num_views = 1;
        }
        return $num_views;
    }// ENd view_counter

// Ham dung de truy xuat du lieu cua nguoi dung.
    function fetch_user($user_id) {
        global $dbc;
        $q = "SELECT * FROM user WHERE user_id = {$user_id}";
        $r = mysqli_query($dbc, $q); confirm_query($r, $q);

        if(mysqli_num_rows($r) > 0) {
            // Neu co ket qua tra ve
            return $result_set = mysqli_fetch_array($r, MYSQLI_ASSOC);
        } else {
            // Neu ko co ket qua tra ve
            return FALSE;
        }
    } // END fetch_user

    function fetch_users($order) {
        global $dbc;
        
        // Truy van CSDL de lay tat ca thong tin nguoi dung
        $q = "SELECT * FROM user ORDER BY {$order} ASC";
        $r = mysqli_query($dbc,$q); confirm_query($r, $q);
        
        if(mysqli_num_rows($r) > 1) {
            // Tao ra array de luu lai ket qua
            $users = array();

            // Neu co gia tri de tra ve
            while($results = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $users[] = $results;
        } // End while
        return $users;
    } else {
        return FALSE; // Neu khong co thong tin nguoi dung trong CSDL
    }

    }// End fetch_users
    function is_admin() {

        return isset($_SESSION['user_level']) && ($_SESSION['user_level'] == 3);
    }


function admin_access() {
        if(!is_admin()) {
            redirect_to();
        }
    }
    
    function sort_table_users($order) {
        switch ($order) {
            case 'fn':
            $order_by = "first_name";
            break;
            
            case 'ln':
            $order_by = "last_name";
            break;
            
            case 'e':
            $order_by = "email";
            break;
            
            case 'ul':
            $order_by = "user_level";
            break;
            
            default:
            $order_by = "first_name";
            break;
        }
        return $order_by;
    } // END sort_table_users

    // Check connection for OOP
    function check_db_conn() {
        if(mysqli_connect_errno()) {
            echo "Connection failed: ". mysqli_connect_error();
            exit();
        }
    }

    // Check current page for admin page
    function current_page($page) {
        if(basename($_SERVER['SCRIPT_NAME']) == $page) 
            echo "class='here'";
    }
 