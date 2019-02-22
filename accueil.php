<style>
	*{
		transform-style: preserve-3d;
	}
	body{
		background: radial-gradient(#424242, #000);
	}
	main{
		position: relative;
		perspective: 2000px;
		overflow: hidden;
	}
/***************/
/* Trajectoire */
/***************/
	main>div, main>div>div>div{
		position: absolute;
		top:50%;
		left:50%;
		border: 3px solid #666;
		border-radius: 50%;
		
		height: var(--distance);
		width: var(--distance);

		animation: tourne var(--temps) infinite linear -204s;
	}
	@keyframes tourne{
		0%{transform: translate(-50%, -50%) rotateX(60deg) rotate(0) }
		100%{transform: translate(-50%, -50%) rotateX(60deg) rotate(360deg) }
	}
	.soleil{
		border: none;
		background: yellow;
		transform: translate(-50%, -50%);
		box-shadow: 0 0 30px red inset;
	}
/***************/
/*   Planète   */
/***************/
	main>div>div, main>div>div>div>div{
		position: relative;
		height: var(--taille);
		width: var(--taille);
		background: var(--couleur);
		border-radius: 50%;
		margin: auto;
		transform: translateY(-50%) rotateX(-60deg);
		animation: tournePlanete var(--temps) infinite linear -204s;
		box-shadow: 0 0 10px #424242 inset;
	}
	@keyframes tournePlanete{
		0%{transform: translateY(-50%) rotate(0) rotateX(-60deg);}

		50%{box-shadow: calc(-1 * var(--taille)) 0 10px #424242 inset}
		50.001%{box-shadow: var(--taille) 0 10px #424242 inset}
		
		100%{transform: translateY(-50%) rotate(-360deg) rotateX(-60deg);}
	}
</style>

<div class=soleil style="--distance: 8vw"></div>

<div style="--distance: 20vw; --temps: 3s;">
	<div style="--taille: 10px; --couleur: #b39c7c"></div>
</div>

<div style="--distance: 28vw; --temps: 7.5s;">
	<div style="--taille: 15px; --couleur: #c2a37e"></div>
</div>

<div style="--distance: 36vw; --temps: 12s">
	<div style="--taille: 20px; --couleur: #00BEFA">
		<div style="--distance: 40px; --temps: 1s">
			<div style="--taille: 8px; --couleur: #fff"></div>
		</div>
	</div>
</div>

<div style="--distance: 42vw; --temps: 24s">
	<div style="--taille: 15px; --couleur: #bc5635"></div>
</div>

<div style="--distance: 50vw; --temps: 144s">
	<div style="--taille: 40px; --couleur: #92755a"></div>
</div>

<div style="--distance: 58vw; --temps: 348s">
	<div style="--taille: 35px; --couleur: #f2d5ae"></div>
</div>

<div style="--distance: 66vw; --temps: 1008s">
	<div style="--taille: 20px; --couleur: #83ddf3"></div>
</div>

<div style="--distance: 72vw; --temps: 1980s">
	<div style="--taille: 10px; --couleur: #8394f1"></div>
</div>

<!-------------------------------->

<a-scene embedded inspector keyboard-shortcuts="enterVR:false;exitVR:false" screenshot vr-mode-ui="enabled:false">
	<a-entity animation="property: rotation; dur:3000; dir:alternate; from:-30 0 0; to:0 0 0; loop:true; easing:easeInOutCubic"> 
		<a-entity 
		animation="property: rotation; dur:5000; dir:alternate; from:0 -15 0; to:0 15 0; loop:true; easing:easeInOutCubic"> 
		
			<a-entity position="-4.5 0.12 1" text__m="width:50;value:M;tabSize:0;wrapCount:10;align:center;color:#00adb5"></a-entity>
			<a-entity> 
				<a-entity position="0 0 0" geometry="color:red;primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="4.5 0 0" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="4.5 0 1" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="5.5 0 1" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="4.5 0 1" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="5.5 0 0" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="1 0 1" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="0 0 1" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="1 0 0" geometry="primitive:cylinder;radius:0.03;height:6" material="color:#00adb5"></a-entity>
				<a-entity position="2 1.65 0" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 30" material="color:#00adb5"></a-entity>
				<a-entity position="3.5 1.65 0" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 -30" material="color:#00adb5"></a-entity>
				<a-entity position="3.5 1.65 1" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 -30" material="color:#00adb5"></a-entity>
				<a-entity position="3.5 0.5 1" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 -30" material="color:#00adb5"></a-entity>
				<a-entity position="3.5 0.5 0" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 -30" material="color:#00adb5"></a-entity>
				<a-entity position="2 0.5 0" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 30" material="color:#00adb5"></a-entity>
				<a-entity position="2 0.5 1" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 30" material="color:#00adb5"></a-entity>
				<a-entity position="2 1.65 1" geometry="primitive:cylinder;radius:0.03;height:3" rotation="0 0 30" material="color:#00adb5"></a-entity>
			</a-entity>
			<a-entity position="7.5 0 0.5" geometry="primitive:box;height:6;" material="color:#00adb5"></a-entity>
		</a-entity>
		
	</a-entity>
	<a-entity position="1.15 4 10.61" rotation="-15.19 0 0" camera></a-entity>
</a-scene>