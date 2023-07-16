# consulta-de-livros-laravel
Essa aplicação web foi desenvolvida com o propósito de permitir buscas de livros, fazendo integração com a api da google
Logo
Todo list App
Logo
Projeto de estudo de flutter em andamento...


Conteudos aqui!


Sobre o projeto
Logo

Ainda novo na area de criação de aplicativos, porem com muito interesse em conhecer melhor a area de desenvolvimento mobile, realizei este meu primeiro aplicativo.

Decidi fazer um aplicativo para listar tafares, mesmo sendo uma ideia simples, me empenhei em faze-lo da melhor forma dentro dos meus recentes conhecimentos em desenvolvimento mobile que adquiri no curso 'Academia do Flutter ' com o professor Rodrigo Rahman.


Detalhes do app:

Login com o Google já identificando sua foto de perfil e seu nome.
Lista de taferes são organizadas por datas.
Filtro de mostrar ou não tarefas concluidas.
Visual/Design do app bonito e charmoso feito por mim 😄
Barra de progresso das Task.
(back to top)

Tecnologias usadas
Este aplicativo foi realizado em Flutter, utilizando Provider e SQLite em arquiterura de módulos.

Para a autenticação foi utilizado o Firebase

Dart
Flutter
Firebase
SQLite
(back to top)

Demonstração
Confira os screenShots das telas do applicativos e suas funcionalidades.


Tela de login
login
Na tela de login foi implementando o botão de ' Continue com o Google ' , com opção tambem de se cadastrar e caso tenha esquecido a senha possui o ' Esqueceu sua senha? ' que quando clicado é enviado instruçoes para redefinir senha para email inserido

(back to top)




Tela de cadastro
register
Tela simples para cadastro, contendo a validação do formato de email valido e senha de no minimo 6 caracteres.

(back to top)




Home Page
Logo
Na home page há os seguintes filtros :

HOJE : filtro que seleciona as tasks marcadas para o dia presente.
AMANHÃ : filtro que seleciona as tasks marcadas um dia depois do dia presente.
SEMANA : neste filtro mostra todas as tasks da semana, e quando selecionado este filtro, é mostrado na tela um seletor de dias da semana para o usuario filtrar o dia especifico da semana(como mostra o print a seguir):
Logo

Contém tambem na home page na area direita superior do aplicativo, um icone de filtro, que quando clicado é alterna entre mostrar ou nao as tarefas concluidas. E tambem um botão circular na area direita inferior para cadastrar novas tasks.

(back to top)




Menu Lateral
Logo
Menu lateral simples onde é mostrado um card com seu nome e sua foto de perfil do gmail ( caso tenha logado com o google )

Contem tambem função no menu lateral, a opção de alterar o nome, e a opção de Sair do App.
