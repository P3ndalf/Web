$('#increase').click(function () {
  if($('img'.height < 900)){
    $('img').animate({height: '+=150px', opacity: '0.4'}, "slow");
    $('img').animate({width: '+=150px', opacity: '0.8'}, "slow");
    $('img').animate({height: '+=150px', opacity: '0.4'}, "slow");
    $('img').animate({width: '+=150px', opacity: '0.8'}, "slow");
  }
});

$('#decrease').click(function () {
  if($('img'.height > 80)){
    $('img').animate({width: '-=150px', opacity: '0.8'}, "slow");
    $('img').animate({height: '-=100px', opacity: '0.4'}, "slow");
    $('img').animate({width: '-=100px', opacity: '0.8'}, "slow");
    $('img').animate({height: '-=150px', opacity: '0.4'}, "slow");
  }
});

