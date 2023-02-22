<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Troca de Senha</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway:800&display=swap");

        body {
            margin: 0px;
        }

        #container {
            position: absolute;
            margin: auto;
            width: 100vw;
            height: 80pt;
            top: 0;
            bottom: 0;

            filter: url(#threshold) blur(0.6px);
        }

        #text1,
        #text2 {
            position: absolute;
            width: 100%;
            display: inline-block;

            font-family: "Raleway", sans-serif;
            font-size: 80pt;

            text-align: center;

            user-select: none;
        }
    </style>
</head>

<body>

    <div class="container-animation">
        <div id="container">
            <span id="text1"></span>
            <span id="text2"></span>
        </div>

        <svg id="filters">
            <defs>
                <filter id="threshold">
                    <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
                                        0 1 0 0 0
                                        0 0 1 0 0
                                        0 0 0 255 -140" />
                </filter>
            </defs>
        </svg>
    </div>

    <script>
        const elts = {
            text1: document.getElementById("text1"),
            text2: document.getElementById("text2")
        };

        const texts = [
            "Olá!",
            // "<?php echo $_SESSION['user']['agent']; ?>",
            "Para sua",
            "Segurança",
            "Troque a sua",
            "Senha",
            "Senha.",
            "Senha..",
            "Senha..."
        ];

        const morphTime = 1;
        const cooldownTime = 0.25;

        let textIndex = texts.length - 1;
        let time = new Date();
        let morph = 0;
        let cooldown = cooldownTime;

        elts.text1.textContent = texts[textIndex % texts.length];
        elts.text2.textContent = texts[(textIndex + 1) % texts.length];

        function doMorph() {
            morph -= cooldown;
            cooldown = 0;

            let fraction = morph / morphTime;

            if (fraction > 1) {
                cooldown = cooldownTime;
                fraction = 1;
            }

            setMorph(fraction);
        }

        function setMorph(fraction) {
            elts.text2.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text2.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            fraction = 1 - fraction;
            elts.text1.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            elts.text1.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            elts.text1.textContent = texts[textIndex % texts.length];
            elts.text2.textContent = texts[(textIndex + 1) % texts.length];
        }

        function doCooldown() {
            morph = 0;

            elts.text2.style.filter = "";
            elts.text2.style.opacity = "100%";

            elts.text1.style.filter = "";
            elts.text1.style.opacity = "0%";
        }

        function animate() {
            requestAnimationFrame(animate);

            let newTime = new Date();
            let shouldIncrementIndex = cooldown > 0;
            let dt = (newTime - time) / 1000;
            time = newTime;

            cooldown -= dt;

            if (cooldown <= 0) {
                if (shouldIncrementIndex) {
                    textIndex++;
                }

                doMorph();
            } else {
                doCooldown();
            }
        }

        animate();

        setTimeout(() => {
            document.querySelector(".container-animation").style.display = "none"
        }, 10000);
    </script>
</body>

</html>