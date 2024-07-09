// Iframe Player API를 비동기적으로 로드.
var tag = document.createElement("script");

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. API 코드를 다운로드 받은 다음에 <iframe>을 생성하는 기능 (youtube player도 더불어)
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player("youtube-player", {
    height: "841", //영상 높이
    width: "1903", //영상 너비
    videoId: "", //영상ID
    playerVars: {
      rel: 0, //연관동영상 표시여부(0:표시안함)
      controls: 0, //플레이어 컨트롤러 표시여부(0:표시안함)
      autoplay: 1, //자동재생 여부(1:자동재생 함, mute와 함께 설정)
      mute: 1, //음소거여부(1:음소거 함)
      loop: 1, //반복재생여부(1:반복재생 함)
      playsinline: 1, //iOS환경에서 전체화면으로 재생하지 않게
      playlist: "sQ22pm-xvrE", //재생할 영상 리스트
      // 여러 개의 영상을 재생할 경우 쉼표로 구분해 주세요.
      // ex) 'playlist' : 'aaa,bbb'
    },
    events: {
      onReady: onPlayerReady,
      onStateChange: onPlayerStateChange,
    },
  });
}

// 비디오 플레이어가 준비되면 아래의 function을 불러옴
function onPlayerReady(event) {
  event.target.playVideo();
}

// 비디오가 재생되고 있을 때 아래의 function을 불러옴(state=1),
var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    // 플레이어는 n초 이상 재생되고 정지(사용시 주석해제)
    //setTimeout(stopVideo, 5000);
    done = true;
  }
}
function stopVideo() {
  player.stopVideo();
}

const progress = document.querySelector(".progress");
const progressBar = document.querySelector(".progress__bar");
const swiper = new Swiper(".main_ban_conainer", {
  loop: true,
  effect: "fade",
  speed: 2000,
  navigation: {
    nextEl: ".next",
    prevEl: ".prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  on: {
    init: function () {
      progress.classList.remove("animate");
      progress.classList.add("animate");
    },
    slideChangeTransitionStart: function () {
      progress.classList.remove("animate");
    },
    slideChangeTransitionEnd: function () {
      // "play" 버튼을 비활성화 경우에만 animate추가
      if ($(".play").prop("disabled")) {
        progress.classList.add("animate");
      }
    },
  },
});

// 초기에 "play" 버튼을 비활성화하고 "pause" 버튼을 활성화
$(".play").prop("disabled", true);
$(".pause").prop("disabled", false);

let animationFrameId;
let progressWidth = 0;
const animationDuration = 5000;

function animateProgressBar(timestamp) {
  if (!progressWidth) {
    progressWidth = 0;
  }

  const startTime = timestamp || performance.now();
  const elapsedTime = timestamp - startTime;
  const progressPercentage = Math.min(
    (elapsedTime / animationDuration) * 100,
    100
  );

  progressBar.style.width = `${progressPercentage}%`;

  if (progressPercentage < 100) {
    animationFrameId = requestAnimationFrame(animateProgressBar);
  } else {
    cancelAnimationFrame(animationFrameId);
  }
}

// play 버튼 클릭 시 슬라이더 자동 재생 시작
$(".play").on("click", function () {
  swiper.autoplay.start();
  animateProgressBar();
  // "start" 버튼 활성화
  $(".play").prop("disabled", true);
  $(".pause").prop("disabled", false);
  progress.classList.add("animate");
});

// pause 버튼 클릭 시 슬라이더 자동 재생 정지
$(".pause").on("click", function () {
  swiper.autoplay.stop();
  cancelAnimationFrame(animationFrameId);
  // "start" 버튼 활성화
  $(".play").prop("disabled", false);
  $(".pause").prop("disabled", true);
  progress.classList.remove("animate");
});

// OUR BUSINESS
const articles = document.querySelectorAll("#business_wrap article");

articles.forEach((article) => {
  const btnMore = article.querySelector("#business_wrap .btn_more");

  article.addEventListener("mouseenter", () => {
    article.style.flex = "3 1 0%";
    btnMore.classList.add("active");
  });

  article.addEventListener("mouseleave", () => {
    article.style.flex = "1 1 0%";
    btnMore.classList.remove("active");
  });
});
