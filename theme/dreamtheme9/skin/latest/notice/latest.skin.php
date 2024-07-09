<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
$thumb_width = 80;
$thumb_height = 80;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="notice ft_cnt">
    <ul>
    <?php 
    for ($i=0; $i<$list_count; $i++) {  
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['src'];
        } else {
            $img = G5_THEME_IMG_URL.'/no_img2.png';
            $thumb['alt'] = '이미지가 없습니다.';
        }
        $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?>
        <?php echo "<a href=\"".get_pretty_url($bo_table, $list[$i]['wr_id'])."\">";  ?>
        <li>
            <?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
            <p class="txt">
                <strong>
                    <?php
                    // if ($list[$i]['icon_secret']) echo "<span class=\"lock_icon\"><i class=\"fa fa-lock\" aria-hidden=\"true\"></i></span> ";
                    // if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
                    //echo $list[$i]['icon_reply']." ";
                    // if ($list[$i]['is_notice'])
                    //     echo "<strong>".$list[$i]['subject']."</strong>";
                    // else
                    echo $list[$i]['subject'];

                    // if ($list[$i]['comment_cnt'])
                    //     echo $list[$i]['comment_cnt'];


                    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                    //if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
                    //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;
                    //if ($list[$i]['icon_hot']) echo " <i class=\"fa fa-heart\" aria-hidden=\"true\"></i>";
                    ?>
                </strong>
                <small>
                    <?php
                    echo utf8_strcut(strip_tags($list[$i]['wr_content']), 30, '...');
                    ?>
                </small>
            </p>
            <p class="datetime">
                <strong>
                    <?php
                    echo date("d", strtotime($list[$i]['datetime']));
                    ?>
                </strong>
                <small>
                    <?php
                    echo date("Y.m", strtotime($list[$i]['datetime']));
                    ?>
                </small>
            </p>
            <!-- <span class="plus">
                <i class="fa-solid fa-plus"></i>
            </span> -->
        </li>
        <?php echo "</a>"; ?>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>
