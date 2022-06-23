package main

import (
	"fmt"
    "strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "http://127.0.0.1:5000/user/"

    fmt.Println("Função BUSCAR USUÁRIO:")
	getUsuario(url)

    fmt.Println("Função CADASTRAR USUÁRIO: ")
    cadastraUsuario(url)

    fmt.Println("Função ATUALIZAR USUÁRIO: ")
    atualizaUsuario(url)

    fmt.Println("Função DELETAR USUÁRIO: ")
    deletaUsuario(url)

    fmt.Println("Função VALIDA CPF")
    validaCPF()


}

func getUsuario(url string) {

    var id string

    fmt.Print("id:")
    fmt.Scanln(&id)
    req, _ := http.NewRequest("GET", url + id, nil)

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))
}

func cadastraUsuario(url string){

    var id string
    var nome string
    var idade string

    fmt.Print("id:")
    fmt.Scanln(&id)

    fmt.Print("nome:")
    fmt.Scanln(&nome)

    fmt.Print("idade:")
    fmt.Scanln(&idade)

    payload := strings.NewReader("{\n\t\"nome\": \"" + nome + "\",\n\t\"idade\": \"" + idade + "\"\n}")

	req, _ := http.NewRequest("POST", url + id, payload)

	req.Header.Add("Content-Type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))


}

func atualizaUsuario(url string){
    var id string
    var nome string
    var idade string

    fmt.Print("id:")
    fmt.Scanln(&id)

    fmt.Print("nome:")
    fmt.Scanln(&nome)

    fmt.Print("idade:")
    fmt.Scanln(&idade)

    payload := strings.NewReader("{\n\t\"nome\": \"" + nome + "\",\n\t\"idade\": \"" + idade + "\"\n}")

	req, _ := http.NewRequest("PUT", url + id, payload)

	req.Header.Add("Content-Type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}

func deletaUsuario(url string){

    var id string

    fmt.Print("id:")
    fmt.Scanln(&id)
    req, _ := http.NewRequest("DELETE", url + id, nil)

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))
}

func validaCPF(){

    var cpf string

    fmt.Print("cpf:")
    fmt.Scanln(&cpf)
    req, _ := http.NewRequest("GET","http://127.0.0.1:5000/validaCPF/"+ cpf, nil)

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))
}