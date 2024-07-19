<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_THEME_PATH.'/lib/latest_group.lib.php');
include_once(G5_THEME_PATH.'/dreammenu.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <?php
        if(defined('_INDEX_')) { // index에서만 실행
            include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
        }
    ?>

    <!-- pc 상단 메뉴 -->
    <nav id="header">
        <div class="head_width">
            <div class="head_menu" id="dream_head">
            <div class="logo">
                <a href="<?php echo G5_URL ?>" class="logo1">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/logo.png" alt="" title="">
                </a>
                <a href="<?php echo G5_URL ?>" class="logo2">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/logo_white.png" alt="" title="">
                </a>
            </div>
            <ul class="main_menu" id="dream_menu">
                <?php
                $menu_datas = get_menu_db(0, true);
                $i = 0;
                foreach( $menu_datas as $row ){
                    if( empty($row) ) continue;
                    // 현재 테마로 메뉴링크 변경
	                $row['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row['me_link']);
                ?>
                <li class="dept1">
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
                    <ul class="sub_menu">
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){
                            // 현재 테마로 메뉴링크 변경
		                    $row2['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row2['me_link']);
                            if($k == 0){}
                        ?>
                            <li class="dept2">
                                <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" ><?php echo $row2['me_name'] ?></a>
                            </li>
                        <?php
                        $k++;
                        } 
                        ?>
                    </ul>
                </li>
                <?php
                $i++;
                } 
                if ($i == 0) {  ?>
                    <li class="dept1">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
            </ul>

            <div class="head_login_wrap">
                <!-- <ul class="head_login">
                <?php if ($is_member) {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                <?php if ($is_admin) {  ?>
                <li><a href="<?php echo G5_ADMIN_URL ?>">관리자</a></li>
                <?php }  ?>
                <?php } else {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                <?php }  ?>
                </ul> -->

                <a href="#" class="menu_bar">
                <span></span>
                <span></span>
                <span></span>
                </a>
            </div>

            <!-- 사이트맵 -->
            <div class="menu_open">
                <div class="site_map_wrap head_width">
                <h2>
                    <img src="<?php echo G5_THEME_IMG_URL ?>/logo.png" alt="">
                    <a href="#" class="menu_bar menu_bar2">
                    <span></span>
                    <span></span>
                    <span></span>
                    </a>
                </h2>
                <ul class="site_map">
                    <?php
                    $menu_datas = get_menu_db(0, true);
                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue;
                        // 현재 테마로 메뉴링크 변경
	                    $row['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row['me_link']);
                        ?>
                        <li class="dept1">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
                            <ul class="site_menu">
                                <?php
                                $k = 0;
                                foreach( (array) $row['sub'] as $row2 ){
                                    // 현재 테마로 메뉴링크 변경
		                            $row2['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row2['me_link']);
                                    if($k == 0){}
                                ?>
                                    <li class="dept2">
                                        <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" ><?php echo $row2['me_name'] ?></a>
                                    </li>
                                <?php
                                $k++;
                                } 
                                ?>
                            </ul>
                        </li>
                    <?php
                    $i++;
                    }
                    if ($i == 0) {  ?>
                        <li class="dept1">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="menu_bg"></div>
    </nav>

    <!-- 모바일 메뉴 -->
    <div class="mobile_head">
        <div class="mobile_logo">
            <a href="<?php echo G5_URL ?>" class="logo1">
                <img src="<?php echo G5_THEME_URL ?>/img/logo.png" alt="">
            </a>
            <a href="<?php echo G5_URL ?>" class="logo2">
                <img src="<?php echo G5_THEME_URL ?>/img/logo_white.png" alt="">
            </a>
        </div>
        <div class="mobile_btn">
            <a href="javascript:" class="mobile_open">
                <i class="fa fa-outdent"></i>
            </a>
        </div>
        </div>
        <div class="mob_bg"></div>

        <div id="mobile_menu" class="mobile_menu">

        <div class="mob_logo">
            <a href="<?php echo G5_URL ?>/index.php"><img src="<?php echo G5_THEME_URL ?>/img/logo.png" alt="" ></a>
            <div class="m_lang_wrap">
            <span class="mobile_close"><i class="fa fa-times"></i></span>
            </div>
        </div>

        <div class="mob_menu">
            <!-- <ul class="mob_menu_btn">
                <?php if ($is_member) {  ?>
                    <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                    <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                <?php if ($is_admin) {  ?>
                    <li><a href="<?php echo G5_ADMIN_URL ?>"><i class="fa-solid fa-gear"></i>관리자</a></li>
                <?php }  ?>
                <?php } else {  ?>
                    <li><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa-solid fa-user-plus"></i>회원가입</a></li>
                    <li><a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fa-solid fa-user"></i>로그인</a></li>
                <?php }  ?>
            </ul> -->
            <?php
            $menu_datas = get_menu_db(0, true);
            $i = 0;
            foreach( $menu_datas as $row ){
                if( empty($row) ) continue;
                // 현재 테마로 메뉴링크 변경
                $row['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row['me_link']);

                // 2차 메뉴가 비어 있는지 확인
                $has_sub_menu = !empty($row['sub']);
                $menu_link = $has_sub_menu ? "#" : $row['me_link']; // 2차 메뉴가 없으면 1차 메뉴의 링크를 사용
            ?>
            <a href="<?php echo $menu_link; ?>" target="_<?php echo $row['me_target']; ?>" class="top_menu"><?php echo $row['me_name'] ?><i class="fa-solid fa-angle-down"></i></a>
            <ul class="sub_menu">
                <?php
                $k = 0;
                foreach( (array) $row['sub'] as $row2 ){
                    // 현재 테마로 메뉴링크 변경
                    $row2['me_link'] = str_replace('dreamwithcompany', $_GET['theme'], $row2['me_link']);
                    if($k == 0){}
                ?>
                    <li>
                        <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" ><?php echo $row2['me_name'] ?></a>
                    </li>
                <?php
                $k++;
                }
            ?>
            </ul>
            <?php
            $i++;
            }
            
            if ($i == 0) {  ?>
                <li>메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
            <?php } ?>
        </div>
    </div>
    <div class="mob_bg"></div>

    <!-- 서브메뉴 -->
    <?php
    if (!defined("_INDEX_")){ ?>
    <div class="sub_visual" style="background:url('<?php echo G5_THEME_IMG_URL ?>/subvisual<?php echo $topmenu_tNum[$tNum] ?>.png')">
        <div class="sub_top_text">
        <h3><?php echo $tNum ?></h3>
        </div>
    </div>
    <div class="lnb_wrap">
        <div class="lnb">
            <ul class="lnb_map width">
                <li class="home"><a href="<?php echo G5_URL ?>"><i class="fa fa-home"></i></a></li>

                <!-- 1차 메뉴 -->
                <li class="dep">
                <a href="#"><span><?php echo $tNum ?> <i class="fa-solid fa-angle-down"></i></span></a>
                    <ul>
                        <?php foreach($topmenu as $tmenu=>$url){ ?>
                            <li><a href="<?php echo $url?>" target="<?php echo $topmenu_target[$tmenu] ?>"><?php echo $tmenu?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <!-- 2차 메뉴 -->
                <li class="dep">
                    <a href="#">
                        <span><?php echo $sNum ?><i class="fa-solid fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <?php 
                            if(isset($submenu[$tNum])){
                                foreach($submenu[$tNum] as $smenu=>$surl){ 
                        ?>
                            <li><a href="<?php echo $surl?>" target="<?php echo $submenu_target[$smenu][$smenu]?>"><?php echo $smenu?></a></li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>

        <script type="text/javascript">
        $(document).ready(function (){
            $('.lnb .dep a').click(function(){
                $('.lnb .dep ul').not($(this).siblings('ul')).hide();
                $(this).siblings('ul').toggle();
            });
        });
        </script>
    </div>
    <?php }
    ?>
</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
    
    <div id="container">
        <?php if (!defined("_INDEX_")) {
            // 여백 없애기
            if($cur_filename=="company04_1.php" || $cur_filename=="business01_3.php" || $cur_filename=="business01_4.php" || $cur_filename=="company_c_01.php" ){
            ?>
            <div class="content n_mg">
            <?php
            }else if($cur_filename=="faq.php") {
            ?>
            <div class="content" style="max-width: 1400px;">
            <?php
            }else {
            ?>
            <div class="content">
            <?php
            }
        ?>
        <?php }