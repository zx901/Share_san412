<?php
/**
*descript:连接数据库
*@return $link:数据库的句柄
*/
function connect(){
   $link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("Erorr connecting to MySQL.");
   mysql_set_charset(DB_CHARSET);
   mysql_select_db(DB_DBNAME) or die("Erorr connecting to MySQL Database.");
   return $link;
}
/**
*descript:插入新记录
*$table:表名 $array:想要插入的数据的数组array(keys=>values);
*@return mysql_insert_id():返回插入的数据在表中对应的ID号
*/
function insert($table,$array){
    $key=join(",", array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert into $table ($key) values($vals)";
    mysql_query($sql);
    return mysql_insert_id();
}
/**
*descript:更新记录
*$table:表名 $array:想要插入的数据的数组array(keys=>values); $where:筛选的条件
*@return mysql_affected_rows():更新数据的数量
*/
function update($table,$array,$where=NULL){
    $str=null;
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else {
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update $table set $str ".($where==null?null:"where ".$where);
    mysql_query($sql);
    return mysql_affected_rows();
}
/**
*descript:删除记录
*$table:表名 $where:筛选的条件
*@return mysql_affected_rows():删除记录的数量
*/
function delete($table,$where=NULL){
    $where=$where==null?null:"where ".$where;
    $sql="delete from $table $where";
    mysql_query($sql);
    return mysql_affected_rows();
}
/**
*descript:得到指定的一条记录
*$sql:SQL语句 $result_type:返回结果类型
*@return $row
*/
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result,$result_type);
    return $row;
}
/**
*descript:得到结果集中的所有记录
*$sql:SQL语句 $result_type:返回结果类型
*@return $row
*/
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    while (@$row=mysql_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}
/**
 *descript:得到结果集中的所有记录的条数
 *$sql:SQL语句 $result_type:返回结果类型
 *@return mysql_num_rows($result):结果集中的所有记录的条数
 */
function getResultNum($sql){
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}

