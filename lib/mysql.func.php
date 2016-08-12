<?php
	/**
	 * 连接数据库
	 * @return resource
	 */
	function connect(){
		$servername = DB_HOST;
		$username = DB_USER;
		$password = DB_PWD;
		$dbname = DB_DBNAME;

		// 创建连接
		//打开指定数据库
		$conn = new mysqli($servername, $username, $password,$dbname);
		mysqli_set_charset($conn,"utf8");
		// 检测连接
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}else{
			// echo "Connected successfully 23333<br/>";
		}
		return $conn;
	}
	/**
	 * 数据库增加操作
	 * @param string $table
	 * @param array $array
	 * @param object $conn
	 * @return number
	 */
	function insert($table,$array,$conn){
		$keys=join(",",array_keys($array));
		$vals="'".join("','",array_values($array))."'";
		$sql="insert into {$table}($keys) values({$vals})";
		// print_r($sql);
		mysqli_query($conn,$sql);
		return mysqli_insert_id($conn);
	}

	/**
	 * 数据库更新操作
	 * @param string $table
	 * @param array $array
	 * @param string $where
	 * @return number
	 */
	function update($table,$array,$conn,$where=null){
		$str=null;
		foreach($array as $key=>$val){
			if($str==null){
				$sep="";
			}else{
				$sep=",";
			}
			$str.=$sep.$key."='".$val."'";
		}
			$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
			// print_r($sql);
			$result=mysqli_query($conn,$sql);
			if($result){
				return mysqli_affected_rows($conn);
			}else{
				return false;
			}
	}

	/**
	 *	删除记录
	 * @param string $table
	 * @param string $where
	 * @return number
	 */
	function delete($table,$conn,$where=null){
		$where=$where==null?null:" where ".$where;
		$sql="delete from {$table} {$where}";
		mysqli_query($conn,$sql);
		return mysqli_affected_rows($conn);
	}

	/**
	 *得到指定一条记录
	 * @param string $sql
	 * @param string $result_type
	 * @return multitype:
	 */
	function fetchOne($sql,$conn){
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	// function fetchOne($sql,$conn){
	// 	$result=mysqli_query($conn,$sql);
	// 	$row=mysqli_fetch_array($result);
	// 	return $row;
	// }
	/**
	 * 得到结果集中所有记录 ...
	 * @param string $sql
	 * @param string $result_type
	 * @return multitype:
	 */
	function fetchAll($sql,$conn){
		$result=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $rows;
	}

	/**
	 * 得到结果集中的记录条数
	 * @param unknown_type $sql
	 * @return number
	 */
	function getResultNum($sql,$conn){
		$result=mysqli_query($conn,$sql);
		return mysqli_num_rows($result);
	}

	/**
	 * 得到上一步插入记录的ID号
	 * @return number
	 */
	function getInsertId(){
		return mysqli_insert_id();
	}


?>