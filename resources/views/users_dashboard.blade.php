@extends('layouts.app')

@section('title', 'Gestão de Usuários - Livraria')

@section('content')
    <main class="main-content">
        <header class="mb-3 d-flex justify-content-between ">
            <h2 class="h4 m-0 fw-bold">Gestão de Usuários</h2>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-person-plus me-2"></i>Novo Usuário</button>
                <button class="btn btn-primary btn-sm"><i class="bi bi-printer me-2"></i>Relatório Geral</button>
            </div>
        </header>

        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-2 mb-3"> {{-- Cards de Informações --}}
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Total Registrados</span>
                        <h4 class="fw-bold text-primary m-0">1.250</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Presentes Agora</span>
                        <h4 class="fw-bold text-success m-0">34</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Devoluções Atrasadas</span>
                        <h4 class="fw-bold text-danger m-0">18</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Taxa de Atividade</span>
                        <h4 class="fw-bold text-info m-0">72%</h4>
                    </div>
                </div>
            </div>
        </div>

         <div class="row g-3 mb-3"> {{-- Gráfico NOVOS CADASTROS E TABELA TOP USUÁRIOS --}}

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header bg-white py-2">
                        <h6 class="m-0 fw-bold small text-uppercase text-secondary">Novos Cadastros
                        </h6>
                    </div>
                    <div class="card-body">
                        <div style="position: relative; height: 220px; width: 100%;">
                            <canvas id="chartCadastros"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header bg-white py-2">
                        <h6 class="m-0 fw-bold small text-uppercase text-secondary">Top Usuários</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="bi bi-cart-check text-primary me-2"></i>Maior Comprador</div>
                                <span class="fw-bold">João Silva</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="bi bi-book text-success me-2"></i>Maior Locador</div>
                                <span class="fw-bold">Maria Souza</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="bi bi-geo-alt text-warning me-2"></i>Mais Frequente</div>
                                <span class="fw-bold">Carlos Lima</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4"> {{-- Gráfico FREQUÊNCIA ANUAL (VISITAS), DIAS MAIS MOVIMENTADOS E HORÁRIOS DE PICO--}}

            <div class="col-md-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="card-title text-muted fw-bold mb-3">FREQUÊNCIA ANUAL (VISITAS)</h6>
                        <div style="height: 300px;">
                            <canvas id="chartAtividadeAno"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="card-title text-muted fw-bold mb-2">DIAS MAIS MOVIMENTADOS</h6>
                        <div style="height: 200px;">
                            <canvas id="chartDiasSemana"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted fw-bold mb-2">HORÁRIOS DE PICO (08H - 23H)</h6>
                        <div style="height: 200px;">
                            <canvas id="chartHorarios"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold small text-uppercase text-secondary text-danger"><i
                        class="bi bi-exclamation-triangle me-2"></i>Atrasos Críticos (Mais Antigos Primeiro)</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr class="small text-uppercase">
                                <th class="ps-3 py-2">Usuário</th>
                                <th>Contato</th>
                                <th>Livro</th>
                                <th>Data Esperada</th>
                                <th>Dias de Atraso</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <tr>
                                <td class="ps-3 fw-bold">Ana Oliveira</td>
                                <td>(11) 98888-8888</td>
                                <td>O Alquimista</td>
                                <td class="text-danger fw-bold">10/01/2026</td>
                                <td><span class="badge bg-danger">12 dias</span></td>
                                <td>
                                    <button class="btn btn-sm py-0 btn-outline-danger border"><i
                                            class="bi bi-telephone"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection