<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>タイピングゲーム</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="thissite.commmmm" />
<meta name="twitter:title" content="タイピングゲーム" />
<meta name="twitter:description" content="タイピングゲームでプログラミングの元凶" />
<meta name="twitter:image" content="img" />
<meta name="twitter:url" content="url" />
</head>
<body>
  <div id="container">
    <P class="target">Click Start!!</p>
    <P id="info">
      <span class="clear">ClearCount:0</span>
      <span class="miss">MissType:0</span>
    </P>
    <div id="result">
      <P>結果</P>
      <span class="clear">完了数:0</span><br />
      <span class="miss">ミスタイプ:0</span>
      <P>
      名前：<input type="text" name="name" id="name" />
      <P>
      <div id="btn" class="savebtn">保存する</div>
      <div id="twtbtn" class="tweet"><a href=""><i class="fab fa-twitter"></i>ツイートする</div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="main.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
