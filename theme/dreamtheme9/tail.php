<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
        </div>
    </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <!--<div id="ft_wr">
        <div id="ft_link" class="ft_cnt">
            <a href="<?php echo G5_THEME_URL ?>/company/company01_1.php">드림위드컴퍼니 소개</a>
            <a href="<?php echo G5_THEME_URL ?>/company/company06_1.php">찾아오시는 길</a>
            <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보 취급방침</a>
        </div>
	</div>-->
    <div id="ft_company" class="ft_cnt">
        <div class="ft_logo">
            <img src="<?php echo G5_THEME_IMG_URL ?>/logo_white.png" alt=""/>
        </div>
        <div class="ft_area">
            <h2 class="sound_only">사이트 정보</h2>
            <!-- <p class="ft_info">(주)드림위드컴퍼니</p> -->
            <ul>
                <li>(주)위브정보기술</li>
                <li>대표 : 김덕수</li>
                <li>주소 : 서울특별시 서초구 강남대로95길 19-4, 5층 501호(잠원동, 호영빌딩)</li>
                <li>사업자등록번호 : 119-86-27476</li><br>
                <li>TEL : 02-857-5655</li>
                <li>FAX : 02-857-5654</li>
                <li>E-MAIL : <a href="mailto:weve01@weveinfo.com">weve01@weveinfo.com</a></li>
            </ul>
            <p class="ft_copy">Copyright (C) 2024 WEVEINFO. All rights reserved. Designed By DreamWithCompany.</p>
        </div>
        <!--<div id="ft_catch">
            <p class="service_tit">고객지원</p>
            <p class="service_tell">02-430-9688</p>
            <p class="service_txts">
                평일 오전 09:00 ~ 오후 18:00<br>
                주말, 공휴일 휴무
            </p>
        </div>-->
    </div>  

    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});

</script>

<script>
  AOS.init();
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");