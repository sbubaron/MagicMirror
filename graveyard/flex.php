<html>
<head>
	<title>Magic Mirror</title>


  <style>

  * {
    box-sizing: border-box;
  }

  body {
    background-color: #33ccff;
    padding: 0;
    margin: 0;
    width: 1080px;
    height: 1920px;
  }

  .container {

    display: flex;
    height: 100%;

    flex-direction: column;
  }

    .top {
      background-color: red;

      align-self: flex-start;
      width: 100%;
      height: 200px;
      min-height: 200px;
      max-height: 200px;
      display: flex;

    }

    .middle {
      background-color: green;
       align-self: center;
       padding: 50px;
      flex-direction: row;
      width: 100%;
      height: 100%;

      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .middle-item {
      background: orange;



       
       color: white;
       font-weight: bold;
       font-size: 3em;

    }

    .bottom {

      align-self: flex-end;

      background-color: pink;
      padding: 50px;

      flex-direction: column;
      width: 100%;
      height: 200px;
      min-height: 200px;
      max-height: 200px;

    }

    .top-item {
      background: blue;


 width: 50%;


 color: white;
 font-weight: bold;
 font-size: 3em;

    }

    .bottom-item {
      background: tomato;


 margin: 20px;

 color: white;
 font-weight: bold;
 font-size: 3em;

    }
  </style>
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

</head>
<body>
<main class="container clear-night">

<section class="top">
<div class="top-left top-item">
  TOP left
</div>
<div class="top-right top-item">
  Top Right
</div>
</section>

<section class="middle">
<div class="middle-item">
  Middle Item
</div>

<div class="middle-item">
  Middle Item
</div>

<div class="middle-item">
  Middle Item
</div>

</section>

<section class="bottom">
  <div class="bottom-text bottom-item">
    You look awesome!
  </div>
</section>

</main>

</body>
</html>
