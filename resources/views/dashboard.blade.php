@extends('layouts.app')

@section('content')
    <main class="main-content">
        <header class="mb-3 d-flex justify-content-between align-items-center">
            <h2 class="h4 text-dark m-0 fw-bold">Dashboard Geral</h2>
            <button class="btn btn-primary btn-sm"><i class="bi bi-download me-2"></i>Exportar</button>
        </header>

        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5 g-2 mb-3">
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Vendas</span>
                        <h4 class="fw-bold text-primary m-0">R$ 45.200,00</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Acervo</span>
                        <h4 class="fw-bold text-success m-0">7777</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Esgotados</span>
                        <h4 class="fw-bold text-danger m-0">120</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Reservados</span>
                        <h4 class="fw-bold text-info m-0">45</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-2">
                        <span class="text-muted small fw-bold text-uppercase">Alugados</span>
                        <h4 class="fw-bold text-warning m-0">12</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 fw-bold small text-uppercase text-secondary">Evolução de Vendas</h6>
                        <select class="form-select form-select-sm w-auto border-0 bg-light py-0">
                            <option>Anual</option>
                            <option>Semestral</option>
                            <option>Mensal</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div style="position: relative; height: 180px; width: 100%;">
                            <canvas id="chartVendasTempo"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-2">
                        <h6 class="m-0 fw-bold small text-uppercase text-secondary">Por Categorias</h6>
                    </div>
                    <div class="card-body">
                        <div style="position: relative; height: 180px; width: 100%;">
                            <canvas id="chartCategorias"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 fw-bold small text-uppercase text-secondary">Histórico de Vendas por Período
                        </h6>
                        <span class="badge bg-light text-dark border">Geral</span>
                    </div>
                    <div class="card-body">
                        <div style="position: relative; height: 150px; width: 100%;">
                            <canvas id="chartHistorico"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-2">
                <h6 class="m-0 fw-bold small text-uppercase text-secondary">Livros Mais Vendidos</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr class="small text-uppercase">
                                <th class="ps-3 py-2">#</th>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="ps-3 fw-bold text-muted">{{ $i }}</td>
                                    <td class="fw-bold">Luz e Trevas</td>
                                    <td><span class="badge bg-light text-dark border">Clássico</span></td>
                                    <td>R$ 49,90</td>
                                    <td><span class="badge bg-success opacity-75">Disponível</span></td>
                                    <td>
                                        <button class="btn btn-sm py-0 btn-light text-primary border"><i
                                                class="bi bi-pencil small"></i></button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
