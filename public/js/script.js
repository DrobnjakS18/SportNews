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

    $('#search, .fa-search').on('click', function () {
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

//LOADING CIRCLE
function startLoading() {
    $('.loading').show();
}

function stopLoading() {
    $('.loading').hide();
}




$('#contact-form-button').on('click', function(e) {
    e.preventDefault();
    startLoading();

    var contactSurname = $("#name").val();
    var contactEmail = $('#email').val();
    var contactsubject = $("#subject").val();
    var contactMessage = $('#message').val();

    $.ajax({
        method: 'POST',
        url: '/contact/email',
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            surname : contactSurname,
            email : contactEmail,
            subject : contactsubject,
            message : contactMessage
        },
        dataType: 'json',
    })
        .fail(function (jqxhr, textStatus, errorThrown) {
            stopLoading();
            var response = JSON.parse(jqxhr.responseText);
            var statusCode = jqxhr.status;

            //On every submit the span tags disappear and appear again
            $('.error-custom').hide();

            if (statusCode == 422) {
                $.each(response.errors, function(key, value) {
                    $('.error-' + key).html(value).show();
                });
            } else {
                alert("Application isn't currently working.Please come back later.");
            }
        })
        .done(function (data) {
            $('#contact-form').hide();
            $('.contact-success').show();
            stopLoading();

        });
});



//Get recaptcha and put in a new variable
let siteKey;
function storeSiteKey(result) {
    siteKey = result;
}

var replyForms = document.getElementsByClassName('reply-form');
var widgetCommentId;
let widgetIdArray = [];


var onloadCallback = function() {

    widgetCommentId =  grecaptcha.render('comment-recaptcha', {
        'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'callback' : storeSiteKey
    });

    if(replyForms.length > 0) {

        for (let i = 0; i <= replyForms.length;i++ ) {
            let replyRecaptcha = 'recaptcha-' +  i;

            widgetIdArray.push(
                grecaptcha.render(replyRecaptcha, {
                    'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
                    'callback': storeSiteKey
                })
            );
        }
    }

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
        if(replyForms[i].classList) {
            if (reply === replyForms[i].classList[2]) {
                $('.'+reply).toggle('slow','swing',resetReCaptcha(widgetIdArray[i]));
            } else {
                $('.'+replyForms[i].classList[2]).slideUp('slow','swing',resetReCaptcha(widgetIdArray[i]));
            }
        }
    }
}

//Leave comment toggle form
$('.comment-toggle-button').click(function () {
    $('.reply-form').slideUp('slow');
    $('.comment-form').toggle('slow',resetReCaptcha(widgetCommentId));
});



$('.reply-submit').on('submit ',function (e) {
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

            //Reset checkbox on success to empty
            for (let successWidgetId = 1;successWidgetId <= widgetIdArray.length; successWidgetId++) {
                resetReCaptcha(successWidgetId);
            }

            $(errorClass).slideUp('slow','swing',function () {
                $(successClass).slideDown('slow','swing',function () {
                    setTimeout(function () {
                        $(successClass).slideUp('slow');
                    },1000)
                });
            });
            //Reset message on success to empty
            $('.reply-submit').find('textarea.reply-message').val('');
            //Empty recaptcha site key
            siteKey = '';
        });
});



$('#comment-submit').on('click touchstart',function (e) {
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
            siteKey = '';
        });
});


//Votes for comments
let commentVotes = $('.comment-like, .comment-dislike');

commentVotes.on('click touchstart',function (e) {
    e.preventDefault();

    let element =  $(this);
    let votePostId = element.data('post-id');
    let voteCommentId = element.data('comment-id');
    let voteAction = element.data('action');

    if(element.hasClass('like-after-click')) {
        return false;
    }

    $.ajax({
        method: 'POST',
        url: '/vote',
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            postId : votePostId,
            commentId : voteCommentId,
            action : voteAction
        },
        dataType: 'json',
        custom: element
    })
        .fail(function (jqxhr, textStatus, errorThrown) {
            let LikeStatus = jqxhr.status;

            switch (LikeStatus) {
                case 401:
                    alert('You have to be logged in to perform that action!');
                    break;
                default:
                    alert('An error occured!Please try again later');
                    break;
            }
    })
        .done(function (data) {

            //Delete href tag so it doesnt to the top of the page
            element.parent().find('.comment-like, .comment-dislike').removeAttr('href');
            //Adds opacity class
            element.off('click').parent().find('.comment-like, .comment-dislike').addClass('like-after-click');
            //Displays votes for that single comment
            element.parent().find('.likes-count').html(data.votesLike);
            element.parent().find('.dislikes-count').html(data.votesDislike);

    });


});

//Votes for reply
let replyVotes = $('.reply-like, .reply-dislike');

