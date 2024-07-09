<?php

$topmenu = [];
$ttNum = 0;
$tsNum = 0;
$submenu = [];
$stNum = 0;
$ssNum = 0;
$cur_filename=basename($_SERVER['PHP_SELF']);
$tNum = "";
$sNum= "";
$sql = " select *  from ".$g5['menu_table']."
where me_use = '1'
and length(me_code) = '2'
order by me_order, me_id ";
$result = sql_query($sql, false);
for ($i=0; $row=sql_fetch_array($result); $i++) {
	// 현재 테마로 메뉴링크 변경
	$row['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row['me_link']);

	$topmenu[$row['me_name']] = $row['me_link'];
	$topmenu_target[$row['me_name']] = "_".$row['me_target'];
	$ttNum++;
	$topmenu_tNum[$row['me_name']] = $ttNum;
	$tsNum = 1;
	$topmenu_sNum[$row['me_name']] = $tsNum;

	$stNum++;
	$ssNum = 0;

	if (isset($_GET['bo_table'])) {
		// 메뉴 링크에 bo_table 파라미터가 포함되어 있고, 그 값이 $_GET['bo_table']과 일치하는지 확인
		$query_str = parse_url($row['me_link'], PHP_URL_QUERY);
		parse_str($query_str, $query_params);
		if (isset($query_params['bo_table']) && $query_params['bo_table'] == $_GET['bo_table']) {
				$tNum = $row['me_name'];
		}
	}else {
		if(strpos($row['me_link'], $cur_filename) !== false) {
			$tNum = $row['me_name'];
		}
	}

	$sql2 = " select * from ".$g5['menu_table']."
	where me_use = '1'
	and length(me_code) = '4'
	and substring(me_code, 1, 2) = '".$row['me_code']."'
	order by me_order, me_id ";
	$result2 = sql_query($sql2);
	for ($k=0; $row2=sql_fetch_array($result2); $k++) {
		// 현재 테마로 메뉴링크 변경
		$row2['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row2['me_link']);

		$submenu[$row['me_name']][$row2['me_name']] = $row2['me_link'];
		$submenu_target[$row['me_name']][$row2['me_name']] = "_".$row2['me_target'];
		$submenu_tNum[$row['me_name']][$row2['me_name']] = $stNum;
		$ssNum++;
		$submenu_sNum[$row['me_name']][$row2['me_name']] = $ssNum;

		if (isset($_GET['bo_table'])) {
			// 메뉴 링크에 bo_table 파라미터가 포함되어 있고, 그 값이 $_GET['bo_table']과 일치하는지 확인
			$query_str = parse_url($row2['me_link'], PHP_URL_QUERY);
			parse_str($query_str, $query_params);
			if (isset($query_params['bo_table']) && $query_params['bo_table'] == $_GET['bo_table']) {
					$tNum = $row['me_name'];
					$sNum = $row2['me_name'];
			}
		}else {
			if(strpos($row2['me_link'], $cur_filename) !== false) {
				$tNum = $row['me_name'];
				$sNum = $row2['me_name'];
			}
		}

	}
}

// 수동 메뉴설정
// $topmenu["회사소개"]=G5_THEME_URL."/company/company01.php";
// $topmenu_target["회사소개"]="_self";
// $topmenu_tNum["회사소개"]="1";
// $topmenu_sNum["회사소개"]="1";

// $submenu["회사소개"]["CEO인사말"]=G5_THEME_URL."/company/company01.php";
// $submenu_target["회사소개"]["CEO인사말"]="_self";
// $submenu_tNum["회사소개"]["CEO인사말"]="1";
// $submenu_sNum["회사소개"]["CEO인사말"]="1";

// $submenu["회사소개"]["회사연혁"]=G5_THEME_URL."/company/company02.php";
// $submenu_target["회사소개"]["회사연혁"]="_self";
// $submenu_tNum["회사소개"]["회사연혁"]="1";
// $submenu_sNum["회사소개"]["회사연혁"]="2";

// $submenu["회사소개"]["조직도"]=G5_THEME_URL."/company/company03.php";
// $submenu_target["회사소개"]["조직도"]="_self";
// $submenu_tNum["회사소개"]["조직도"]="1";
// $submenu_sNum["회사소개"]["조직도"]="3";

// $submenu["회사소개"]["오시는길"]=G5_THEME_URL."/company/company04.php";
// $submenu_target["회사소개"]["오시는길"]="_self";
// $submenu_tNum["회사소개"]["오시는길"]="1";
// $submenu_sNum["회사소개"]["오시는길"]="4";

// $topmenu["커뮤니티"]=G5_BBS_URL."/board.php?bo_table=notice";
// $topmenu_target["커뮤니티"]="_self";
// $topmenu_tNum["커뮤니티"]="6";
// $topmenu_sNum["커뮤니티"]="1";

// $submenu["커뮤니티"]["공지사항"]=G5_BBS_URL."/board.php?bo_table=notice";
// $submenu_target["커뮤니티"]["공지사항"]="_self";
// $submenu_tNum["커뮤니티"]["공지사항"]="6";
// $submenu_sNum["커뮤니티"]["공지사항"]="1";

// $submenu["커뮤니티"]["채용공고"]=G5_BBS_URL."/board.php?bo_table=employment";
// $submenu_target["커뮤니티"]["채용공고"]="_self";
// $submenu_tNum["커뮤니티"]["채용공고"]="6";
// $submenu_sNum["커뮤니티"]["채용공고"]="2";


// 수동 메뉴설정 게시판
// if($bo_table=="notice"){
// 	$tNum="커뮤니티";
// 	$sNum="공지사항";
// }

// if($bo_table=="employment"){
// 	$tNum="커뮤니티";
// 	$sNum="채용공고";
// }

// 수동 메뉴설정 게시판이 아닌 경우
// if($cur_filename=="company01.php"){
// 	$tNum="회사소개";
//  	$sNum="CEO인사말";
// }

// if($cur_filename=="company02.php"){
// 	$tNum="회사소개";
//  	$sNum="회사연혁";
// }

// if($cur_filename=="company03.php"){
// 	$tNum="회사소개";
//  	$sNum="조직도";
// }

// if($cur_filename=="company04.php"){
// 	$tNum="회사소개";
//  	$sNum="오시는길";
// }

if($co_id=="privacy"){
	$tNum="고객센터";
	$sNum="개인정보 처리방침";
}

if($co_id=="provision"){
	$tNum="고객센터";
	$sNum="서비스 이용약관";
}

if($cur_filename=="qalist.php" || $cur_filename=="qawrite.php" || $cur_filename=="qaview.php"){
	$tNum="고객센터";
 	$sNum="1:1문의";
}

if($cur_filename=="faq.php"){
	$tNum="고객센터";
 	$sNum="자주묻는 질문";
}

if($cur_filename=="new.php"){
	$tNum="사업실적";
 	$sNum="전체보기";
}

if($cur_filename=="login.php"){
	$tNum="로그인";
 	$sNum="로그인";
}

if($cur_filename=="register.php"){
	$tNum="회원가입";
 	$sNum="회원가입";
}

if($cur_filename=="register_form.php"){
	$tNum="정보수정";
 	$sNum="정보수정";
}

?>
