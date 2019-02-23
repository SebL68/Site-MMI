<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MMI Mulhouse</title>
    <style>
		:root{
			--couleur: #FF6400;
			--blanc-casse: #eeeeee;
			--foncee-foncee: #222831;
			--foncee: #393e46;
			
			
			--menu: var(--blanc-casse);
			--bouton: #FFFFFF;
			--body: #f38181;
			--bouton_plus: #95e1d3;

		}
        html{
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            background: linear-gradient(var(--foncee), var(--foncee-foncee));
            background-size: 100% 100vh;
            background-attachment: fixed;
            font-family: arial;
            display: flex;
            height: 100vh;
        }
        header{
            position: relative;
            z-index: 10;
            position: fixed;
            top:0;
            left:0;
            bottom:0;
            right:0;
            transform: translateX(-100%) ;
            transition: 0.2s;
            transition-timing-function: ease-in;
        }
        main{
            flex: 1;
            overflow: auto;
        }
        h2{
            position: sticky;
            top:0;
        }

        header>svg{
            position: absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
        } 
        header h1{
            margin: 20px;
            color: #FFF;
            text-shadow:
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
           
        }
        header h1 a{
            color:#FFF;
            text-decoration: none;
            display: flex;
            justify-content: space-around;
        }
        header h1 span{
            color: var(--bouton_plus);
        }
        header img{
            width: 300px;
        }
        header>div{
            transform: translateZ(0);
            display: flex;
            flex-direction: column;
            height:100%;
        }
        nav{
            overflow: auto;
            flex:1;
            scrollbar-width: thin;
        }
        nav::-webkit-scrollbar {
            width: 5px;
        }
        nav::-webkit-scrollbar-thumb {
            background: #bbb; 
        }
        nav a{
            display: block;
            padding: 20px;
            border: 1px solid #AAA;
            border-radius: 3px;
            margin:20px;
            color:#000;
            text-align: center;
            text-decoration: none;
			background: var(--bouton);
        }
		header path{
			fill: var(--menu);
		}
        .zone_infos::before{
            content:"";
            display:block;
            margin:auto;
            border-top: 1px solid #aaa;
            width:50%;
        }
        .zone_infos a{
            background: var(--bouton_plus);
        }

        .decoMobile{
            display: none;
        }
        /************************/
        /* Menu */
        /************************/         
        .menuOF{
            position:fixed;
            top:5px;
            left: 100%;
            margin: 20px;
            z-index:1;
        }
        .menuOF>div{
            width: 40px;
            height: 6px;
            margin: 6px;
            border-radius: 3px;
            background: var(--bouton_plus);
            transition: 0.4s;
            box-shadow:
                -1px -1px 0 #999,  
                1px -1px 0 #999,
                -1px 1px 0 #999,
                1px 1px 0 #999;
        }
        .ouvert{
            transform: translateX(0);
        }
        .ouvert .menuOF{
            transform: translateX(-140%);
        }
        .ouvert .menuOF>div:nth-child(1){
            transform: translate(0,12px) rotate(45deg);
        }
        .ouvert .menuOF>div:nth-child(2){
            opacity:0;
        }
        .ouvert .menuOF>div:nth-child(3){
            transform: translate(0,-12px) rotate(-45deg);
        }

        
        /************************/
        /************************/
        @media screen and (min-width: 720px){
            .decoMobile{
                display: block;
            }
            header{
                right: initial;
            }
            .ouvert .menuOF{
                transform: translateX(0);
            }
        }
        @media screen and (min-width: 1200px){
            header{
                position: static;
                transform: translateX(0);
            }
        }
    </style>
    <script src="https://aframe.io/releases/0.9.0/aframe.min.js"></script>
</head>

<body>
    <header>
        
        <svg width="115%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">	
            <path d="M0 0 L100 0 Q80 50 100 100 L0 100 Z"></path>
        </svg>
        <div>
            <div class="menuOF">
                <div></div>
                <div></div>
                <div></div>
            </div>	
            <a href="http://www.iutmulhouse.uha.fr/" target="_blank"><img src=img/IUT_Mulhouse-encart.png alt="Logo IUT Mulhouse"></a>
            <h1>
                <a href="accueil.php">
                    <div><span>DUT</span></div>
                    <div>
                        <div><span>M</span>étiers du</div>
                        <div><span>M</span>ultimédia et de</div>
                        <div>l'<span>I</span>nternet</div>
                    </div>
                </a>
            </h1>
            <nav>  

                <a href="news.php">Quoi&nbsp;de&nbsp;neuf ?</a>
                <a href="formation.php">La&nbsp;formation</a>
                <a href="realisation.php">Réalisations</a>
                <a href="edt.php">Emplois&nbsp;du&nbsp;temps</a>

                <div class="zone_infos">
                    <a href="mailto:mmi.iutmulhouse@uha.fr" target="_blank">📧 mmi.iutmulhouse@uha.fr</a>
                    <a href="tel:0389337580" target="_blank">📞 03 89 33 75 80</a>
                    <a rel="noopener" href="https://goo.gl/maps/7KS4qf9SEX82" target="_blank">📍 61 rue Albert Camus, 68093 Mulhouse</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <?php include('accueil.php'); ?>
    </main>

    <script>
        function LoadPage(event){
            event.preventDefault();
            
            fetch(this.href).
                then(response => response.text()).
                then(txt => {
                    let main =  document.querySelector("main");
                    main.innerHTML = txt;

                    main.querySelectorAll("script").forEach(e=>{
                        if(e.src != ""){
                            let s = document.createElement("script");
                            s.src = e.src;
                            main.appendChild(s);
                        }else eval(e.innerText);
                    })
                });
            document.querySelectorAll("nav>a").forEach(function(e){
                e.style.background = "";
            });
            if(this.parentElement.tagName != "H1") this.style.background = "var(--couleur)";
            document.querySelector("header").classList.remove("ouvert");
        }

        document.querySelectorAll("nav>a, header h1>a").forEach(function(e){
            e.addEventListener("click", LoadPage);
        });


        function ChangeEDT(id){
            document.querySelector("main>iframe").src = "https://www.emploisdutemps.fr/edt/"+id;
        }


        /*****************************/
        /**         Le menu         **/
        /*****************************/
        document.querySelector(".menuOF").addEventListener("click", function(){
            document.querySelector("header").classList.toggle("ouvert");
        });
    </script>
</body>
</html>

