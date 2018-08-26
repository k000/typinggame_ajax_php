
$(function(){
  var texts = [];
  var gamestart;
  var currentText;//現在表示中のテキストは配列からこっちに入れる
  var currentTypeNum;//文字列の何文字目を打っているかの変数
  var targetText = $('.target');
  var clearCount;
  var missCount;
  //DBからタイピングデータを取り込む
  $(document).ready(function(){
    //初期化処理
    gamestart = false;
    currentText = "";
    currentTypeNum = 0;
    clearCount = 0;
    missCount = 0;

    $.post('../Data/_Typing.php',{

    }).done(function(res){
        /*
        alert(res.typing_texts);
        console.log(res.typing_texts);
        console.log(res.typing_texts.length);//1始まり
        console.log(res.typing_texts[0]['text']);//これで欲しいものが取れるtextはカラム名
        */
        //配列にぶち込む
        for(var i = 0; i < res.typing_texts.length; i++){
          texts.push(res.typing_texts[i]['text']);
        }
        //とりあえず先頭のものをセットしておくか
        currentText = texts[0];
    });
  });

    $('.target').on('click',function(){
      if(!gamestart){
        $(this).text(texts[0]);
        gamestart = true;

        setTimeout(function(){
            gamestart = false;
            GameOver();
        },13000);
      }
    });

  $(window).keydown(function(e){
    if(!gamestart)
      return;
    //打った文字とあってる
    if(currentText[currentTypeNum] === e.key || currentText[currentTypeNum].toUpperCase() === String.fromCharCode(e.keyCode)){
        doneChar = '';
        currentTypeNum ++;

        for(var i = 0;  i < currentTypeNum; i++){
          doneChar += ' ';
        }

        targetText.text(doneChar + currentText.substring(currentTypeNum));

        if(currentText.length === currentTypeNum){
          clearCount++;
          $('.clear').text("ClearCount:" + clearCount);
          setNexttext();
        }

      }else if(e.key === 'Shift'){
        //shiftキーの時現状スルー

      }else{
        missCount++;
        $('.miss').text("MissType:" + missCount);
      }
  });


  //次のタイピングテキストを設定する関数
  function setNexttext(){
    console.log("呼ばれました");
    //新しい文字列をセットする
    currentText = texts[Math.floor(Math.random() * texts.length)];
    targetText.text(currentText);
    currentTypeNum = 0;
  }

  //ゲームオーバー処理
  function GameOver(){
    $('#result').animate({
      'top':'110px'
    },1000);
    //ツイッターボタンを変更する
    $('.tweet').find('a').attr('href','http://twitter.com/share?text=得点は' + clearCount + 'でした。ミスタイプは'
      + missCount + 'です&url=https://www.sampletyping.tokyo/&hashtags=タイピング,プログラミング');
  }

  //save処理
  $(document).on('click','.savebtn',function(){
    if( $('.savebtn').hasClass('disable') ){
      return;
    }
    var hosturl = '../Data/_Save.php';
    var name = $('#name').val();
    $.ajax({
      url:'../Data/_Save.php',
      type:'POST',
      data:{ score : clearCount , name : name },
    }).done(function(){
      alert("保存しました");
      $('.savebtn').addClass('disable');
    }).fail(function(){
      alert("エラーが起きました。");
      $('.savebtn').addClass('disable');
    });
  });

});
