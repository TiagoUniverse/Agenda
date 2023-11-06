<?php

// Ler o conteúdo do arquivo JSON
$jsonData = file_get_contents('./lib/JSON/dados.json');

// Decodificar o JSON em um array PHP
$data = json_decode($jsonData, true); // O segundo argumento `true` converte o JSON em um array associativo

// Verificar se a decodificação foi bem-sucedida
if ($data === null) {
    echo "Erro ao decodificar o JSON.";
} else {
    // Agora, a variável $data contém os dados do JSON como um array PHP
    print_r($data);

    echo '<script>';
    echo 'var jsonData = ' . json_encode($data) . ';';
    echo '</script>';
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          start: 'prev,next,today',
          center: 'title',
          end: 'dayGridMonth, timeGridWeek, timeGridDay'
        },
        buttonText: {
          today: 'Hoje',
          month: 'Mês',
          week: 'Semana',
          day: 'Dia',
          list: 'Lista'
        },
        locale: 'pt-br',
        events: jsonData
      });
      calendar.render();
    });

  </script>
</head>

<body>
  <div id='calendar'></div>
</body>

</html>