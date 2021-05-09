<!-- Стили для блока с сообщениями!-->
<head>
    <style>
        body {
            background-color: rgba(120,181,227,1);

        }
        #123{
            width: 100%;
        }

        .header {
            padding: 30px;
            text-align: center;
            background: #1abc9c;
            color: white;
            font-size: 20px;
        }

        .form{
            padding: 10px;
            text-align: right;
            background: #1abc9c;
            color: white;
            font-size: 5px;
        }

        .child{
            width: 50%;
            display: inline-block;
        }

        .table{
            padding: 15px;
            background: #1abc9c;
            color: white;
            width: 100%;
        }

        #qwe{
            display: inline-block;
            height: auto;
            line-height: 50px;
            position: relative;
            border: 1px solid white;
            padding: 0 1rem;
        }

        input[type=text] {
            color: white;

        }
        #messages
        {
            height:500px;
            border:1px solid silver;
            color:white;

            font-size:15px;
            overflow:auto;

        }
        #mess{
            background-color: rgba(0,0,0,1);
            width: 100%;
        }
        #mess_to_send{
            color: black;
            width: 100%;
            height: 25px;
        }
        #send {
             -webkit-transition-duration: 0.4s; /* Safari */
             transition-duration: 0.4s;
            width: 100px;
            height: 30px;
         }

        #send:hover {
            background-color: #4CAF50; /* Green */
            color: white;
        }
    </style>
    <!--Подключаем Jquery!-->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
</head>
<!--Подключаем Jquery!-->
<!--При загрузке страницы подгружаем сообщения !-->
<body onload = "load_messes()">
<script type="text/javascript">
	//Загружаем библиотеку JQuery
	google.load("jquery", "1.3.2");
	google.load("jqueryui", "1.7.2");

	//Функция отправки сообщения
	function send()
	{
		//Считываем сообщение из поля ввода с id mess_to_add
		var mess=$("#mess_to_send").val();
		// Отсылаем паметры
       $.ajax({
                type: "POST",
                url: "add_mess.php",
                data:"mess="+mess,
                // Выводим то что вернул PHP
                success: function(html)
				{
					//Если все успешно, загружаем сообщения
					load_messes();
					//Очищаем форму ввода сообщения
					$("#mess_to_send").val('');
                }
        });
	}
	
	//Функция загрузки сообщений
	function load_messes()
	{
		$.ajax({
                type: "POST",
                url:  "load_messes.php",
                data: "req=ok",
                // Выводим то что вернул PHP
                success: function(html)
				{
					//Очищаем форму ввода
					$("#messages").empty();
					//Выводим что вернул нам php
					$("#messages").append(html);
					//Прокручиваем блок вниз(если сообщений много)
					$("#messages").scrollTop(90000);
                }
        });
	}
</script>
<form class = "form" action="exit.php">
    <button id="qwe" type="submit">Выход</button>
</form>
<table class="table">
<tr>
<td>
<div id="messages">
</div>
</td>
</tr>
<tr>
<td>
<form class="form" action="javascript:send();">
<input type="text" id="mess_to_send" class="child">
<input type="submit" value="Отправить" id="send" class="child">
</form>
</td>
</tr>
</table>
<script>
    //Ставим цикл на каждые три секунды
    setInterval(load_messes,1000);
</script>
<center>

</center>
</body>