replyVotes.on('click touchstart',function (e) {
    e.preventDefault();

    let element =  $(this);
    let votePostId = element.data('post-id');
    let voteCommentId = element.data('comment-id');
    let voteAction = element.data('action');

    if(element.hasClass('like-after-click')) {
        return false;
    }

    $.ajax({
        method: 'POST',
        url: '/vote',
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            postId : votePostId,
            commentId : voteCommentId,
            action : voteAction
        },
        dataType: 'json',
        custom: element
    })
        .fail(function (jqxhr, textStatus, errorThrown) {
            alert('An error occured!Please try again later');
        })
        .done(function (data) {

            //Delete href tag so it doesnt to the top of the page
            element.parent().find('.reply-like, .reply-dislike').removeAttr('href');
            //Adds opacity class
            element.off('click').parent().find('.reply-like, .reply-dislike').addClass('like-after-click');
            //Displays votes for that single comment
            element.parent().find('.reply-like-count').html(data.votesLike);
            element.parent().find('.reply-dislike-count').html(data.votesDislike);

        });
});

let modalUserName = $('#modalUpdateName');
let modalUserPassNew = $('#modalUpdatePassNew');
let modalUserPassConfirm = $('#modalUpdatePassConfirm');

$('.modal-name').on('click touchstart',function (e) {
    e.preventDefault();
    modalUserName.attr('readonly',false).removeClass( "text-right" ).focus();

});

$('.modal-pass').on('click touchstart', function (e) {
    e.preventDefault();
    $('.modal-update-password').toggleClass('d-none');
});


$('.modal-update-image').on('click touchstart',function (e) {
    e.preventDefault();
    selectLocalProfileImage();
});


$('#authorImageUpload').change(function () {
    const file = this.files[0];

    if (file.type.startsWith("image/")) {
        saveUpdatedProfileImage('author',file);
    } else {
        alert('Only images are allowed for upload.');
    }
});

function selectLocalProfileImage() {

    alert('Preferred profile image size to upload is 150x150px');

    const input = document.createElement('input');

    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();


    // // Listen upload local image and save storage
    input.onchange = () => {
        const file = input.files[0];

        if (file.type.startsWith("image/")) {
            saveUpdatedProfileImage('user',file)
        } else {
            alert('Only images are allowed for upload.');
        }

    };
}

var imageUploadFlag = false;

function saveUpdatedProfileImage(type,file) {
    startLoading();
    const formData = new FormData();

    formData.append('file', file);

    $.ajax({
        method: "POST",
        url: "/user-image/upload",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false
    })
        .fail(function(jqxhr, textStatus, errorThrown, data) {
            stopLoading();
            alert('An error occured! Please try againg later.');
        })
        .done(function(data) {
            stopLoading();
            switch(type) {
                case 'user':
                    $('.user-profile-image').attr('src',data.url);
                    $('.user-profile-image-small').attr('src',data.url);
                    imageUploadFlag = true;
                    break;
                case 'author':
                    $('.author-update-image').attr('src',data.url);
                    $('.user-profile-image-small').attr('src',data.url);
                    break;
                default:
                    alert('An error occured! Please try againg later.');
                    break;
            }

        });
}

$('#modalUserAccount').on('hide.bs.modal',function () {
    modalUserName.attr('readonly',true).addClass( "text-right" );
    if(imageUploadFlag) {
        location.reload();
    }
});


$('#modalUserSave').on('click touchstart',function (e) {
    e.preventDefault();

    let updateUserName = $("#modalUpdateName").val();
    let updateUserPassNew = $('#modalUpdatePassNew').val();
    let updateUserPassConfirm = $('#modalUpdatePassConfirm').val();
    let userModalId = $("#userModalId").val();
    let userModalRoleId = $('#userModalRoleId').val();

    let data = {
        _token : $('meta[name="csrf-token"]').attr('content'),
        name: updateUserName,
        password: updateUserPassNew,
        password_confirmation : updateUserPassConfirm,
        userId : userModalId,
        roleId : userModalRoleId
    };

    if (!updateUserPassNew) {
        delete data.password;
        delete data.password_confirmation;
    }

    // //On every save the span tags disappear and appear again
    $('.modal-error').hide();

    $.ajax({
        method:'POST',
        url: '/user/update',
        data: data,
        dataType: "json"
    })
        .fail(function(jqxhr, textStatus, errorThrown, data) {

            let status = jqxhr.status;
            let response = JSON.parse(jqxhr.responseText);

            switch (status) {
                case 403:
                    alert('User update error');
                    break;
                case 422:
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                    break;
                default:
                    alert("An error occured! Please try againg later.");
                    break;
            }

    })
        .done(function(data) {
           $('.user-modal-name, .account-name').html(data.user.name);
           $(".modal-update-success").html(data.message).show();
           setTimeout(function () {
               location.reload();
           },1000);
        });

});



// Update author profile form
$('#submitAuthorUpdate').on('click touchstart',function (e) {
    e.preventDefault();

    let authorName = $('#AuthorName').val();
    let authorEmail = $('#AuthorEmail').val();
    let authorAbout = $('#AuthorAbout').val();


    $.ajax({
        method:'POST',
        url: '/profile/update',
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            name : authorName,
            email : authorEmail,
            about : authorAbout,
        },
        dataType: "json"
    })
        .fail(function (jqxhr, textStatus, errorThrown, data) {

            let status = jqxhr.status;
            let response = JSON.parse(jqxhr.responseText);

            switch (status) {
                case 403:
                    alert("An error occured! Please try againg later.");
                    break;
                case 422:
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                    break;
                default:
                    alert("An error occured! Please try againg later.");
                    break;
            }

        })
        .done(function (data) {
            $('.error-custom').hide();
            $('.reply-ajax-message_success').html(data.message).slideDown(400,function () {
                setTimeout(function () {
                    $('.reply-ajax-message_success').slideUp();
                },2000)
            });
        });
});

