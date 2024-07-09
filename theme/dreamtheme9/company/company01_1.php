<?php
    include_once('../../../common.php');
    include_once(G5_THEME_PATH.'/head.php');
?>
    
    <div class="content_sub">
        <section class="intro_wrap">
            <div class="intro_container">
                <div class="txt">
                    <h2 class="tit" data-aos="fade-up" data-aos-delay="100">Design <span class="color_primary">Innovation !</span><br> Creative <span class="color_primary">Technology !</span></h2>
                    <p data-aos="fade-up" data-aos-delay="300">
                        홈페이지 제작 전문기업 ㈜드림위드컴퍼니 방문을 환영합니다.<br>
                        <br>
                        최신의 웹 개발 기술이 반영된 솔루션 개발을 통해 다양한 업종에 적용이 가능한<br> 홈페이지 제작용 탬플릿을 출시합니다.<br>
                        세련되고 트렌디한 디자인으로 레이아웃된 메인페이지와<br> 총 60여 페이지에 달하는 다양한 폼이 반영된 콘텐츠페이지로 구성되어<br> 고객만족도를 한층 더 높이는 것이 가능해졌습니다.<br>
                        탬플릿에 올려진 샘플을 보고 업종에 맞는 페이지와 원하는 폼을 선택하여 홈페이지를 구성할 수 있으며,<br> 희망하는 경우 비용추가 없이 풀 버전 전체 사용도 가능합니다.<br>
                        솔루션 개발 덕분에 원가를 대폭 낮추어 서비스 공급하는 것이 가능해져서<br> 저렴한 비용으로 高 퀄리티 홈페이지를 짧은 기간 내 제작할 수 있습니다.<br>
                        <br>
                        기대에 충족될 수 있도록 고품격 홈페이지 제작을 약속드립니다.<br> 홈페이지 제작을 통해 고객님의 꿈과 미래를 함께 만들어 가시길 바랍니다.<br>
                        고객으로부터 신뢰와 사랑을 받는 건강한 기업 ㈜드림위드컴퍼니가 되고자 끊임없는 노력을 경주 하겠습니다.<br>
                        드림위드컴퍼니 회사 로고는 부와 행운을 상징하는 것으로 사업번창을 기원하는 의미를 담고 있습니다.<br>고객님의 지속적인 사업번창과 성공을 기원합니다. 감사합니다.<br>
                        <span class="ceo">
                            주식회사 드림위드컴퍼니 임직원 일동
                        </span>
                    </p>
                </div>
                <div class="bg">
                    <img class="img1" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_1_img.png" alt="회사소개 이미지">
                    <img class="img2" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_2_img.png" alt="회사소개 이미지">
                    <img class="img3" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_3_img.png" alt="회사소개 이미지">
                </div>
            </div>
        </section>
        <section class="intro_box_wrap">
            <div class="intro_slide swiper-container">
                <div class="swiper-wrapper">
                    <div class="box swiper-slide">
                        <h2 class="txt">고객만족 실현</h2>
                        <img class="img1" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_bottom1_img.png" alt="회사소개 이미지">
                    </div>
                    <div class="box swiper-slide">
                        <h2 class="txt">투명경영 지속실행</h2>
                        <img class="img2" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_bottom2_img.png" alt="회사소개 이미지">
                    </div>
                    <div class="box swiper-slide">
                        <h2 class="txt">미래를 향한 혁신지향</h2>
                        <img class="img3" src="<?php echo G5_THEME_IMG_URL ?>/company1/intro1_bottom3_img.png" alt="회사소개 이미지">
                    </div>   
                </div>
            </div>
        </section>
    </div>

    <script>

        const swiper = new Swiper('.intro_slide', {
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 10,
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
        });

        gsap.registerPlugin(ScrollTrigger);

        document.addEventListener("DOMContentLoaded", () => {
            const bgVerticalScroll = document.querySelector('.intro_wrap .bg');
            const bgHeight = bgVerticalScroll.offsetHeight;

            // 화면 너비가 768px 이상인 경우에만 ScrollTrigger를 활성화
            if (window.innerWidth >= 768) {
                gsap.to(".intro_wrap .txt", {
                    scrollTrigger: {
                        trigger: ".intro_wrap",
                        start: "top top",
                        end: () => `+=${bgHeight}`,
                        pin: true,
                        pinSpacing: "none"
                    }
                });

                gsap.to(bgVerticalScroll, {
                    y: -bgHeight,
                    scrollTrigger: {
                        trigger: ".intro_container",
                        start: "top top",
                        end: () => `+=${bgHeight}`,
                        scrub: 1
                    }
                });
            }

            // ScrollTrigger 사용시 텍스트가 안보이는 경우가 없도록 min-height 지정
            const introWrap = document.querySelector('.intro_wrap');
            
            function minHeight() {
                if (window.innerWidth >= 768) {
                    introWrap.style.minHeight = '1050px';
                } else {
                    introWrap.style.minHeight = null;
                }
            }

            window.addEventListener('resize', minHeight);
            minHeight();
        });
    </script>

<?php
    include_once(G5_THEME_PATH.'/tail.php');
?>

