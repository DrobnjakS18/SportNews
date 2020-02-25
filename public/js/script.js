jQuery(function($) {
    'use strict';
    /* ----------------------------------------------------------- */
    /*  Mobile Menu
    /* ----------------------------------------------------------- */
    jQuery('.nav.navbar-nav li a').on('click', function() {
        jQuery(this).parent('li').find('.dropdown-menu').slideToggle();
        jQuery(this).find('li i').toggleClass('fa-angle-down fa-angle-up');
    });

    /* ----------------------------------------------------------- */
    /*  Site search
    /* ----------------------------------------------------------- */

    $('#search').on('click', function () {
        $('.site-search').addClass('visible');
        $('#searchInput').focus();
    });
    $('.search-close').on('click', function () {
        $('.site-search').removeClass('visible');
    });

    /* ----------------------------------------------------------- */
    /*  Slick Carousel
    /* ----------------------------------------------------------- */
    // trending bar slide
    $('.trending-news-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows:false,
        fade: false,
        vertical:true,
        verticalSwiping:true

    });

    //Latest news slide
    $('.news-style-one-slide').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        draggable: true,
        loop:true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.news-style-two-slide').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable:true,
        loop:true,
        autoplay:true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



    $('.post-slide').slick({
        fade: true
    });
    // -----------------------------
    //  Video Replace
    // -----------------------------
    $('.play-icon').click(function () {
        var video = '<iframe allowfullscreen src="' + $(this).attr('data-video') + '"></iframe>';
        $(this).replaceWith(video);
    });

    $('.play-icon').mousemove(function (e) {
        var parentOffset = $(this).offset();
        var relX = e.pageX - parentOffset.left;
        var relY = e.pageY - parentOffset.top;
        $('.play-button').css({ left: relX, top: relY});
    });
    $('.play-icon').mouseout(function() {
        $('.play-button').css({ left: '50%', top: '50%'});
    });

    /* ----------------------------------------------------------- */
    /*  Scroll To Top
    /* ----------------------------------------------------------- */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('.scroll-to-top').on('click', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

});



// $('.comment-reply').on('click',function() {
//     //$(this) = dugme Reply
//     $(this).addClass('selected');
//
//     var replyForm = $('.reply-form');
//
//     if ($(this).hasClass('selected')) {
//         //Reply forma
//         replyForm.insertAfter($(this).closest('.comment')).show();
//
//         if ($(this).hasClass('comment-toggle-button')) {
//             replyForm.find('form').removeClass('reply-submit').addClass('comment-submit');
//
//             if($('.reply-comment')) {
//                 $('.reply-comment').remove();
//             }
//         } else {
//             replyForm.find('form').removeClass('comment-submit').addClass('reply-submit');
//             $("<input>").attr("type", "hidden").appendTo(replyForm.find('form')).addClass('reply-comment').val('123');
//
//         }
//
//     } else {
//         $('.comment-reply').removeClass('selected');
//         replyForm.hide();
//     }
// });
//
// $('.comments-btn-cancel').on('click',function () {
//     $(this).closest('.reply-form').hide();
// });

//Get recaptcha and put in a new variable
var siteKey;
function storeSiteKey(result) {
    siteKey = result;
}

var replyForms = document.getElementsByClassName('reply-form');
var recapchaCount = 0;
var widgetCommentId;


var onloadCallback = function() {

    for (let reply in replyForms) {
        recapchaCount++;
        let replyRecaptcha = 'recaptcha-' + recapchaCount;

        if($('#'+replyRecaptcha).length) {
            grecaptcha.render(replyRecaptcha, {
                'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
                'callback' : storeSiteKey
            });

        }
    }

    widgetCommentId =  grecaptcha.render('comment-recaptcha', {
        'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'callback' : storeSiteKey
    });
};

//Reset check
function resetReCaptcha(id) {
    grecaptcha.reset(id);
}

//Leave a reply single  toggle form
function ToggleReplyForm(comment_id)
{
    $('.comment-form').slideUp('slow','swing',resetReCaptcha(widgetCommentId));

    let reply = 'form-'+comment_id;
    for (var i in replyForms) {
        let widgetId = 0;
        if(replyForms[i].classList) {
            widgetId++;
            if (reply === replyForms[i].classList[2]) {
                $('.'+reply).toggle('slow','swing',resetReCaptcha(widgetId));
            } else {
                $('.'+replyForms[i].classList[2]).slideUp('slow','swing',resetReCaptcha(widgetId));
            }
        }
    }
}

//Leave comment toggle form
$('.comment-toggle-button').click(function () {
    $('.reply-form').slideUp('slow');
    $('.comment-form').toggle('slow','swing',resetReCaptcha(widgetCommentId));
});

$('.reply-submit').on('submit',function (e) {
    e.preventDefault();

    var message = $(this).find('textarea.reply-message').val();
    var post = $(this).find('input.reply-post').val();
    var comment = $(this).find('input.reply-comment').val();

    var errorClass = '.error-id-'+comment;
    var successClass = '.succes-id-'+comment;

    $.ajax({
        method: "POST",
        url: "/reply",
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            message : message,
            post : post,
            comment : comment,
            recaptcha : siteKey
        },
        dataType: 'json',
    })
        .fail(function(jqxhr, textStatus, errorThrown) {
            var message = 'An error occured!';

            $(errorClass).html(message);

            $(successClass).slideUp('slow','swing',function () {
                $(errorClass).slideDown('slow','swing',function () {
                    setTimeout(function () {
                        $(errorClass).slideUp('slow');
                    },1000)
                });
            });
        })
        .done(function(data) {
            $(successClass).html(data.message);

            $(errorClass).slideUp('slow','swing',function () {
                $(successClass).slideDown('slow','swing',function () {
                    setTimeout(function () {
                        $(successClass).slideUp('slow');
                    },1000)
                });
            });
            grecaptcha.reset();
            message = $('#reply-message').val('');
        });
});

$('#comment-submit').on('click',function (e) {
    e.preventDefault();

    let comment = $('#message').val();
    let commentPostId = $('#comment_post').val();

    let commentAjaxError = '.comment-ajax-message_error';
    let commentAjaxSuccess = '.comment-ajax-message_success';

    $.ajax({
        method: "POST",
        url: "/comment",
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            message : comment,
            post : commentPostId,
            recaptcha : siteKey
        },
        dataType: 'json',
    })
        .fail(function(jqxhr, textStatus, errorThrown) {
            let commentError = 'An error occured!';
            $(commentAjaxError).html(commentError);

            $(commentAjaxSuccess).slideUp('slow','swing',function () {
                $(commentAjaxError).slideDown('slow','swing',function () {
                    setTimeout(function () {
                        $(commentAjaxError).slideUp('slow');
                    },1000)
                });
            });
        })
        .done(function(data) {
            $(commentAjaxSuccess).html(data.message);

            $(commentAjaxError).slideUp('slow','swing',function () {
                $(commentAjaxSuccess).slideDown('slow','swing',function () {
                    setTimeout(function () {
                        $(commentAjaxSuccess).slideUp('slow');
                    },1000)
                });
            });

            $('#message').val('');
            grecaptcha.reset(widgetCommentId);
        });
});


