<?php
/**
 * 取得指定条件的职位信息,包括分页
 * @param string $page 当前页数
 * @param string $pageSize 分页大小
 * @param string $order 排序依据
 * @param string $keywords 关键词
 * @return array
 */
function getJobsByCondition($tp, $page = 1, $pageSize = 4, $keywords = null, $order = null) {
  $order = $order != null ? $order : "";
  $orderBy = $order != null ? "order by b." . $order : "";
  $keywords = $keywords != null ? $keywords : "";
  $where = "where 1";
  $where2 = $where1 = "";
  if ($keywords) {
    $where2 = $where . " and jobname like '%{$keywords}%'";
    $where1 = $where . " and b.jobname like '%{$keywords}%'";
  }
  //得到数据库中所有符合条件的数据的条数
  $sql = "select * from  zp_jobs {$where2}";
  $totalRows = getResultNum($sql, $tp);
  $totalPage = ceil($totalRows / $pageSize) < 1 ? 1 : ceil($totalRows / $pageSize);
  $page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
  if ($page < 1 || $page == null || !is_numeric($page))
    $page = 1;
  if ($page > $totalPage)
    $page = $totalPage;
  $offset = ($page - 1) * $pageSize;
  //得到符合条件的所有数据
  //$sql = "select * from zp_jobs {$where} {$orderBy} limit {$offset},{$pageSize}";
  //多表链接查询
  $sql = "select a.name, a.logopath, b.jobid, b.jobname, b.jobtime from zp_jobs b left join zp_company a on a.id = b.jobsubid {$where1} {$orderBy} limit {$offset},{$pageSize}";
  $rows = fetchAll($sql, $tp);
  $job_info = array("sql" => $sql,"page" => $page, "pagesize" => $pageSize, "totalpage" => $totalPage, "totalRows" => $totalRows, "order" => $order, "keywords" => $keywords, "rows" => $rows);
  return $job_info;
}
