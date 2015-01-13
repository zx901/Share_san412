<?php
/**
*descript:检测用户信息
*@return
*/
function checkUser($sql)
{
    $link=connect();
    $row = fetchOne($sql);
    mysql_close($link);
    return $row;
}
/**
 *descript:注册用户信息
 *@return
 */
function registerUser($array)
{
    $link=connect();
    $id=insert("san412_user",$array);
    mysql_close($link);
    return $id;
}