$(document).ready(function () {
    var $countdownContainer = $('.countdown-items'); // Cria uma variável para o container do countdown no jQuery
    if ($countdownContainer.length === 0) return; // Mata o processo se não encontrar o container

    var targetDateStr = $countdownContainer.attr('data-time'); // Pega a data alvo do atributo data-time no HTML
    var targetDate = new Date(targetDateStr.replace(' ', 'T')); // Tradutor que converte a string para objeto Date usando 'T' como separador de data/hora para funcionar em todos os navegadores

    function updateCountdown() {
        var now = new Date(); // Cria um objeto Date (sem nada dentro) com a data/hora atual

        // Verifica se a data atual já passou da data alvo
        if (now >= targetDate) { 
            clearInterval(timerInterval); // Para o timer
            $countdownContainer.find('h1').text('00'); // Zera todos os campos
            return;
        }

        // --- CÁLCULOS ---
        var years = targetDate.getFullYear() - now.getFullYear(); // Subtrai o ano atual do ano alvo para saber quantos anos faltam
        var months = targetDate.getMonth() - now.getMonth(); // Subtrai o mês atual do mês alvo para saber quantos meses faltam
        var days = targetDate.getDate() - now.getDate(); // Subtrai o dia atual do dia alvo para saber quantos dias faltam
 
        // Ajuste de meses/anos
        if (months < 0 || (months === 0 && days < 0)) {
            years--;
            months += 12;
        }

        // Ajuste de dias (pega dias do mês anterior)
        if (days < 0) {
            var prevMonth = new Date(targetDate.getFullYear(), targetDate.getMonth(), 0);
            days += prevMonth.getDate();
            months--;
        }

        var totalMonths = (years * 12) + months;

        // Ajuste de horas
        var diffTime = targetDate.getTime() - now.getTime();
        var hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diffTime % (1000 * 60)) / 1000);

        // --- ATUALIZA A TELA ---
        // Agora funciona direto porque o ID está no H1
        $('#months').text(formatZero(totalMonths));
        $('#days').text(formatZero(days));
        $('#hours').text(formatZero(hours));
        $('#minutes').text(formatZero(minutes));
        $('#seconds').text(formatZero(seconds));
    }

    function formatZero(num) {
        return num < 10 ? '0' + num : num;
    }

    updateCountdown();
    var timerInterval = setInterval(updateCountdown, 1000);
});