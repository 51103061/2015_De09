<?php 
   //ket noi voi CSDL
   $dbc = mysqli_connect('localhost','root','','rao_vat');
   // neu khong ket noi duoc thi bao loi ra trinh duyet
   if(!$dbc){
    trigger_error('could not connect to DB:'. mysqli_connect_error());
   }else{
    //dat phuong thuc ket noi UTF-8
    mysqli_set_charset($dbc,'utf-8');
   }
   
?>