<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 380;
$thumb_height = 270;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="lat_head">
    <h2 class="lat_title">사업실적</h2>
    <p class="lat_so_title">위브정보기술 주요사업실적입니다.</p>
</div>
<div class="portfolio">
    <ul>
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
        <li class="pro_li">
            <a href="<?php echo $wr_href; ?>" class="lt_img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
            <div class="lt_info">
                <a href="<?php echo $wr_href; ?>"><p class="lt_sub"><?php echo $list[$i]['subject'] ?></p></a>
                <p class="lt_con"><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 24, '...'); ?></p>
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
