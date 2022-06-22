const url = "http://127.0.0.1:5000/user/";

$('#busca-usuario').submit(function(e){

    e.preventDefault();

   let id = $("#busca-usuario input[name='id']").val();

    $.get(url +  id.trim()).done(function(response){

        console.log(response);
    })
   
})

$('#cadastro-usuario').submit(function(e){

    e.preventDefault();

   let id = $("#cadastro-usuario input[name='id']").val();
   let nome = $("#cadastro-usuario input[name='nome']").val();
   let idade = $("#cadastro-usuario input[name='idade']").val();

    
   $.ajax(url + id.trim(),{
    type: "POST",   
    processData: false,
    data: JSON.stringify({nome:nome, idade:idade}),
    contentType: 'application/json'
    
    
   
  }).done(function(response){

    console.log(response);
  });
   
})

$('#atualiza-usuario').submit(function(e){

    e.preventDefault();

   let id = $("#atualiza-usuario input[name='id']").val();
   let nome = $("#atualiza-usuario input[name='nome']").val();
   let idade = $("#atualiza-usuario input[name='idade']").val();

    
   $.ajax(url + id.trim(),{
    type: "PUT",   
    processData: false,
    data: JSON.stringify({nome:nome, idade:idade}),
    contentType: 'application/json'
    
    
   
  }).done(function(response){

    console.log(response);
  });
   
})

$('#deleta-usuario').submit(function(e){

    e.preventDefault();

   let id = $("#deleta-usuario input[name='id']").val();
   

    
   $.ajax(url + id.trim(),{
    type: "DELETE",   
    processData: false,    
    contentType: 'application/json'
    
    
   
  }).done(function(response){

    console.log(response);
  });
   
})