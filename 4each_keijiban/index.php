<!doctype HTML>
<html lang = "ja">

<head>

    <meta charset = "utf-8">
    <title>4each 掲示板</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">

</head>

<body>

    <header>

        <img src = "4eachblog_logo.jpg">
        <ul class = "menu">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>

    </header>

    <div class = "main_contain">

        <div class = "left">
            <h1>プログラミングに役立つ掲示板</h1>
            <form method = "POST" action = "insert.php">

            <h2>入力フォーム</h2>

                <div>
                    <label>ハンドルネーム</label>
                    <br>
                    <input type = "text" size = "35" name = "handlename">
                </div>


                <div>
                    <label>タイトル</label>
                    <br>
                    <input type = "text" size = "35" name = "title">
                </div>

                <div>
                    <label>コメント</label>
                    <br>
                    <textarea cols = "50" rows = "7" name = "comment"></textarea>
                </div>

                <div>
                    <input type = "submit" class = "submit" value = "送信">
                </div>

            </form>

            <?php

            require "DB.php";
                $dbconnect = new DB();

                $pdo = $dbconnect->connect();

                $stmt = $pdo->prepare($dbconnect->select());

                $stmt->execute();

                while($row = $stmt->fetch()){

                    echo "<div class = \"post\">";
                        echo "<div class = \"title\">";
                            echo $row['title'];
                        echo "</div>";

                        echo "<div class = \"comment\">";
                            echo $row['comments'];
                        echo "</div>";
                        
                        echo "<div class = \"handlename\">";
                            echo "posted by ".$row['handlename'];
                        echo "</div>";
                    echo "</div>";
                }

            ?>

            

        </div>


        <div class = "right">
            <h1>人気の記事</h1>
                <ul class = "menu_bar">
                    <li>php入門</li>
                    <li>phpとHTMLの関係</li>
                    <li>phpを組み込む</li>
                </ul>

            
            <h1>おすすめリンク</h1>
            <ul class = "menu_bar">
                <li>インターノウス公式</li>
                <li>VSCのススメ</li>
                <li>Sublime Text</li>
            </ul>

            <h1>カテゴリ</h1>
            <ul class = "menu_bar">
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
            </ul>

        </div>

    </div>

</body>

</html>