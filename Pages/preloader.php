<!DOCTYPE html>
  <!-- divinectorweb.com -->
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>INDEX</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
      
  <div class="loading-area">
      <div class="loader">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>
  </body>
  </html>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
          setTimeout(function(){
              $('.loading-area').fadeToggle();
          }, 1500);
      </script>
  <style type="text/css">
    
      * {
    margin: 0;
    padding: 0;
  }
  .loading-area {
    display: grid;
    place-items: center;
    height: 100vh;
  }
  .loader div {
    height: 60px;
    width: 60px;
    border-radius: 50%;
    transform: scale(0);
    animation: animate 1.5s ease-in-out infinite;
    display: inline-block;
    margin: 10px;
    background-color: #2B65EC ;
    filter: drop-shadow(0 0 5px #fff) drop-shadow(0 0 23px #fff);
  }
  .loader div:nth-child(0) {
    animation-delay: 0s;
  }
  .loader div:nth-child(1) {
    animation-delay: 0.2s;
  }
  .loader div:nth-child(2) {
    animation-delay: 0.4s;
  }
  .loader div:nth-child(3) {
    animation-delay: 0.6s;
  }
  .loader div:nth-child(4) {
    animation-delay: 0.8s;
  }
  .loader div:nth-child(5) {
    animation-delay: 1s;
  }
  .loader div:nth-child(6) {
    animation-delay: 1.2s;
  }
  .loader div:nth-child(7) {
    animation-delay: 1.4s;
  }
  @keyframes animate {
    0%, 100% {
      transform: scale(0.1);
    }
    40% {
      transform: scale(1);
    }
    50% {
      transform: scale(1);
    }
  }

  </style>