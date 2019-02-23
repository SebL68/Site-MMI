<style>
	main{
		display: grid;
		position: relative;
		overflow: hidden;
		grid-template-columns: 1fr auto 5%;
	}
	main>div{
		margin: 24px 4% 0 10%;
		z-index: 1;
		text-align: center;
	}
	main>div>iframe{
		background: var(--blanc-casse);
		padding: 10px;
		border-radius: 10px;
	}
	h2{
		font-family: "Trebuchet MS", Helvetica, sans-serif;
		font-weight: 100;
		letter-spacing: 2px;
		color: var(--couleur);
		text-shadow: 1px 1px 0 #ccc;
		flex:1;
	}
	canvas{
		position: absolute;
		top:0;
		left:0;
		right:0;
		bottom:0;
	}
	main>iframe{
		width: 500px;
		transform: translateZ(0);
		border: 10px solid var(--couleur);
		border-width: 0 10px 0 10px;
		background: linear-gradient(135deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 48%, var(--couleur) 48%, var(--couleur) 52%, rgba(0,0,0,0) 52%, rgba(0,0,0,0) 100%);
		background-size: 40px 40px;
	}
</style>

<canvas id="c"></canvas>

<div>
	<h2>
		Suivez l'acutalité du département sur Facebook et Twitter.
		<div class="fb-like" data-href="https://www.facebook.com/srcmulhouse/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
	</h2>
	<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsrcmulhouse%2F&width=77&layout=button&action=like&size=large&show_faces=false&share=false&height=65&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	
	<a href="https://twitter.com/MmiMulhouse?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow @MmiMulhouse</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>
<iframe name="fadca9e3949fd" height="1200px"  allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v3.2/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fvy-MhgbfL4v.js%3Fversion%3D44%23cb%3Df21f23c6ef7d768%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff3c42926ec4d018%26relation%3Dparent.parent&amp;container_width=1544&amp;height=1200&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsrcmulhouse%2F&amp;locale=fr_FR&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width=500px" style="visibility: visible; width: 500px; height: 1200px;" class=""></iframe>

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
