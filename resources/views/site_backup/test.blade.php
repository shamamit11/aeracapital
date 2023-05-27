<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('/assets/admin/images/bg-auth1.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: #333;
  font-family: "Courier New", Courier, monospace;
  font-size: 35px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  {{-- <div class="topleft">
    <p>Logo</p>
  </div> --}}
  <div class="middle">
    {{-- <div><img src="{{ asset('assets/site/img/logo.svg') }}" alt="Aera Capital" style="width:400px"></div> --}}
    <h1>AERA CAPITAL</h1>
    <hr>
    <p>
        <strong>Email: info@aera-capital.com</strong>
    </p>
  </div>
  {{-- <div class="bottomleft">
    <p>Some text</p>
  </div> --}}
</div>

</body>
</html>
