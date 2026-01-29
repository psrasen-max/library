$(document).ready(function () {

    // ==========================================
    // 1. CONFIGURAÇÕES GLOBAIS E INTERFACE
    // ==========================================

    // Garante que os gráficos respeitem a altura da div pai (Responsividade)
    Chart.defaults.maintainAspectRatio = false;

    // Lógica do Botão "Ocultar/Exibir Painel"
    $('#toggleSidebar').on('click', function () {
        $('.sidebar').toggleClass('collapsed');

        // Aguarda a animação do CSS (300ms) e força os gráficos a se redesenharem
        // para se ajustarem ao novo tamanho da tela.
        setTimeout(function () {
            window.dispatchEvent(new Event('resize'));
        }, 300);
    });

    // ==========================================
    // 2. INICIALIZAÇÃO DOS GRÁFICOS
    // ==========================================

    // --- GRÁFICO 1: LINHA (Evolução de Vendas) ---
    if ($('#chartVendasTempo').length) {
        new Chart($('#chartVendasTempo'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Vendas (R$)',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.05)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                plugins: { legend: { display: false } }
            }
        });
    }

    // --- GRÁFICO 2: PIZZA (Por Categoria) ---
    if ($('#chartCategorias').length) {
        new Chart($('#chartCategorias'), {
            type: 'doughnut',
            data: {
                labels: ['Aventura', 'Romance', 'Terror', 'Outros'],
                datasets: [{
                    data: [851, 322, 450, 667],
                    backgroundColor: ['#0d6efd', '#198754', '#dc3545', '#adb5bd']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 10, font: { size: 10 } }
                    }
                }
            }
        });
    }

    // --- GRÁFICO 3: BARRAS (Histórico Detalhado) ---
    if ($('#chartHistorico').length) {
        new Chart($('#chartHistorico'), {
            type: 'bar',
            data: {
                labels: ['Total', '3 Anos', '1 Ano', '6 Meses', '3 Meses', 'Último Mês'],
                datasets: [{
                    label: 'Livros Vendidos',
                    data: [5000, 3200, 1500, 800, 450, 120],
                    backgroundColor: '#6610f2', // Roxo
                    borderRadius: 6,
                    barPercentage: 0.5
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#e2e8f0' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // --- GRÁFICO 4: NOVOS CADASTROS (VERSÃO ESTÁVEL ROXA) ---
    if ($('#chartCadastros').length) {

        // SEGURANÇA: Destrói qualquer instância anterior para evitar conflitos
        const canvasCadastros = document.getElementById('chartCadastros');
        const chartExistente = Chart.getChart(canvasCadastros);
        if (chartExistente) { chartExistente.destroy(); }

        new Chart(canvasCadastros, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Usuários Cadastrados',
                    data: [12, 19, 3, 5, 2, 3, 15, 10, 25, 18, 12, 22],
                    backgroundColor: '#6610f2', // Roxo (Consistente com o tema)
                    borderRadius: 6,
                    barPercentage: 0.5
                }]
            },
            options: {
                maintainAspectRatio: false, // OBRIGATÓRIO para respeitar a div pai
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // --- GRÁFICO 5: FREQUÊNCIA ANUAL (LINHA AZUL COM PREENCHIMENTO) ---
    if ($('#chartAtividadeAno').length) {
        new Chart($('#chartAtividadeAno'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Visitas na Biblioteca',
                    data: [120, 150, 180, 200, 170, 160, 210, 230, 250, 240, 190, 130],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#0d6efd'
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // --- GRÁFICO 6: DIAS DA SEMANA (BARRAS AZUIS) ---
    if ($('#chartDiasSemana').length) {
        new Chart($('#chartDiasSemana'), {
            type: 'bar',
            data: {
                labels: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                datasets: [{
                    label: 'Média de Usuários',
                    data: [15, 85, 90, 80, 95, 110, 60],
                    backgroundColor: '#0d6efd',
                    borderRadius: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9', drawBorder: false }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // --- GRÁFICO 7: HORÁRIOS (LINHA AZUL) ---
    if ($('#chartHorarios').length) {
        new Chart($('#chartHorarios'), {
            type: 'line',
            data: {
                labels: ['08h', '09h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', '19h', '20h', '21h', '22h', '23h'],
                datasets: [{
                    label: 'Usuários Presentes',
                    data: [5, 15, 35, 30, 15, 20, 25, 30, 40, 45, 60, 55, 40, 20, 10, 5],
                    borderColor: '#0d6efd',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#0d6efd',
                    pointBorderWidth: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { intersect: false, mode: 'index' }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#e2e8f0', drawBorder: false },
                        ticks: { display: false }
                    },
                    x: {
                        grid: { color: '#e2e8f0', drawBorder: false },
                        ticks: { maxTicksLimit: 6 }
                    }
                }
            }
        });
    }

});