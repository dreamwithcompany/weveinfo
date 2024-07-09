<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 내용 빈값 처리
sql_query(" update $write_table set wr_content = '' where wr_id = '$wr_id' ");
?>