<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confidentialité - My App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #7b4db6;
      color: white;
      text-align: center;
      padding: 15px;
    }
    .container {
      padding: 20px;
    }
    .option {
      background: white;
      margin-bottom: 15px;
      padding: 15px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .toggle {
      width: 20px;
      height: 20px;
      border-radius: 50%;
    }
    .red { background-color: red; }
    .green { background-color: green; }

    .onoff
        {
        width:32px;
        height:32px;
        padding:1px 2px 3px 3px;	
        font-size:12px;
        background:lightgray;
        text-align:center;	
        }
        .onoff div
        {
        width:18px;
        height:18px;
        min-height:18px;	
        background:lightgray;
        overflow:hidden;
        border-top:1px solid gray;
        border-right:1px solid white;
        border-bottom:1px solid white;
        border-left:1px solid gray;			
        margin:0 auto;
        color:gray;
        }
    
  </style>
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
