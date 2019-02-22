<style>
	main{
		display: flex;
		position: relative;
		overflow: hidden;
	}
	canvas{
		position: absolute;
		top:0;
		left:0;
		right:0;
		bottom:0;
	}
	iframe{
		margin: auto;
		transform: translateZ(0);
		border: 10px solid var(--couleur);
		border-width: 0 10px 0 10px;
		background: linear-gradient(135deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 48%, var(--couleur) 48%, var(--couleur) 52%, rgba(0,0,0,0) 52%, rgba(0,0,0,0) 100%);
		background-size: 40px 40px;
	}
</style>
<!--
<div id="fb-root"></div>
<script>
	document.querySelector(".fb-page").dataset.height = document.querySelector("main").offsetHeight + "px";
</script>
<script  src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2"></script>

<div class="fb-page" data-width="500px" data-height="" data-href="https://www.facebook.com/srcmulhouse/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/srcmulhouse/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/srcmulhouse/">Département MMI - IUT de Mulhouse</a></blockquote></div>
-->
<canvas id="c"></canvas>
<script>
	var main = document.querySelector("main");
	var NbPoints = 150;
	var TaillePoints = 4;
	var Vitesse = 4;
	var Distance = 250;

	var ColorBlue = "#95e1d3";
	var ColorRed = "#ff6400";

	var Points = [];
	var W = main.offsetWidth;
	var H = main.offsetHeight;
		
	var c = document.getElementById("c");
	var ctx = c.getContext("2d");

	function Dist(P1,P2){
		var x1 = P1[0];
		var y1 = P1[1];
		var x2 = P2[0];
		var y2 = P2[1];
		return Math.sqrt((x2-x1)*(x2-x1) + (y2-y1)*(y2-y1));
	}
	function StrRGB(c, g){
		if(g===undefined)g=1;
		return "rgb("+Math.floor(c[0]*g)+","+Math.floor(c[1]*g)+","+Math.floor(c[2]*g)+")";
	}
	function Init(){
		W = main.offsetWidth;
		H = main.offsetHeight;
		
		/**** FACEBOOK ****/
		document.querySelector("main>iframe").style.height = H+"px";

		c.width = W;
		c.height = H;

		NbPoints = H*W / 50000;
		
		Points = [];
		for(var i=0;i<NbPoints;i++){
			var x = Math.round(Math.random()*W);
			var y = Math.round(Math.random()*H);
			var vx = Math.random()*Vitesse-Vitesse/2;
			var vy = Math.random()*Vitesse-Vitesse/2;
			Points.push([x,y,vx,vy]);
		}

		ctx.strokeStyle = ColorBlue;
		ctx.fillStyle = ColorRed;
	}
	
	function Calculer(){
		for(var i=0;i<NbPoints;i++){
			Points[i][0] += Points[i][2];
			Points[i][1] += Points[i][3];
			if(Points[i][0]<-Distance)Points[i][0]=W+Distance;
			if(Points[i][0]>W+Distance)Points[i][0]=-Distance;
			if(Points[i][1]<-Distance)Points[i][1]=H+Distance;
			if(Points[i][1]>H+Distance)Points[i][1]=-Distance;
		}
		Afficher();
		window.requestAnimationFrame(Calculer);
	}
	
	function Afficher(){
		ctx.clearRect(0,0,W,H);
		
		for(var i=0;i<NbPoints;i++){
			
			for(var j=i+1;j<NbPoints;j++){
				var d = Dist(Points[i],Points[j]);
				if(d < Distance){
					var Coef = 1-d/Distance;
					
					ctx.beginPath();
					ctx.moveTo(Points[i][0],Points[i][1]);
					ctx.lineTo(Points[j][0],Points[j][1]);

					ctx.lineWidth = TaillePoints*Coef/2;
					ctx.stroke();
				}
			}
			
			ctx.fillRect(Points[i][0]-TaillePoints/2,Points[i][1]-TaillePoints/2,TaillePoints,TaillePoints);
		}
	}
	
	Init();
	window.requestAnimationFrame(Calculer);
	window.addEventListener("resize", Init);
</script>

<iframe name="fadca9e3949fd" height="1200px"  allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v3.2/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fvy-MhgbfL4v.js%3Fversion%3D44%23cb%3Df21f23c6ef7d768%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff3c42926ec4d018%26relation%3Dparent.parent&amp;container_width=1544&amp;height=1200&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsrcmulhouse%2F&amp;locale=fr_FR&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width=500px" style="visibility: visible; width: 500px; height: 1200px;" class=""></iframe>