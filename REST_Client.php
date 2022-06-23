<?php

    error_reporting(0);
    
    if(isset($_POST['tipo']))
    {   
        $curl = curl_init();    

        $url = "http://127.0.0.1:5000/user/";
       
       
        switch($_POST['tipo'])
        {
            case 'get':                
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url .  $_POST['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => "",
                    ]);

                
                   
                
                break;

            case 'post':
                curl_setopt_array($curl, [
                    CURLOPT_PORT => "5000",
                    CURLOPT_URL => $url . $_POST['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n\t\"nome\": \"{$_POST['nome']}\",\n\t\"idade\": \"{$_POST['idade']}\"\n}",
                    CURLOPT_HTTPHEADER => [
                      "Content-Type: application/json"
                    ],
                  ]);

                  break;

            case 'put':
                curl_setopt_array($curl, [
                    CURLOPT_PORT => "5000",
                    CURLOPT_URL => $url . $_POST['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "PUT",
                    CURLOPT_POSTFIELDS => "{\n\t\"nome\": \"{$_POST['nome']}\",\n\t\"idade\": \"{$_POST['idade']}\"\n}",
                    CURLOPT_HTTPHEADER => [
                      "Content-Type: application/json"
                    ],
                  ]);

                  break;

            case 'delete':
                curl_setopt_array($curl, [
                    CURLOPT_PORT => "5000",
                    CURLOPT_URL => $url . $_POST['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "DELETE",
                    CURLOPT_POSTFIELDS => "",
                  ]);

                break;

            case 'valida':
                curl_setopt_array($curl, [
                    CURLOPT_PORT => "5000",
                    CURLOPT_URL => "http://127.0.0.1:5000/validaCPF/" . $_POST['cpf'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => "",
                  ]);

            
        }

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

      

       



    }
?>
<h1>REST - PHP</h1>
<div id="botoes">
    <button id="buscar">Buscar Usuário</button>
    <br>
    <button id="cadastrar">Cadastrar Usuário</button>
    <br>
    <button id="atualizar">Atualizar Usuário</button>
    <br>
    <button id="deletar">Deletar Usuário</button>
    <br>
    <button id="validar">Validar CPF</button>
</div>
<div id="busca">
    <form action="REST_Client.php" method="POST" id="busca-usuario">
        <input type="hidden" name="tipo" value="get">
        <label>Id:</label>
        <input name="id" type="text">        
        <button type="submit">Enviar</button>
    </form>
</div>
<div id="cadastro">
    <form action="REST_Client.php" method="POST" id="cadastro-usuario">
        <input type="hidden" name="tipo" value="post">
        <label>Id:</label>
        <input name="id" type="text">
        <label>Nome:</label>
        <input name="nome" type="text">
        <label>Idade:</label>
        <input name="idade" type="text">
        <button type="submit">Enviar</button>
    </form>
</div>
<div id="atualiza">
    <form action="REST_Client.php" method="POST" id="atualiza-usuario">
        <input type="hidden" name="tipo" value="put">
        <label>Id:</label>
        <input name="id" type="text">
        <label>Nome:</label>
        <input name="nome" type="text">
        <label>Idade:</label>
        <input name="idade" type="text">
        <button type="submit">Enviar</button>
    </form>
</div>
<div id="deleta">
    <form action="REST_Client.php" method="POST" id="deleta-usuario">
        <input type="hidden" name="tipo" value="delete">
        <label>Id:</label>
        <input name="id" type="text">        
        <button type="submit">Enviar</button>
    </form>
</div>
<div id="valida">
    <form action="REST_Client.php" method="POST" id="valida-cpf">
        <input type="hidden" name="tipo" value="valida">
        <label>CPF:</label>
        <input maxlength="11" minlength="11" name="cpf" type="text">        
        <button type="submit">Enviar</button>
    </form>
</div>


<script src="jquery-3.6.0.min.js"></script>
<script>

    $('#busca').hide();
    $('#cadastro').hide();
    $('#atualiza').hide();
    $('#deleta').hide();
    $('#valida').hide();

    $(document).ready(function(e){


        $('#buscar').click(function(){
            
            $('#botoes').hide();
            $('#busca').show();
        })

        $('#cadastrar').click(function(){
            
            $('#botoes').hide();
            $('#cadastro').show();
        })

        $('#atualizar').click(function(){
            
            $('#botoes').hide();
            $('#atualiza').show();
        })

        $('#deletar').click(function(){
            
            $('#botoes').hide();
            $('#deleta').show();
        })

        $('#validar').click(function(){
            
            $('#botoes').hide();
            $('#valida').show();
        })
    })
</script>