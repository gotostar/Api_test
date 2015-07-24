<?php

/* $sDBHost = "localhost";
$sDBName = "test";
$sDBUser = "test";
$sDBPass = "inno1!"; */

$sDBHost = "localhost";
$sDBName = "gotostar";
$sDBUser = "gotostar";
$sDBPass = "wkdskfk12";

function array_implode($arrays, &$target = array()) {
    foreach ($arrays as $item) {
        if (is_array($item)) {
            array_implode($item, $target);
        } else {
            $target[] = $item;
        }
    }
    return $target;
}

$oConnectionArr = array();
function dbConnect() {
    global $sDBHost, $sDBUser, $sDBPass,$sDBName,$oConnectionArr;
    if(isset($oConnectionArr[$sDBHost])) {
        $oConnection = $oConnectionArr[$sDBHost];
    } else {
        $oConnection = mysql_connect($sDBHost, $sDBUser, $sDBPass);
        $oConnectionArr[$sDBHost] = $oConnection;
    }
    if ($oConnection) {
        mysql_select_db($sDBName,$oConnection);
    } else {
        error_log(mysql_error());
    }
    return $oConnection;
}

function execSqlOneRow($sQuery) {

    $oConnection = dbConnect();
    mysql_set_charset("utf8");
    if ($oConnection) {
        $oResult = mysql_query($sQuery);
        if ($oResult) {
            return mysql_fetch_assoc($oResult);
        }
    }
    return false;

}

function execSqlOneCol($sQuery) {
    $oConnection = dbConnect();
    mysql_set_charset("utf8");
    if ($oConnection) {
        $oResult = mysql_query($sQuery);
        if ($oResult) {
            $aRow = mysql_fetch_row($oResult);
            return $aRow[0];
        }
    }
    return false;

}

function execSqlLists($sQuery) {
    $oConnection = dbConnect();
    mysql_set_charset("utf8");
    if ($oConnection) {
        $aReturn="";
        $oResult = mysql_query($sQuery);
        if ($oResult) {
            $nI = 0;
            while($aRow = mysql_fetch_assoc($oResult)) {
                #array_push($aReturn,$aRow);
                $aReturn[$nI] = $aRow;
                $nI++;
            }
            return $aReturn;
        }
    }
    return false;
}

function execSqlKeyLists($sQuery, $key) {
    $oConnection = dbConnect();
    mysql_set_charset("utf8");
    if ($oConnection) {
        $aReturn="";
        $oResult = mysql_query($sQuery);
        if ($oResult) {
            while($aRow = mysql_fetch_assoc($oResult)) {
                #array_push($aReturn,$aRow);
                $aReturn["{$aRow[$key]}"] = $aRow;
            }
            return $aReturn;
        }
    }
    return false;
}


function execSqlUpdate($sQuery,$bReturnResult=false) {
    $oConnection = dbConnect();
    mysql_set_charset("utf8");
    if ($oConnection) {
        $aReturn="";
        $oResult = mysql_query($sQuery);
        if ($oResult) {
            return true;
            /*
                            if ($bReturnResult===true) {
                                return mysql_insert_id();
                            } else {
                                return true;
                            }
            */
        }
    }
    return false;

}

/*//IP 기준으로 사이트 접근 통제
function ipLimit(){
    $ip = $_SERVER['REMOTE_ADDR'];

    if( stristr($ip, '220.117.148') ){

    }else{
        echo "접근 불가능한 IP 입니다.";
        exit;
    }
}*/

/**
 * insertSQL을 만들어서 삽입
 *
 * @param   Stirng DB명
 * @param   Array 삽입할 key와 값들
 */
function BuildInsertSQL(&$aQuery) {
    $fields = array_map('mysql_real_escape_string', array_values($aQuery['insert']));
    $keys = array_keys($aQuery['insert']);
    $table = $aQuery['table'];
    $sQuery = 'INSERT INTO `' . $table . '` (`' . implode('`,`', $keys) . '`) VALUES (\'' . implode('\',\'', $fields) . '\')';
    return $sQuery;
}

function BuildUpdateSQL(&$aQuery) {
    $fields = $aQuery['update'];
    $wheres = $aQuery['where'];
    $table = $aQuery['table'];
    $keys = array();
    $wehreKeys = array();

    foreach ($fields as $key => $value) {
        array_push($keys, '`' . $key . '`=\'' . mysql_real_escape_string($value) . '\'');
    }
    foreach ($wheres as $key => $value) {
        array_push($wehreKeys, '`' . $key . '`=\'' . mysql_real_escape_string($value) . '\'');
    }

    $sQuery = 'UPDATE `' . $table . '` SET ' . implode(',', $keys) . ' WHERE (' . implode(') AND (', $wehreKeys) . ')';
    return $sQuery;
}
function BuildSelectSQL(&$aQuery) {
    $query = 'SELECT ';
    if (count($aQuery['select']) == 0) {
        $query .= '*';
    } else {
        $query .= '`' . implode('`,`', $aQuery['select']) . '`';
    }
    $query .= ' FROM `' . $aQuery['table'] . '`';
    if (isset($aQuery['where'])) {
        if (count($aQuery['where']) != 0) {
            $wehreKeys = array();
            foreach ($aQuery['where'] as $key => $value) {
                array_push($wehreKeys, '`' . $key . '`=\'' . mysql_real_escape_string($value) . '\'');
            }
            $query .= ' WHERE (' . implode(') AND (', $wehreKeys) . ')';
        }
    }
    if (isset($aQuery['order'])) {
        if (count($aQuery['order']) != 0) {
            $orderKeys = array();
            foreach ($aQuery['order'] as $key => $value) {
                array_push($orderKeys, '`' . $key . '` ' . mysql_real_escape_string($value));
            }
            $query .= ' ORDER BY ' . implode(', ', $orderKeys);
        }
    }
    if (isset($aQuery['limit'])) {
        if ($aQuery['limit']) {
            $query .= ' LIMIT ' . $aQuery['limit'];
        }
    }
    return $query;
}

function execSQL($aQuery) {
    if (!is_array($aQuery)) {
        return false;
    }
    if (isset($aQuery['insert']) && isset($aQuery['table']) ) {
        $sQuery = BuildInsertSQL($aQuery);
        return execSqlUpdate($sQuery);
    }
    if (isset($aQuery['update']) && isset($aQuery['table']) && isset($aQuery['where'])) {
        $sQuery = BuildUpdateSQL($aQuery);
        return execSqlUpdate($sQuery);
    }
    if (isset($aQuery['select']) && isset($aQuery['table']) ) {
        $sQuery = BuildSelectSQL($aQuery);
        return execSqlLists($sQuery);
    }

    return false;
}

?>