// Update author password form

$('#chagenAuthorPassword').on('click touchstart',function (e) {
    e.preventDefault();
    let currentPassword = $('#editCurrentPass').val();
    let newPassword = $('#editNewPass').val();
    let confirmPassword = $('#editConfrimNewPass').val();

    $.ajax({
        method:'POST',
        url: '/profile/update/password',
        data: {
            _token : $('meta[name="csrf-token"]').attr('content'),
            current : currentPassword,
            password: newPassword,
            password_confirmation : confirmPassword,
        },
        dataType: "json"
    })
        .fail(function (jqxhr, textStatus, errorThrown, data) {
            let status = jqxhr.status;
            let response = JSON.parse(jqxhr.responseText);

            switch (status) {
                case 404:
                    $('.error-current').html(response.message).show();
                    break;
                case 422:
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                    break;
                default:
                    alert("An error occured! Please try againg later.");
                    break;
            }

        })
        .done(function (data) {
            alert(data.message);
            window.location = data.url;
        });
});










































// QUILL

var toolbarOptions = [
    'bold',
    'underline',
    'italic',
    'link',
    { align: [] },
    { header: [1,2,3,4,5,6,false]},
    {'color': []}, {'background': []},
    'image'
];

var editorOptions = {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Type text...',
    theme: 'snow'
};

var editor = new Quill('#editor',editorOptions);
var toolbar = editor.getModule('toolbar');

//Inserts image src path into editor and displays the image
function insertToEditor(image) {
    const range = editor.getSelection();

    editor.insertEmbed(range.index, 'image', image);
}

function saveToStorage(type,file) {
    startLoading();
    var formData = new FormData();

    //Sets the data to be sent by form i can be caught as request in the backend
    formData.append('file', file);

    $.ajax({
        method: "POST",
        url: "/image/upload",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false
    })
        .fail(function(jqxhr, textStatus, errorThrown, data) {
            stopLoading();
            $('.fa-check').hide();
            $('.fa-times').show(100,function () {
                alert('An error occured! Please try againg later.');
            });
        })
        .done(function(data) {
            stopLoading();
            $('.fa-times').hide();
            $('.fa-check').show(100);
            switch(type) {
                case 'editor':
                    insertToEditor(data.url);
                    break;
                case 'headline':
                    $('#headline-image-url').val(data.url);
                    break;
                default:
                    alert('An error occured! Please try againg later.');
                    break;
            }
        });
}

// Creates input file in the background and catches selected file
function selectLocalImage() {
    const input = document.createElement('input');

    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    // Listen upload local image and save storage
    input.onchange = () => {
        const file = input.files[0];

        if (file.type.startsWith("image/")) {
            saveToStorage('editor',file);
        } else {
            alert('Only images are allowed for upload.');
        }

    };
}

// Add image handler
toolbar.addHandler('image', () => {
    selectLocalImage()
});

// Add tag to post Initial

if ($('.tags-add').length) {
    $('#post-tags').tagsInput({
        'height': '100%',
        'width': 'inherit',
        'defaultText': '',
    });
}

$('#imageFile').change(function (e) {
    const file = this.files[0];

    if (file.type.startsWith("image/")) {
        saveToStorage('headline',file);
    } else {
        alert('Only images are allowed for upload.');
    }
});


// Submit post on click
$('#post-submit').on('click',function (e) {
    e.preventDefault();

    startLoading();
    var formData = new FormData();

    var url = $("#headline-image-url").val();
    formData.append('url', url);

    var subject = $('#subject').val();
    formData.append('title',subject);

    var category = $('#post-category').val();
    formData.append('category',category);

    var myEditor = document.querySelector('#editor');
    var content = myEditor.children[0].innerHTML;
    formData.append('content',content);

    var tags = $('#post-tags').val();
    formData.append('tags',tags);

    $.ajax({
        type:"POST",
        url:'/post/store',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false
    })
        .fail(function (jqxhr, textStatus, errorThrown) {
            stopLoading();
            var response = JSON.parse(jqxhr.responseText);
            var statusCode = jqxhr.status;

            //On every submit the span tags disappear and appear again
            $('.error-custom').hide();

            switch(statusCode) {
                case 403:
                    // user is not logged in
                    alert(response.message);
                    break;
                case 422:
                    // input fields validation failed
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                    break;
                default:
                    alert("Application isn't currently working.Please come back later.");
            }

        })
        .done(function (data) {
            if (data.status === 'success') {
                stopLoading();
                window.location = data.url;
            }
        });

    // Add tag to post on Submit

    if ($('.tags-add').length) {
        $('#post-tags').tagsInput({
            'height': '100%',
            'width': 'inherit',
            'defaultText': '',
        });
    }

});



