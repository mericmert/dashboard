<div class="navbar-container">
    <div class="icon-container">
        <a href="/">
            <i class="navbar-item home icon"></i>
            <span class="icon-text">Homepage</span>
        </a>
    </div>
    <div class="icon-container">
        <a href="/managers">
            <i class="navbar-item user tie icon"></i>
            <span class="icon-text">Managers</span>
        </a>
    </div>
    <div class="icon-container">
        <a href="/employees">
            <i class="navbar-item user friends icon"></i>
            <span class="icon-text">Employees</span>
        </a>
    </div>
    <div class="icon-container">
        <a href="#">
            <i class="navbar-item sign out alternate icon"></i>
            <span class="icon-text">Sign&nbsp;out</span>
        </a>
    </div>
</div>

<script>
    $(document).ready(function () {
      var isClicked = false;
      $("#navbar").click(() => {
        isClicked = !isClicked;
        if(isClicked){
            $(".navbar-container").css({"width": "3%"});
            $(".hamburger-menu").css("transform", "rotate(90deg)");
            $(".icon-text").css({"opacity": 0, "top" : "-40px"});
            $(".navbar-item").css("transform", "translateX(15px)");
        }
        else{
            $(".navbar-container").css("width", "14%")
            $(".hamburger-menu").css("transform", "rotate(0deg)")
            $(".icon-text").css({"opacity": 1, "top": "auto"});
            $(".navbar-item").css("transform", "translateX(0px)");


        }
      })
    })
  </script>