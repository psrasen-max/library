
$(document).ready(function () {
    // Opção global para os gráficos não saírem do tamanho definido no CSS
    Chart.defaults.maintainAspectRatio = false;

    // GRÁFICO 1: LINHA 
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
            plugins: {
                legend: {
                    display: false
                }
            } // Escondi legenda para ganhar espaço
        }
    });

    // GRÁFICO 2: PIZZA 
    new Chart($('#chartCategorias'), {
        type: 'doughnut',
        data: {
            labels: ['Aventura', 'Romance', 'Terror', 'Outros'],
            datasets: [{
                data: [45, 25, 15, 10],
                backgroundColor: ['#0d6efd', '#198754', '#dc3545', '#adb5bd']
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 10,
                        font: {
                            size: 10
                        }
                    }
                }
            }
        }
    });

    // GRÁFICO 3: HISTÓRICO DETALHADO (BARRAS)
    const ctxHistorico = $('#chartHistorico');

    new Chart(ctxHistorico, {
        type: 'bar', // O estilo de barras
        data: {
            // Períodos :
            labels: ['Total', '3 Anos', '1 Ano', '6 Meses', '3 Meses', 'Último Mês'],
            datasets: [{
                label: 'Livros Vendidos',
                data: [5000, 3200, 1500, 800, 450, 120], // Dados de exemplo
                backgroundColor: '#6610f2', // O roxo 
                borderRadius: 6, // Cantos arredondados nas barras
                barPercentage: 0.5 // Deixa as barras mais finas e profissionais
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Impede que o gráfico cresça sozinho 
            plugins: {
                legend: {
                    display: false
                } // Remove legenda para ganhar espaço
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#e2e8f0'
                    } // Linhas de grade suaves
                },
                x: {
                    grid: {
                        display: false
                    } // Remove linhas verticais para limpar o visual
                }
            }
        }
    });
});