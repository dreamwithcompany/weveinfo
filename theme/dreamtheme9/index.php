<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


<section id="banner_wrap">
  <div class="swiper-container main_ban_conainer">
        <div class="swiper-wrapper">
          <div class="swiper-slide item">        
              <img class="m_img" src="<?php echo G5_THEME_IMG_URL?>/m_main_img1.png" alt="">
              <img class="pc_img" src="<?php echo G5_THEME_IMG_URL?>/main_img1.png" alt="">
              <p class="txt2">
                2010 START YOUR BUSINES
              </p>
              <p class="txt">
                START<br>
                YOUR BUSINESS
              </p>
              <p class="txt3">
                성공적인 사업을 위한 든든한 파트너,<br>
                위브정보기술과 함께 하겠습니다.
              </p>
          </div>
          <?php 
          /*
            유투브동영상 아이디를 /테마/js/main.js 22번째 라인에 넣어 주세요.
            유투브동영상 아이디는 유투브동영상 url의 v값이 아이디입니다. https://www.youtube.com/watch?v=유투브아이디
          */
          ?>
          <div class="swiper-slide item">        
              <img class="m_img" src="<?php echo G5_THEME_IMG_URL?>/m_main_img2.png" alt="">
              <img class="pc_img" src="<?php echo G5_THEME_IMG_URL?>/main_img2.png" alt="">
              <p class="txt2">
                2010 START YOUR BUSINES
              </p>
              <p class="txt">
                START<br>
                YOUR BUSINESS
              </p>
              <p class="txt3">
                성공적인 사업을 위한 든든한 파트너,<br>
                위브정보기술과 함께 하겠습니다.
              </p>
          </div>
          <!-- <div class="swiper-slide item youtube">
            <div class="youtube-player" id="youtube-player"></div>
            <div class="player-overlay"></div>
            <p class="txt">유튜브 영상이 포함된 슬라이드</p>
          </div> -->
          <div class="swiper-slide item">        
              <img class="m_img" src="<?php echo G5_THEME_IMG_URL?>/m_main_img3.png" alt="">
              <img class="pc_img" src="<?php echo G5_THEME_IMG_URL?>/main_img3.png" alt="">
              <p class="txt2">
                2010 START YOUR BUSINES
              </p>
              <p class="txt">
                START<br>
                YOUR BUSINESS
              </p>
              <p class="txt3">
                성공적인 사업을 위한 든든한 파트너,<br>
                위브정보기술과 함께 하겠습니다.
              </p>
          </div>
        </div>
        <div class="swiper-bottom">
          <div class="progress">
          </div>
          <div class="swiper-navigation">
            <button class="prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="next"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
    </div>
</section>

<section id="main_top_box3">
  <div class="main_top_item">
    <ul>
      <li>
        <a href="<?php echo G5_THEME_URL ?>/company/company01_2.php" target="_self">
          <i class="fa fa-building" aria-hidden="true"></i>
          <h2>회사개요</h2>
          <p>위브정보기술의 회사개요를<br> 알려드립니다.</p>
        </a>
      </li>
      <li>
        <a href="<?php echo G5_THEME_URL ?>/company/company03_1.php" target="_self">
          <i class="fa fa-list-ul" aria-hidden="true"></i>
          <h2>비전</h2>
          <p>위브정보기술의 비전을<br> 알려드립니다.</p>
        </a>
      </li>
      <li>
        <a href="<?php echo G5_THEME_URL ?>/company/company04_2.php" target="_self">
          <i class="fa fa-line-chart" aria-hidden="true"></i>
          <h2>연혁</h2>
          <p>위브정보기술의 연혁을<br> 알려드립니다.</p>
        </a>
      </li>
      <li>
        <a href="<?php echo get_pretty_url("performance2")?>" target="_self">
          <i class="fa fa-cubes" aria-hidden="true"></i>
          <h2>사업실적</h2>
          <p>위브정보기술의 사업실적을<br> 알려드립니다.</p>
        </a>
      </li>
      <li>
        <a href="<?php echo get_pretty_url("license")?>" target="_self">
          <i class="fa fa-certificate" aria-hidden="true"></i>
          <h2>인증서</h2>
          <p>위브정보기술의 인증서를<br> 알려드립니다.</p>
        </a>
      </li>
      <li>
        <a href="<?php echo G5_THEME_URL ?>/company/company06_2.php" target="_self">
          <i class="fa-solid fa-location-dot"></i>
          <h2>오시는길</h2>
          <p>위브정보기술의 오시는길을<br> 알려드립니다.</p>
        </a>
      </li>
    </ul>
  </div>
</section>

<section id="por_wrap2">
  <div class="por_inner2">
    <?php
      /* latest_group('스킨명', '테이블명', 목록개수, 제목길이) */
      echo latest('theme/pic_gallery2', 'performance2', 8, 12);
    ?>
  </div>
</section>

<section id="about_wrap2">
  <div class="box">
    <div class="con wow fadeInLeft">
      <div class="tit">
        <h2>ABOUT US</h2>
        <span>우리 함께 나누자는 의미의 IT기업</span>
      </div>
      <div class="txt">
        <p>
          주식회사 위브정보기술 홈페이지를 방문해주신 고객 여러분을 진심으로 환영합니다.<br>
          <br>
          당사는 IT전문기술 인력을 기반으로 고객사의 정보시스템 서비스 품질을 향상을 위하여 노력하는 기업으로, 고객사의 정보화 부문의 비즈니스 경쟁력을 위하여 모든 직원들이 노력하는 기업입니다. 또한, 고객 옆에서 함께 고민하고 일하며 정성을 다하는 기업이 되겠습니다.
        </p>
      </div>
      <a href="<?php echo G5_THEME_URL ?>/company/company01_2.php">자세히 보기</a>
    </div>
    <div class="about_img wow fadeInRight">
      <img src="<?php echo G5_THEME_IMG_URL ?>/about_img.png" alt="" class="about_img1"/>
      <img src="<?php echo G5_THEME_IMG_URL ?>/about_img2.png" alt="" class="about_img2"/>
    </div>
  </div>
</section>

<section id="por_wrap">
  <div class="por_inner">
    <?php
      /* latest_group('스킨명', '테이블명', 목록개수, 제목길이) */
      echo latest('theme/pic_gallery', 'performance1', 8, 12);
    ?>
  </div>
</section>

<section id="community_wrap3">
  <div class="box">
    <div class="con">
      <div class="tit wow fadeInUp">
        <h2>공지사항</h2>
        <span>위브정보기술의 최근소식입니다.</span>
      </div>
      <div class="txt wow fadeInLeft">
        <?php echo latest("theme/notice","notice", 4,18);?>
      </div>
    </div>
    <div class="con">
      <div class="tit  wow fadeInUp">
        <h2>채용공고</h2>
        <span>위브정보기술의 채용공고입니다.</span>
      </div>
      <div class="txt wow fadeInRight">
        <?php echo latest("theme/notice","employment", 4,18);?>
      </div>
    </div>
  </div>
</section>

<section id="bottom_wrap3">
  <div class="box">
    <img src="<?php echo G5_THEME_IMG_URL ?>/main_sub11.png" alt=""/>
    <div class="con">
      <h2>온라인문의</h2>
      <p>궁금하신 내용을 남겨주시면 신속하고 정확하게 답변드리겠습니다</p>
      <a href="<?php echo G5_BBS_URL ?>/write.php?bo_table=online">문의하기</a>
    </div>
  </div>
</section> 
<script type="text/javascript" src="<?php echo G5_THEME_URL ?>/js/main.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.php');