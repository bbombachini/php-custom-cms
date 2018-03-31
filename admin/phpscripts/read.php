<?php
		ini_set('display_errors',1);
		error_reporting(E_ALL);

		require_once('functions.php');
		function getAll($tbl){
			include('connect.php');

			$queryAll = "SELECT * FROM {$tbl} WHERE active=1";
			$runAll = mysqli_query($link, $queryAll);
			// echo $queryAll;
			if($runAll) {
				return $runAll;
			} else {
				$error = "There was a problem accessing this information. Sorry about it.";
				return $error;
			}
			mysqli_close($link);

		}
		function getSingle($tbl, $col, $id) {
			include('connect.php');

			$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
			// echo $querySingle;
			$runSingle = mysqli_query($link, $querySingle);

			if($runSingle) {
				return $runSingle;
			} else {
				$error = "There was a problem accessing this information. Sorry about it.";
				return $error;
			}

			mysqli_close($link);
		}
		function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
			include('connect.php');

			$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3} = '{$filter}';";

			// echo $filterQuery;
			$runQuery = mysqli_query($link, $filterQuery);
			if($runQuery) {
				return $runQuery;
			} else {
				$error = "There was a problem accessing this information. Sorry about it.";
				return $error;
			}

			mysqli_close($link);
		}

		if(isset($_GET['delete'])){
			$dir = $_GET['delete'];
			if($dir == "movies"){
				$id = $_GET['id'];
				$tbl = "tbl_movies";
				$col = "movies_id";
			}
			if($dir == "genre"){
				$id = $_GET['id'];
				$tbl = "tbl_genre";
				$col = "genre_id";
			}
			deleteSingle($id, $tbl, $col);
		}

		function deleteSingle($id, $tbl, $col){
			include('connect.php');
			$deleteQuery = "UPDATE {$tbl} SET active = 0 WHERE {$col} = {$id};";
			$delete = mysqli_query($link, $deleteQuery);
			if($delete) {
				redirect_to("../admin_index.php");
			} else {
				$error = "There was a problem processing this request. Try again later.";
				return $error;
			}
			mysqli_close($link);
		}

?>
