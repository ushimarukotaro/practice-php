$(function(){
  $.ajax({url: './data/data.json',dataType: 'json'})
  .done(function(data){
    $(data).each(function(){
      var idName = '#' + this.id;
      // jsonのcountの値をDOMに反映する
      $(idName).find('.goodCount').text(this.count);
      // jsonのflagが1のとき、activeクラスを付与する
      if(this.flag === '1') {
        $(idName).find('.fa-heart').addClass('active');
      }
    });
  })
  .fail(function(){
    window.alert('読み込みエラー');
  });
  $('.fa-heart').on('click',function(){
    let goodnum = $(this).children('.goodCount').text() * 1;
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
      $(this).children('.goodCount').text(goodnum - 1);
    } else {
      $(this).addClass('active');
      $(this).children('.goodCount').text(goodnum + 1);
    }
  });
});
