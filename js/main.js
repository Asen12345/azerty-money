
  function ajax_products(href)
  {
      if (!href){
          href = $('#p_get').val();
      }
      alert("tyr");
  
      history.pushState('', '', href);
  
      $.ajax({
          url: href,
          type: "POST",
          dataType: "html",
          data: jQuery('form.catalog__sort').serialize(),
          beforeSend: function(){
              //$('.products').html('<div class="loading"></div>');
          },
          success: function (response) {
            console.log(data);
              $('.products').html($(response).find('.products').html());
          }
      });
  }






 function check_form(selector){
  if(selector){
    var obj_required = selector.find('input[required]:not([type=checkbox]), select[required]');
    var v_flag = true;
    $.each(obj_required, function() {
      if($(this).val() == 0 || $(this).val().length == 0 || $(this).val() == ''){
        $(this).addClass('border-red');
        v_flag = false;
      } else {
        $(this).removeClass('border-red');
      }
    });
    return v_flag;
  }
  return false;
}

$(document).ready(function () {

  $('.faq__question').click(function () {
    this.children[0].classList.toggle('question_active');
  });

  // $('.order__link').click(function () {
  //   this.parentNode.parentNode.parentNode.children[1].classList.toggle('orders__active')
  // });

 
  
  var location_href = window.location.href;
  if(location_href == "https://azerty-money.ru/faq"){
  
  $(".catalog-wrap").css("background", "url('https://azerty-money.ru/data/img/bg-team.png') no-repeat top");
  
  
  }
  if(location_href == "https://azerty-money.ru/postav"){
  
  $(".catalog-wrap").css("background", "url('https://azerty-money.ru/data/img/bg-team.png') no-repeat top");
  
  
  }
  if(location_href == "https://azerty-money.ru/contacts"){
  
    $(".catalog-wrap").css("background", "url('https://azerty-money.ru/data/img/bg-team.png') no-repeat top");
    
    
    }
    if(location_href == "https://azerty-money.ru/garant"){
  
      $(".catalog-wrap").css("background", "url('https://azerty-money.ru/data/img/bg-team.png') no-repeat top");
      
      
      }
 



  $('.orders__order').click(function () {
    this.children[1].classList.toggle('orders__active')
  });


  $(".header__mouse").click(function () {
    elementClick = $(this).attr("href");
    destination = $(elementClick).offset().top;
    $("body,html").animate({scrollTop: destination}, 800);
  });

  $(".product__more").click(function () {
    elementClick = $(this).attr("href");
    destination = $(elementClick).offset().top;
    $("body,html").animate({scrollTop: destination - 100}, 800);
  });


  $(".payment__item").click(function () {
    $('.payment__item').removeClass('payment__item_active');
    this.classList.toggle('payment__item_active');
  })


  $("#modal_input_select").change(function () {
    var selectedLink = $(this).children("option:selected").val();
    $('.changeable-label').text("Ваш Login " + selectedLink);
  });


  // Payment currency values

  $('.payment__item').click(function () {
    $('.currency').text($('.payment__item_active').attr('value'));
  })


















  // Select values
  $('#selectServer').click(function (e) {
    var $message = $('#selectServerPanel');
    if ($message.css('display') != 'block') {
      $message.slideDown(200);
      var firstClick = true;
      $(document).bind('click.myEvent', function (e) {
        if (!firstClick && $(e.target).closest('#selectServerPanel').length == 0) {
          $message.slideUp(200); $(document).unbind('click.myEvent');
        }
        firstClick = false;
      });
    } e.preventDefault();
  });



  // MOdal show-----------
  $('.modal').css('display', 'flex').hide()


  $('.main-modal__close').click(function () {
    $('.modal').fadeOut();
  })


  $('.offer__btn, .footer__btn').click(function () {
    $('.modal').fadeIn();
  })

  $('.payment-check__btn').click(function () {
    $('.modal-second').fadeIn();
  })

  $(document).click(function (event) {
    if (!$(event.target).closest(".modal-dialog,.offer__btn, .footer__btn").length) {
      $("body").find(".modal").fadeOut();
    }
  });

  $(document).click(function (event) {
    if (!$(event.target).closest(".payment-check__btn").length) {
      $("body").find(".modal-second").hide()
    }
  });


  //Menu show

  $('.header__hamburger').click(function () {
    $('.menu').toggleClass('d-block');
  })

  $(document).click(function (event) {
    if (!$(event.target).closest(".menu, .header__hamburger").length) {
      $("body").find(".menu").removeClass("d-block");
    }
  });


  // SIde chat show

  $('.bar__btn').click(function () {
    $('.chat').toggleClass('active-chat');
    $('.btn__first').toggleClass('vertical__btn-hide');
  })

  $(document).click(function (event) {
    if (!$(event.target).closest(".chat, .btn__first").length) {
      $("body").find(".chat").removeClass("active-chat");
      $("body").find(".btn__first").removeClass("vertical__btn-hide");
    }
  });




  // Slider

  $('.comments__slider').slick({
    slidesToShow: 2,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1650,
        settings: {
          slidesToShow: 1,
        }
      }]
  });
  $(".product__slider").slick({
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    arrows: true,
    vertical: true,
    verticalSwiping: true,
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 1366,
        settings: {
          vertical: false,
          verticalSwiping: false,
        }
      }]
  });

  $(document).ready(function () {
    $('[data-submit]').on('click', function (e) {
      e.preventDefault();
      $(this).parent('form').submit();
    })
    $.validator.addMethod(
      "regex",
      function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      "Please check your input."
    );


    // Функция валидации и вывода сообщений
    function valEl(el) {

      el.validate({
        rules: {
          tel: {
            required: true,
            regex: '^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$'
          },
          name: {
            required: true
          },
          text: {
            required: true
          },
          email: {
            required: true,
            email: true
          }
        },
        messages: {
          tel: {
            required: 'Поле обязательно для заполнения',
            regex: 'Телефон может содержать символы + - ()'
          },
          name: {
            required: 'Пол',
          },
          email: {
            required: 'Поле обязательно для заполнения',
            email: 'Неверный формат E-mail'
          }
        },

        // Начинаем проверку id="" формы
        submitHandler: function (form) {
          $('#loader').fadeIn();
          var $form = $(form);
          var $formId = $(form).attr('class');

          console.log($form.serialize())
          $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
          })
            .always(function (response) {
              setTimeout(function () {

                if (window.location.pathname.split('.')[0] == '/payment') {
                  window.location.href = window.location.origin + '/payment-check.html';

                }

                $('.modal').hide();
              }, 800);

            });

        }
      })
    }

    // Запускаем механизм валидации форм, если у них есть класс .js-form
    $('.js-form').each(function () {
      valEl($(this));
    });
  }

  )
})