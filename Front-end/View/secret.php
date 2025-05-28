<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confidentialité - My App</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/secret.css">

</head>
<body>
  <header>
    <h1>Confidentialité</h1>
  </header>
  <div class="container">
    <div class="option">
      <span>Compte privé</span>
      <div><button class="onoff" onclick="onoff(this)"><div>off</div></button></div>
    </div>
    <div class="option">
      <span>Photo privé</span>
      <div><button class="onoff" onclick="onoff(this)"><div>off</div></div>
    </div>
    <div class="option">
      <span>Vrai Nom</span>
      <div><button class="onoff" onclick="onoff(this)"><div>off</div></div>
    </div>
  </div>
</body>
</html>
<script>
    var buttonstate=0;
function onoff(element)
{
  buttonstate= 1 - buttonstate;
  var blabel, bstyle, bcolor;
  if(buttonstate)
  {
    blabel="on";
    bstyle="green";
    bcolor="lightgreen";
  }
  else
  {
    blabel="off";
    bstyle="lightgray";
    bcolor="gray";
  }
  var child=element.firstChild;
  child.style.background=bstyle;
  child.style.color=bcolor;
  child.innerHTML=blabel;
}
    </script>
