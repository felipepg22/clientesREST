import requests
base_url = "http://localhost:5000/user/%s"
while True:
    operacao = input("Escolha uma operação (GET, POST, PUT, DELETE, SAIR): ")
    if operacao.upper() == "GET":
        print(">>> GET <<<")
        id = input("Id: ")
        response = requests.get(base_url % id)
        print(response.json())
        print("HTTP Code: %s" % response.status_code)
    elif operacao.upper() == "POST":
        print(">>> POST <<<")
        id = input("Id: ")
        nome = input("Nome: ")
        idade = input("Idade: ")
        payload = {'nome':nome, 'idade':idade}
        response = requests.post(base_url % id, json=payload)
        print(response.json())
        print("HTTP Code: %s" % response.status_code)
    elif operacao.upper() == "PUT":
        print(">>> PUT <<<")
        id = input("Id: ")
        nome = input("Nome: ")
        idade = input("Idade: ")
        payload = {'nome': nome, 'idade': idade}
        response = requests.put(base_url % id, json=payload)
        print(response.json())
        print("HTTP Code: %s" % response.status_code)
    elif operacao.upper() == "DELETE":
        print(">>> DELETE <<<")
        id = input("Id: ")
        response = requests.delete(base_url % id)
        print(response.json())
        print("HTTP Code: %s" % response.status_code)
    else:
        print(">>> SAIR <<<")
    break

