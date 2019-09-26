<div class="content-header-c">
	<div id="toggle">
	  <div class="one"></div>
	  <div class="two"></div>
	  <div class="three"></div>
	</div>
</div>	

<style>

#toggle {
  width: 28px;
  height: 30px;
  float: right;
  display: none;
  padding-top: 13px;
  cursor: pointer;
}

#toggle div {
  width: 100%;
  height: 3px;
  background: white;
  margin: 4px auto;
  transition: all 0.3s;
  backface-visibility: hidden;
}

#toggle.on .one {
  transform: rotate(45deg) translate(3px, 3px);
}

#toggle.on .two {
  opacity: 0;
}

#toggle.on .three {
  transform: rotate(-45deg) translate(7px, -8px);
}

</style>

<script type="text/javascript">
	
	$("#toggle").click(function() {
  		$(this).toggleClass("on");
  		$("#menu").slideToggle();
 	});

</script>
