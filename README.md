# dito-teste

Para rodar esse projeto, deve ser utilizado Docker, com docker-composer.

Para rodar deve-se utilizar o comando:
  - docker-compose up

Acessar via http://localhost:8080/dito-autocomplete/ para testar o autocomplete.

Para gerar eventos aleatórios de teste acessar a a url http://localhost:8080/dito-autocomplete/gera-evento.html

## Configurando projeto no kubernetes via Google Cloud Services

### Pré requisitos

  - Ter o gcloud instalado
  - Ter o kubectl instalado

### Configurando

  - Primeiro para facilitar devemos adicionar o nosso id do projeto e a zona onde o cluster será criado.

    gcloud config set project <PROJECT_ID>  
    gcloud config set compute/zone us-central1-b

  - Criar um cluster para o projeto (Com três nodes)

    gcloud container clusters create dito-teste --num-nodes=3

  - Comandos para listar os clusters criados e verificar detalhes de um cluster

    gcloud container clusters list  
    gcloud container clusters describe dito-teste

  - Primeiro iremos criar o Deployment e o Service do mongodb (execute o próximo comando dentro da pasta kubernetes do projeto)

    kubectl create -f mongodb-deployment.yml

  - Agora iremos criar o Deployment e o Service da nossa api (execute o próximo comando dentro da pasta kubernetes do projeto)

    kubectl create -f api-deployment.yml  
    kubectl get pods  
    kubectl exec -it <POD_NAME> -c dito-api /bin/sh  
    php artisan migrate  
    exit

  - Agora iremos criar o Deployment e o Service do nosso web (autocomplete) (execute o próximo comando dentro da pasta kubernetes do projeto)

    kubectl create -f autocomplete-deployment.yml

### Comandos úteis

  - kubectl get pods
  - kubectl logs -f <POD_NAME>
  - kubectl get service <SERVICE_NAME>
  - kubectl proxy

### Retirando o projeto do ar para evitar custos, pois esse é apenas um projeto de teste

  - kubectl delete service <SERVICE_NAME>
  - Aguarde a exclusão observando pelo comando gcloud compute forwarding-rules list
  - gcloud container clusters delete dito-teste
