<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 500;
?>


<?php 
    // 그룹별 전체 게시물을 가져와 게시판마다 10개씩만 출력
    $cnt = 0;

    if(empty($sel_bo_table)){
?>
    <div class="news_list all">
        <!-- 뉴스룸 물방울 애니메이션 -->
        <!-- 사용안하실 경우 이 부분 주석 해주세요. -->
        <!--<div class="particles_id" id="particles_all"></div>-->
        <!-- 뉴스룸 물방울 애니메이션 -->
            <div class="news_bannner swiper-container">
<?php 
    }else if(!empty($sel_bo_table)){
?>
    <div class="news_list <?php echo $sel_bo_table ?>" style="display: none;">
        <!-- 뉴스룸 물방울 애니메이션 -->
        <!-- 사용안하실 경우 이 부분 주석 해주세요. -->
        <!--<div class="particles_id" id="particles_<?php echo $sel_bo_table ?>"></div>-->
        <!-- 뉴스룸 물방울 애니메이션 -->
            <div class="news_bannner swiper-container">
<?php
    }
    $sql_tab = "select bo_table, bo_subject
        from {$g5['board_table']}
        where gr_id = 'news_room' ";
    $result_tab = sql_query($sql_tab);
?>
    <?php
        if(empty($sel_bo_table)){
    ?>
        <a class="btn_more all" href="<?php echo G5_BBS_URL ?>/new.php?gr_id=<?php echo $gr_id ?>"><span class="sound_only">NEWSROOM</span>NEWSROOM 더보기<i class="fa-solid fa-chevron-right"></i></i><span class="sound_only"> 더보기</span></a>
    <?php
        }else if(!empty($sel_bo_table)){
    ?>
        <a class="btn_more all" href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $sel_bo_table ?>"><span class="sound_only">NEWSROOM</span>NEWSROOM 더보기<i class="fa-solid fa-chevron-right"></i><span class="sound_only"> 더보기</span></a>
    <?php
        }
    ?>

    <!-- 카테고리 탭 영역 -->
    <div class="top row">
        <div class="cate_list">
            <div class="cate_title">
                <button class="all" style='background: #fff; border: 1px solid #333331; color: #333331' onclick='latest_tname("all")'>전체</button>
                <?php  for ($i=0; $k=sql_fetch_array($result_tab); $i++) {
                    echo "<button class=".$k['bo_table']." onclick='latest_tname(\"".$k['bo_table']."\")'>".$k['bo_subject']."</button>";	
                } ?>
            </div>
        </div>
        <div class="swiper-navigation">
            <button class="prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="next"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
    <!-- 카테고리 탭 영역 끝-->
    <hr class="divider">

    
    <script>
        var particle_id = "";
        function latest_tname(bo_table){
            /* 뉴스룸에 사용할 변수 */
            particle_id = bo_table;

            // 모든 span 태그의 스타일을 초기 상태로 되돌림.
            $(".cate_title button").css("background", "");
            $(".cate_title button").css("border", "");
            $(".cate_title button").css("color", "");

            // 클릭된 span 태그의 스타일을 변경함.
            $(`.cate_title button.${bo_table}`).css("background", "#fff");
            $(`.cate_title button.${bo_table}`).css("border", "#333331");
            $(`.cate_title button.${bo_table}`).css("color", "#333331");

            $(".news_list").css("display", "none");
            
            if (bo_table === 'all') {
                // 모든 게시글을 보여줌.
                $("div.all").css("display", "block");
            } else {
                // 선택한 게시판의 게시글만 보여줌.
                const targetList = $(`div.${bo_table}`);
                targetList.css("display", "block");
                
                // 해당 div 내부의 ul이 비어 있는지 확인
                if (targetList.find("ul").children().length === 0) {
                    targetList.find("ul").append("<li class='empty_li'>게시물이 없습니다.</li>");
                }
            }
        }
    </script>

    <!--<h2 class="lat_title"><a href="<?php echo G5_BBS_URL ?>/new.php?gr_id=<?php echo $gr_id ?>"><?php echo $gr_subject; ?></a></h2>-->
    <ul class="list swiper-wrapper">
    <?php
    for ($i=0; $i<count($list); $i++) {
    if($cnt >= 10) break;
    $thumb = get_list_thumbnail($list[$i]['bo_table'], $list[$i]['wr_id'], false, true);

    if($thumb['ori']) {
        $img = $thumb['ori'];
    } else {
        // 해당 게시판의 no_img가져오기
        //$img = G5_THEME_IMG_URL.'/'.$list[$i]['bo_table'].'_no_img.png'; //ex) test_no_img.png
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';

    if($sel_bo_table == $list[$i]['bo_table']){
        $cnt++;
    ?>
        <li class="swiper-slide">
            <div class="flip">
                <div class="card">
                    <div class="front">
                        <div class="img bg"><?php echo $img_content; ?></div>
                        <div class="text_box">
                            <em class="cate"><?php echo strip_tags($list[$i]['bo_subject']) ?></em>
                            <h2 class="tit">
                            <?php 
                            $subject_text = strip_tags($list[$i]['wr_subject']);
                            echo (mb_strlen($subject_text) > 20) ? mb_substr($subject_text, 0, 20) . "..." : $subject_text;
                            ?></h2>
                            <div class="info">
                                <!-- <p class="desc">
                                <?php 
                                $content_text = strip_tags($list[$i]['wr_content']);
                                echo (mb_strlen($content_text) > 20) ? mb_substr($content_text, 0, 20) . "..." : $content_text;
                                ?></p> -->
                                <span class="date"><?php echo $list[$i]['datetime'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="text_box">
                            <h2 class="tit">[<?php echo strip_tags($list[$i]['bo_subject']) ?>]
                            <?php
                            $subject_text = strip_tags($list[$i]['wr_subject']);
                            echo (mb_strlen($subject_text) > 20) ? mb_substr($subject_text, 0, 20) . "..." : $subject_text;
                            ?></h2>
                            <div class="info">
                                <p class="desc">
                                <?php
                                $content_text = strip_tags($list[$i]['wr_content']);
                                echo (mb_strlen($content_text) > 20) ? mb_substr($content_text, 0, 20) . "..." : $content_text;
                                ?></p>
                                <a class="btn_more" href="<?php echo $list[$i]['href'] ?>" title="">자세히보기<i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php }else if(empty($sel_bo_table)){ 
        $cnt++;
    ?>
        <li class="swiper-slide">
            <div class="flip">
                <div class="card">
                    <div class="front">
                        <div class="img bg"><?php echo $img_content; ?></div>
                        <div class="text_box">
                            <em class="cate"><?php echo strip_tags($list[$i]['bo_subject']) ?></em>
                            <h2 class="tit">
                            <?php 
                            $subject_text = strip_tags($list[$i]['wr_subject']);
                            echo (mb_strlen($subject_text) > 20) ? mb_substr($subject_text, 0, 20) . "..." : $subject_text;
                            ?></h2>
                            <div class="info">
                                <!-- <p class="desc">
                                <?php
                                $content_text = strip_tags($list[$i]['wr_content']);
                                echo (mb_strlen($content_text) > 20) ? mb_substr($content_text, 0, 20) . "..." : $content_text;
                                ?></p> -->
                                <span class="date"><?php echo $list[$i]['datetime'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="text_box">
                            <h2 class="tit">[<?php echo strip_tags($list[$i]['bo_subject']) ?>]
                            <?php
                            $subject_text = strip_tags($list[$i]['wr_subject']);
                            echo (mb_strlen($subject_text) > 20) ? mb_substr($subject_text, 0, 20) . "..." : $subject_text;
                            ?></h2>
                            <div class="info">
                                <p class="desc">
                                <?php
                                $content_text = strip_tags($list[$i]['wr_content']);
                                echo (mb_strlen($content_text) > 20) ? mb_substr($content_text, 0, 20) . "..." : $content_text;
                                ?></p>
                                <a class="btn_more" href="<?php echo $list[$i]['href'] ?>" title="">자세히보기<i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php }} ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
        <li class="empty_li">게시물이 없습니다.</li>
    <?php } ?>
    </ul>
    </div>

</div>


<script>
    $(document).ready(function() {
        const swiper = new Swiper('.news_bannner', {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: false,
            navigation: {
            nextEl: '.news_list .next',
            prevEl: '.news_list .prev',
            },
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
            breakpoints: {
                360: {
                    slidesPerView: 1,  //브라우저가 768보다 클 때
                },
                768: {
                    slidesPerView: 2,  //브라우저가 768보다 클 때
                },
                1024: {
                    slidesPerView: 3,  //브라우저가 1024보다 클 때
                },
            },
        });
    });
</script>

<!-- 뉴스룸 물방울 애니메이션 -->
<svg>
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12" />
      <feColorMatrix in="blur" result="colormatrix" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -9" />
      <feBlend in="SourceGraphic" in2="colormatrix" />
    </filter>
  </defs>
</svg>

<script>
    var circle = '<svg viewBox="0 0 67.4 67.4"><circle class="circle" cx="33.7" cy="33.7" r="33.7"/></svg>'

    class Particle{
        
    constructor(svg, coordinates, friction){
        this.svg = svg
        this.steps = ($(window).height())/2
        this.item = null
        this.friction = friction
        this.coordinates = coordinates
        this.position = this.coordinates.y
        this.dimensions = this.render()
        this.move()
        this.rotation = Math.random() > 0.5 ? "-" : "+"
        this.scale = 0.4 + (Math.random()*2)
        this.siner = $(window).width()/2.5 * Math.random()
    }
    destroy(){
        this.item.remove()
    }
    
    move(){
        this.position = this.position - this.friction
        let top = this.position;
        let left = this.coordinates.x + Math.sin(this.position*Math.PI/this.steps) * this.siner;
        this.item.css({
        transform: "translateX("+left+"px) translateY("+top+"px) scale(" + this.scale + ") rotate("+(this.rotation)+(this.position + this.dimensions.height)+"deg)"
        })

        if(this.position < -(this.dimensions.height)){
        this.destroy()
        return false
        }else{
        return true
        }
    }
    
    render(){
        this.item = $(this.svg, {
        css: {
            transform: "translateX("+this.coordinates.x+"px) translateY("+this.coordinates.y+"px)"
        }
        })

        if(!particle_id){
            $("#particles_all").append(this.item)
        }else{
            $("#particles_" + particle_id).append(this.item)
        }
        
        return {
        width: this.item.width(),
        height: this.item.height()
        }
    }
    }


    let isPaused = false;
    window.onblur = function() {
        isPaused = true;
    }.bind(this)
    window.onfocus = function() {
        isPaused = false;
    }.bind(this)

    //-------------------------------
    var particles = []

    setInterval(function(){
    if (!isPaused){
        particles.push(
        new Particle(circle, {
        "x": (Math.random() * $(window).width()),
        //"y": $(window).height() + 100
        "y": 600
        }, (1 + Math.random()) )
        )
    }
    }, 180)

    function update(){
    particles = particles.filter(function(p){
        return p.move()
    })
    requestAnimationFrame(update.bind(this))
    }
    update()
</script>
<!-- 뉴스룸 물방울 애니메이션 -->