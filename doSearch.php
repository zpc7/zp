<?php
include_once "include.php";
//接受用户的操作参数
if (isset($_REQUEST["act"])) {
  $act = $_REQUEST["act"];
}

//按条件得到符合要求的所有职位
if ($act == "getJobByCondition") {
  $page = isset($_POST["page"])?$_POST["page"]:1;
  $pageSize = isset($_POST["pageSize"])?$_POST["pageSize"]:4;
  $order = isset($_POST["order"])?$_POST["order"]:null;
  $keywords = isset($_POST["keywords"])?$_POST["keywords"]:null;
  $job_info = getJobsByCondition($tp,$page,$pageSize,$keywords,$order);
  echo json_encode($job_info);
}
