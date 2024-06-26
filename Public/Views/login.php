<html>
<head>
    <meta charset="utf-8"/>
    <title>SPACE PERFECT</title>
    <!--META-->
    <meta name="author" content="Piotr Zbinski"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--MAIN CSS-->
    <link rel="stylesheet" href="public/css/style.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

</head>
<body>
    <div></div>
    
    <div class="menu">
        <div>
            <h2 class="game-title"><span>SPACE</span><wbr><span>PERFECT</span></h2>
            <p id="welcome-message">Be fast. Be <i>focused</i>. Be perfect.</p>
            <form action="login" method="POST">
                <div>
                    <p class="form-paragraph">Sign in</p>
                    <input name="login" type="text" placeholder="Login"/>
                    <input name="password" type="password" placeholder="Password"/>
                    <button class="form-button" type="submit">GO</button>
                </div>
                
                    <?php if(isset($messages)){
                        echo '<p class="validation-message">';
                        foreach($messages as $message){
                            echo $message;
                        };
                        echo '</p>';
                    }
                    ?>
                <br>
                <br>
                <div>
                    <p class="form-paragraph a-left">or...</p>
                    <button class="form-button additional-text-above" type="button"><a href="signUp">Sign up</a></button>
                </div>
            </form>
            
        </div>
    </div>
	
    <!-- JAVASCRIPT -->
    <script src="" type="text/javascript"></script>
</body>
</html>