<?php
	class Model {
		public function fetch($sql){
			global $con;
			$result = mysqli_query($con,$sql);
			$arr = array();
			while($rows = mysqli_fetch_array($result))
				$arr[] = $rows;
			return $arr;
		}
		
		public function fetchOne($sql){
			global $con;
			$result = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($result);
			return $rows;
		}

		public function execute($sql){
			global $con;
			mysqli_query($con,$sql);
		}

		public function count($sql){
			global $con;
			$result = mysqli_query($con,$sql);
			return mysqli_num_rows($result);
		}

		public function getId($idName, $tblName){
			global $con;
			$result = mysqli_query($con,"select $idName from $tblName order by $idName desc limit 0,1");
			$rows = mysqli_fetch_array($result);
			return $rows;
		}
	}
