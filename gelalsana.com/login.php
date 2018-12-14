<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style1.css">

  
</head>

<body>


<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  
</div>
<form>
<!-- Form Module-->
<div class="module form-module">
  
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Kayıt Ol</div>
  </div>
 
  <div class="form">
    <a href="#" class="close" id="close"></a>
    <h2>Hesabınıza giriş yapın</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <button>Oturum Aç</button>
    </form>

  </div>
  <div class="form">
    <a href="#" class="close"></a>
    <h2>Hesap oluştur</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Kayıt Ol</button>
    </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Parolanızı mı unuttunuz?</a></div>
</div>
</form>
<script type="text/javascript">
  
  window.onload = function(){
    document.getElementById('close').onclick = function(){
        this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
        return false;
    };
};
</script>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>
<script  src="js/index.js"></script>




</body>

</html>
