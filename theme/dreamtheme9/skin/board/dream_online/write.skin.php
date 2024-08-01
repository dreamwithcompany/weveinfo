<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url; ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) { 
        $option = '';
        /*if ($is_notice) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
        }
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
            }
        }
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }*/
        /*if ($is_mail) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
        }*/
    }
    echo $option_hidden;
    ?>

    <?php if ($is_category) { ?>
    <div class="bo_w_select write_div">
        <label for="ca_name" class="sound_only">분류<strong>필수</strong></label>
        <select name="ca_name" id="ca_name" required>
            <option value="">분류를 선택하세요</option>
            <?php echo $category_option ?>
        </select>
    </div>
    <?php } ?>

    <?php if ($option || $is_admin) { ?>
    <div class="write_div">
        <span class="sound_only">옵션</span>
        <ul class="bo_v_option">
        <?php echo $option ?>
        <a href="<?php echo get_pretty_url($bo_table)?>" class="check-list">문의내역 확인</a>
        </ul>
    </div>
    <?php } ?>

    <div class="form_online">
        <label for="wr_name">성함</label>
        <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input half_input required">
    </div>
    <div class="form_online">
        <label for="wr_email">이메일</label>
        <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" required class="frm_input half_input email required">
    </div>
    <div class="form_online">
        <label for="wr_1">연락처</label>
        <input type="text" name="wr_1" value="<?php echo $wr_1 ?>" id="wr_1" required class="frm_input half_input required ">
    </div>
    <!-- <div class="form_online">
        <label for="wr_2">옵션선택1</label>
        <select id="wr_2" name="wr_2">
            <option value="옵션1">옵션1</option>
            <option value="옵션2">옵션2</option>
            <option value="옵션3">옵션3</option>
            <option value="옵션4">옵션4</option>
            <option value="옵션5">옵션5</option>
        </select>
    </div> -->
    <div class="form_online">
        <div class="form_chk_th">
            분류
        </div>
        <div class="form_chk_tb">
            <input type="checkbox" name="chk1_opt[]" value="전자구매포탈시스템" id="form_chk1">
            <label for="form_chk1">전자구매포탈시스템</label>
            <div class="view"></div>
            <input type="checkbox" name="chk1_opt[]" value="프로젝트형ERP" id="form_chk2">
            <label for="form_chk2">프로젝트형ERP</label>
            <div class="view"></div>
            <input type="checkbox" name="chk1_opt[]" value="선박종합서비스시스템" id="form_chk3">
            <label for="form_chk3">선박종합서비스시스템</label>
            <div class="view"></div>
            <input type="checkbox" name="chk1_opt[]" value="웹수발주시스템" id="form_chk4">
            <label for="form_chk4">웹수발주시스템</label>
            <div class="view"></div>
            <input type="checkbox" name="chk1_opt[]" value="광고정산시스템" id="form_chk5">
            <label for="form_chk5">광고정산시스템</label>
            <div class="view"></div>
            <input type="checkbox" name="chk1_opt[]" value="기타 SI 구축" id="form_chk1">
            <label for="form_chk1">기타 SI 구축</label>
            <div class="view"></div>
            <span>( 복수선택 가능 )</span>
        </div>
    </div>
    <!-- <div class="form_online">
        <div class="form_rad_th">
            옵션선택3
        </div>
        <div class="form_rad_tb">
            <input type="radio" name="wr_4" id="form_rad1" value="옵션1" required class="required">
            <label for="form_rad1">옵션1</label>
            <div class="view"></div>
            <input type="radio" name="wr_4" id="form_rad2" value="옵션2" required class="required">
            <label for="form_rad2">옵션2</label>
            <div class="view"></div>
            <input type="radio" name="wr_4" id="form_rad3" value="옵션3" required class="required">
            <label for="form_rad3">옵션3</label>
            <div class="view"></div>
            <input type="radio" name="wr_4" id="form_rad4" value="옵션4" required class="required">
            <label for="form_rad4">옵션4</label>
            <div class="view"></div>
            <input type="radio" name="wr_4" id="form_rad5" value="옵션5" required class="required">
            <label for="form_rad5">옵션5</label>
        </div>
    </div> -->
    <div class="form_online">
        <label for="wr_subject">문의제목</label>
        <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255">
    </div>

    <div class="form_online form_txt">
        <label for="wr_content">문의내용</label>
        <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
            <?php } ?>
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
            <?php } ?>
        </div>
        
    </div>

    <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
    <!-- <div class="bo_w_link write_div">
        <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){ echo $write['wr_link'.$i]; } ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50">
    </div> -->
    <?php } ?>

    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
    <div class="bo_w_flie write_div">
        <div class="file_wr write_div">
            <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
            <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
        </div>
        <?php if ($is_file_content) { ?>
        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
        <?php } ?>

        <?php if($w == 'u' && $file[$i]['file']) { ?>
        <span class="file_del">
            <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
        </span>
        <?php } ?>
        
    </div>
    <?php } ?>

    <?php $privacy_html = file_get_contents($board_skin_path . '/privacy.html'); ?>
    <div class="privacy">
        <?php echo $privacy_html?>
    </div>
    <div class="privacy-check">
        <label><input type="checkbox" class="required" required/> 개인정보 처리방침에 동의합니다.</label>
    </div>


    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>

    <div class="btn_confirm write_div">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
        <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        // 체크박스 개수 검사
		let cnt2 = 0;
		for(let i = 0 ; i < f.elements.length ; i ++){
			if(f.elements[i].name == "chk1_opt[]") {
                if(f.elements[i].checked == true) {
                    cnt2 ++;
                } 
            } 
		}
		if(cnt2 == 0){
			alert("체크박스를 하나 이상 선택해 주세요.");
			$('.chk1_opt').first().focus();
			return false;
		}
        
        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->