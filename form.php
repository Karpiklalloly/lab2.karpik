<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $reasonsToPlay = test_input($_POST["reasonsToPlay"]);//+
        $dateOfFirstPlay = test_input($_POST["dateOfFirstPlay"]);//+
        $CountOfMmr = test_input($_POST["CountOfMmr"]);//+
        $mmr = test_input($_POST["mmr"]);//+
        $dotersEmail = test_input($_POST["dotersEmail"]);//+
        $dotersPassword = test_input($_POST["dotersPassword"]);//+
        $dotersPick = test_input($_POST["dotersPick"]);//+

        $dotersItems1 = $_POST['dotersItems'];
        if (empty($dotersItems1))//+
        {
            $dotersItems2 = "Вы ничего не покупаете";
        }
        else
        {
            $dotersItems2="";
            foreach($dotersItems1 as $di)
            {
                $dotersItems2=$dotersItems2.$di.", ";
            }
            print_r($dotersItems);
        }

        $contact = $_POST["contact"];//+

        $areaOfText = test_input($_POST["areaOfText"]);//+

        $filelink="dataform"."123".".txt";
        $fd = fopen($filelink, 'w') or die("Не удалось создать файл");
        fwrite($fd,
        "Причины играть: $reasonsToPlay
        Дата начала игры: $dateOfFirstPlay
        Количество ммр: $CountOfMmr
        Должно ли быть больше ммр? $mmr
        Введенный e-mail: $dotersEmail
        Введенный пароль: $dotersPassword
        Пик: $dotersPick
        Способ подтверждения личности: $contact
        Ваше описание: $areaOfText
        Вы покупаете: $dotersItems2
        ");
        fclose($fd);
        echo("<a download href='$filelink'>Ссылка на файл</a>");

        if(!empty($_FILES['avatar']['tmp_name']))
        { 
            $tmp = $_FILES['avatar']['tmp_name'];
    
            $name = $_FILES['avatar']['name'];
    
            $path = "image/".$name;
    
            move_uploaded_file($tmp, $path);

            echo "<img src='$path' alt='$name' />";
        }
        
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>