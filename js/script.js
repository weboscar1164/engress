//header__nav__sp操作
const headerNav = $('.header__nav__sp'),
    navSlider = $('.header__nav__sp__slider'),
    navBtn = $('.header__nav__sp__btn');

navBtn.on('click', event=> {
    if ($(event.currentTarget).hasClass('jsBtnActive')) {
        navBtn.removeClass('jsBtnActive');
        navSlider.removeClass('jsSliderActive');
    } else {
        navBtn.addClass('jsBtnActive');
        navSlider.addClass('jsSliderActive');
    }
});

navSlider.on('click', () => {
    navBtn.removeClass('jsBtnActive');
    navSlider.removeClass('jsSliderActive');
});



//faq操作
const faqQuestion = $('.faq__item__question'),
    faqAnswer = $('.faq__item__answer'),
    faqItem = $('.faq__item');


$(faqQuestion).on('click', event => {
    $(faqQuestion).not(event.currentTarget).removeClass('jsQuestionActive')
    //押したquestion以外のactiveクラスを外す

    $(faqQuestion).not(event.currentTarget).next().slideUp(300);
    //押したquestion以外のanswerを閉じる
    
    $(event.currentTarget).toggleClass('jsQuestionActive');
    //押したquestionにactiveクラスを付与

    $(event.currentTarget).next().slideToggle(300);
    //押したquestionのanswerを開く
    
});

new ScrollHint('.jsScrollable', {
    scrollHintIconAppendClass: 'scroll-hint-icon-black', // white-icon will appear
    applyToParents: true,
    i18n: {
      scrollable: 'スクロールできます'
    }
});
  
const scrollWrapper = $('.detail__wrapper');

function scrollControl() {
    width = $(window).width();
    changePoint = 992
    if (width <= changePoint) {
        scrollWrapper.addClass('jsScrollable');
    } else {
        scrollWrapper.removeClass('jsScrollable');
    }
}

$(window).on('load', () => {
    scrollControl();
});

$(window).on('resize', () => {
    scrollControl();
});