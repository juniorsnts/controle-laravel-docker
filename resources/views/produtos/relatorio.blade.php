<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 12px;
        }
        .formatting {
			background-color: lightgray;
        }
        h3 {
            text-align: center;
        }
        table {
            width: 100%;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Relatorio de entradas</h3>
    <table>
        <thead class="formatting">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Produto</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
                <th scope="col">Estoque</th>
                <th scope="col">Data de validade</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $produtos as $p )
                <tr>
                    <th scope="row">{{ $p->id }}</th>
                    <td>{{ $p->nome_produto }}</td>
                    <td>{{ $p->categoria->nome }}</td>
                    <td>R$ {{ $p->valor }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>{{ $p->data_validade }}</td>
                    <td>R$ {{ floatVal($p->totalValor(floatVal($p->valor), $p->quantidade)) }}</td>
                </tr>                        
            @endforeach
        </tbody>
    </table>
</body>
</html>