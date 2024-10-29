function openServer(dis, serverSlug) {
  $('.tab-pane-sv').css('display', 'none');
  $('.tablinks-sv').removeClass('active');
  $('#' + serverSlug).css('display', 'block');
  $(".tablinks-sv").find("a").removeClass('active');
  $('.' + dis.className).addClass('active');
}

$.fn.dailyTask = function() {
  $(this).find('>a').click(function(e) {
    e.preventDefault()
    $(this).closest('ul').children().removeClass('active')
    $(this).closest('li').addClass('active')

    $('.daily .daily-content').find('>div').attr('style', '')
    $('.daily .daily-content').find(`.${$(this).data('day')}`).css('display', 'block')
  })
}
$.fn.swapMenu = function() {
  $(this).click(function(e) {
    e.preventDefault()
    if ($(this).hasClass('show')) {
      $(this).removeClass('show')
      $(this).parent().removeClass('showMenu')
    } else {
      $(this).addClass('show')
      $(this).parent().addClass('showMenu')
    }

  })
}

$.fn.dropdownMenuDownload = function() {
  $(this).click(function(e) {
    e.preventDefault()
    if ($(this).hasClass('toggle')) {
      $(this).removeClass('toggle')
      $(this).parent().removeClass('showList')
    } else {
      $(this).addClass('toggle')
      $(this).parent().addClass('showList')
    }
  });
}

function changeAlias(alias) {
  var str = alias;
  str = str.toLowerCase();
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
  str = str.replace(/ + /g, " ");
  str = str.replace(/ /g, "-");
  str = str.trim();
  return str;
}

function checkingTodayName() {
  var allDayOfTheWeek = 7;
  var sunday = 0;
  var datetimes = new Date();
  var weekdays = new Array(allDayOfTheWeek);
  var arrWeekday = [];
  $.each(weekdays, function(index) {
      if(index != sunday) {
          arrWeekday[index] = index++;
      } else {
          arrWeekday[index] = allDayOfTheWeek;
      }
  });
  var toDayName = arrWeekday[datetimes.getDay()];
  if($('.tabs-item').hasClass('day-name-' + toDayName)) {
      $('.day-name-' + toDayName).addClass('active');
  }
}

$(document).ready(function() {
  checkingTodayName();

  if ($('#key-search').length && $.cookie('keySearch')) {
    $('#key-search').text($.cookie('keySearch'));
  }

  $('form.search__container').submit(function() {
    var text = $(this).find('input[type="text"]').val();
    $.cookie('keySearch', text, { expires: 1, path: '/' });

    if (!text) {
      return false;
    }
    var redirectUrl = 'tim-kiem?keyword=' + changeAlias(text);
    window.location.replace(redirectUrl);
    window.location.href = redirectUrl;

    return false;
  })

  /*==================== PORTFOLIO SWIPER  ====================*/
  let swiperTestimoial = new Swiper(".slide__container", {
    loop: true,
    grabCursor: true,
    spaceBetween: 48,
    autoplay: {
      delay: 3000,
    },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true
    },
    breakpoints: {
      568: {
        slidesPerView: 1
      }
    }
  });


  /*==================== P TABS ====================*/
  const tabs = document.querySelectorAll('[data-target]');
  const tabContents = document.querySelectorAll('[data-content]');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {

      const target = document.querySelector(tab.dataset.target);

      $('#btn-more').attr('href', `/${tab.dataset.slug}`)


      tabContents.forEach(tabContent => {
        tabContent.classList.remove('post__active');
      });
      target.classList.add('post__active');

      tabs.forEach(tab => {
        tab.classList.remove('post__active')
      });
      target.classList.add('post__active');
      tab.classList.add('post__active');
    });
  });

  if ($(".custom-scrollbar").length) {
    $(".custom-scrollbar").each(function() {
      var theme = $(this).data('theme');
      if (!theme) {
        theme = 'light';
      }
      $(this).mCustomScrollbar({
        scrollButtons: {
          enable: true
        },
        theme: theme
      });
    })
  }

  if ($('.daily .tabs li').length) {
    $('.daily .tabs li').each(function() {
      $(this).dailyTask()
    });
  }

  if ($('.swapmenu').length) {
    $('.swapmenu').each(function() {
      $(this).swapMenu()
    })
  }

  if ($('.btn-dropdown-dl').length) {
    $('.btn-dropdown-dl').each(function() {
      $(this).dropdownMenuDownload()
    })
  }
});