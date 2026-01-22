<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Alugados</th>
                    <th scope="col">Vendidos</th>
                    <th scope="col">Reservados</th>
                </tr>
            </thead>
            <tbody>
                @for ($k = 1; $k <= 15; $k++)
                    <tr>
                        <th scope="row">{{ $k }}</th>
                        <td>{{ $v['Titulo'] }} - {{ $k }}</td>
                        <td>{{ $v['Estoque'] }} - {{ $k }}</td>
                        <td>{{ $v['Alugados'] }} - {{ $k }}</td>
                        <td>{{ $v['Vendidos'] }} - {{ $k }}</td>
                        <td>{{ $v['Reservados'] }} - {{ $k }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
