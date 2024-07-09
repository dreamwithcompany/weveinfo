<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 365;
$thumb_height = 260;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="swiper-navigation-por">
    <h2 class="lat_title">주요 구축사례</h2>
    <p class="lat_so_title">위브정보기술 주요 구축사례 입니다.</p>
    <!-- <button class="por-prev"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="por-next"><i class="fa-solid fa-chevron-right"></i></button> -->
    <!--<a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a>-->
</div>
<div class="swiper-container swiper-portfolio">
    <ul class="swiper-wrapper">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_THEME_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <li class="swiper-slide pro_li">
            <a href="<?php echo $wr_href; ?>" class="lt_img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
            <div class="lt_info">
                <a href="<?php echo $wr_href; ?>"><p class="lt_sub"><?php echo $list[$i]['subject'] ?></p></a>
                <!-- <p class="lt_con"><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 30, '..'); ?></p> -->
                <!-- <span class="lt_nick"><?php echo $list[$i]['name'] ?></span> -->
                <!-- <span class="lt_date"><?php echo $list[$i]['datetime'] ?></span> -->
            </div>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>
<div class="por-pagination"></div>


<script>
    $(document).ready(function() {
        const swiper = new Swiper('.swiper-portfolio', {
            slidesPerView: 5,
            spaceBetween: 20,
            centeredSlides: false,
            navigation: {
            nextEl: '.por-next',
            prevEl: '.por-prev',
            },
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
            pagination: {
                el: '.por-pagination',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,  //브라우저가 360이상일 때
                },
                481: {
                    slidesPerView: 2,  //브라우저가 481이상일 때
                },
                769: {
                    slidesPerView: 3,  //브라우저가 769이상일 때
                },
                1025: {
                    slidesPerView: 4,  //브라우저가 1025이상일 때
                },
            },
        });
    });
</script>
