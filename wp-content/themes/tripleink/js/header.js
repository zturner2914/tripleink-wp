jQuery(function($){


  var headerList = $('.header-dropdown li');
  headerList.each(function(i, li){
  	if ($(this).hasClass('menu-item-has-children')) {
      $(this).children('a').after('<a class="sub-arrow" href="#"></a>');
  	}
  });


	$('li.menu-item-has-children > a.sub-arrow').click(function(e) {
      e.preventDefault();
      $(this).parent().toggleClass('open');
      $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle();
	});

  //toggle the upper right header button
  $('.mobile-menu').click(function() {
    $('.bar').slideToggle();
  });

	function scrollToHash() {

    // Scroll to hash
  	if(window.location.hash) {
  		var target = window.location.hash;
  		var targetOffset = $(target).offset().top;
  		console.log('targetOffset', targetOffset);
  		if (target.length) {
  			$('html, body').animate({
  				scrollTop: targetOffset - 150
  			}, 1000);
  		  return false;
  		}
  	}

	}
  scrollToHash();

	$('.heroBtn, #letsMeet').click(function (){
    $('html, body').animate({
      scrollTop: $('#footer').offset().top
    }, 2000);
  });


  //resets displays "none" for desktop hovers
  $(window).resize(function() {
    $('.sub-menu').attr('style', '');
  });

  //CLOSES THE MOBILE DROPDOWN FROM MOBILE TO DESKTOP
  $(window).on('resize', function () {
    if ($(window).width() > 768) {
      $('.bar').css('display','');
    }
  }).resize();

  //LINE ANIMATION. WHEN FIRST LINE IS IN VIEW, IT TRIGGERS THE ANIMATION
  var $window = $(window);
  var $animate_elements = $('.animate-element');

  function checkIfInView () {
    var windowHeight = $window.height();
    var windowTop = $window.scrollTop();
    var window_bottom_position = (windowTop + windowHeight);

    $.each($animate_elements, function() {
      var $element = $(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      // console.log(element_top_position);
      var element_bottom_position = (element_top_position + element_height);

      //check to see if this current container is within viewport
      if ((element_bottom_position >= windowTop) && (element_top_position <= window_bottom_position)) {
        $element.addClass('in-view');
      }
    });
  }

  $window.on('scroll resize', checkIfInView);
  $window.trigger('scroll');

  //ACCORDIION FUNCTIONALITY
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    };
  }

  //free poster pop up
  $('.info-icon').click(function (){
    $('#pop-up-container').show();
  });

  //click the X to close pop up
  $('.close').click(function (){
    $('#pop-up-container').hide();
  });

  //select2 functionality
  $('#hear-about').select2({
      placeholder: 'HOW DID YOU HEAR ABOUT US',
      width: '100%'
  });
  $('#services-requested').select2({
      placeholder: 'TYPE OF SERVICE REQUESTED',
      width: '100%'
  });

 // Form stuff
  $('#quote-form form button').click(function(e) {
    e.preventDefault();
  });

  // Validation
  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }

  var $email = $('input[data-name="email"]');

  function checkfile(sender) {
    var validExts = new Array('.doc', '.docx', '.gif', '.html', '.indd', '.jpeg', '.jpg', '.pdf', '.png', '.ppt', '.pptx', '.psd', '.resx', '.xls', '.xlsx', '.xml', '.zip');
    var str = validExts.join(', ');
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid file extensions are: " + str);
      $('input#attachment').val('');
      return false;
    }
    else return true;
  }

  $('input#attachment').change(function() {
    checkfile(this);
  });

  $('#quote-form form input[required]').blur(function() {
    var value = $(this).val();
    if (value === '') {
      $(this).addClass('error');
    } else {
      $(this).removeClass('error');
    }
    if(!validateEmail($email.val())) {
      $email.addClass('error');
    } else {
      $email.removeClass('error');
    }
  });

  $('#quote-form form input').on('keyup change',function () {
    var empty = false;

    $('#quote-form input[required]').each(function() {
      if ($(this).val() === '' || $(this).val() === null) {
        empty = true;
      }
    });

    if (empty || !validateEmail($email.val())) {
      $('#quote-form input[type="submit"]').attr('disabled', 'disabled');
    } else {
      $('#quote-form input[type="submit"]').removeAttr('disabled');
    }
  });

  $('#quote-form form').submit(function(e) {
    e.preventDefault();
    $('#quote-form input[type="submit"]').addClass('submitting');

    var formData = new FormData($('#quote-form form')[0]);

    $.ajax({
      url: theme.templateDir + '/ss-connect.php',
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function() {
        $('#quote-form form').hide();
        $('#quote-form .thank-you').show();
        $('html, body').animate({
          scrollTop: $('#quote-form .thank-you').offset().top - 150
        }, 500);
      },
      error: function() {
        alert('There was an error. Try again please!');
      }
    });
  });

  // Focus search input on open of select
  $('select').on('select2:open', function() {
    $('.select2-search__field').focus();
  });

});
