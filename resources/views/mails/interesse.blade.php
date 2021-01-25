<html>
    <head>
        <style type="text/css">
        body{
    display:flex!important;
    flex-direction: column!important;
    justify-content: center!important;
    color: #2A5799 !important;
}
h1{
    text-align: center!important;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif!important;
    font-weight: bold!important;
    font-size: 35pt!important;
}
h3{
    text-align: center !important;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
}
p{
    text-align: center !important;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
}
.imagem1{
    width:40vw !important;
    align-self: center !important;
}

.imagem2{
    width: 40vw !important;
    align-self: center !important;
}

@media screen and (max-width: 500px){
    h1{
        font-size:20px!important ;
    }
}
        </style>
    </head>
    <body>
    <h1>Estou interessado em um carro da sua loja.</h1>
    <h1>{{$veiculo[0]['marca'] . $veiculo[0]['modelo']}}</h1>
    <img class="imagem1" src="{{$veiculo[0]['imagens'][0]['path']}}">
    <h3>{{$cliente}}</h3>
    <p>{{$telefone}}</p>
    <p>{{$email}}}</p>
    <img class="imagem2" src="http://gustacar.com.br/imagens/wySAnzyY4NOn8xAziF118YB1pKwgBscEtFDUqIKK.png">
    <p>fiat Uno 1.3 /2010 Gasolina</p>
    </body>
</html>
