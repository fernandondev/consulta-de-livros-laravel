# consulta-de-livros-laravel
Essa aplicação web foi desenvolvida com o propósito de permitir buscas de livros, fazendo integração com a api da google

<h1 align="center" id="title">Consulta de livros laravel</h1>

<p id="description">Essa aplicação web foi desenvolvida com o propósito de permitir buscas de livros fazendo integração com a api da google Books Api. A api foi estruturada seguindo os princípios SOLID da programação orientada a objetos, aplicando inversão de dependência, utilização de interfaces, etc.</p>

  <h2> Especificações da api</h2>

*   <p><strong>Arquitetura de software: </strong></p> Layers <p>Layers</p>
    <img src="prints\esquemas.png" alt="Logo" width="1000" height="800">
*   Blade
  
<h2>💻 Feito em</h2>

*   Laravel
*   Blade


  <h2>Páginas</h2>
  <br>
  <br>

<h4>*Login</h4>
  <ul>
    <li><h5>PATH '/paginaLogin'</h56></li>
    <li><p>O usuário deverá preencher o email e senha e clicar em logar, para se autenticar</p></li>
  </ul>
  <br>
   <img src="prints\projeto-livro-login.png" alt="Logo" width="1000" height="800">
   <br>
  <br>
  <br>
  <br>


  <h4>*Login validação input</h4>
  <ul>
    <li><h5>PATH '/paginaLogin'</h56></li>
  <br>
   <img src="prints\projeto-livro-login-validacao.png" alt="Logo" width="1000" height="800">
   <br>
  <br>
  <br>
  <br>



  <h4>*Cadastro</h4>
  <ul>
    <li><h5>PATH '/paginaCadastro'</h56></li>
    <li><p>Nessa tela, o usuário preencherá o nome, email e senha para se cadastrar no sistema</p></li>

  </ul>
  <br>
   <img src="prints\projeto-livro-cadastro.png" alt="Logo" width="1000" height="800">
   <br>
  <br>
  <br>
  <br>


  <h4>*Cadastro validação input</h4>
  <ul>
    <li><h5>PATH '/paginaCadastro'</h56></li>
  </ul>
  <br>
   <img src="prints\projeto-livro-cadastro-validacao.png" alt="Logo" width="1000" height="800">
   <br>
  <br>
  <br>
  <br>


  
  
  <h4>*Ao logar:</h4>
  <ul>
    <li><h5>PATH '/'</h56></li>
    <li><p>Nessa tela, deverá ser preenchido o input 'Pesquisar livro' e clicar em 'Pesquisar'</p></li>
    <li><p>Após isso, o backend fará uma requisição para o Google api, que retornará os dados</p></li>
    <li><p>O sistema tratará os dados e exibirá 40 livros correspondentes à chave da pesquisa em diversos cards</p></li>
  </ul>
  <br>
   <img src="prints\projeto-livro-tela-inicial.png" alt="Logo" width="1000" height="800">
   <br>
  <br>
  <br>
  <br>
  <h4>*Após pesquisar o livro:</h4>
  <ul>
    <li><h5>PATH '/livro'</h56></li>
    <li><p>Os livros serão listados em formatos de card, contendo foto, título e nome do autor </p></li>
    <li><p>Há ainda o botão 'Detalhes' e 'Preview</p></li>
  </ul>
  <br>
   <img src="prints\projeto-livro-livros.png" alt="Logo" width="1000" height="800">
  <br>
  <br>
  <br>
  <h4>*Ao clicar em detalhes:</h4>
  <ul>
    <li><p>Abre-se um modal contendo a descrição, foto, autor, data de publicação e editora do livro selecionado</p></li>
  </ul>
  <br>
   <img src="prints\projeto-livro-detalhes.png" alt="Logo" width="1000" height="800">
  <br>
  <br>
  <br>
  <h4>*Ao clicar em preview:</h4>
  <ul>
    <li><p>Há um redirecionamento para a página da google contendo uma preview de algumas páginas do livro</p></li>
  </ul>
    <br>
   <img src="prints\projeto-livro-preview.png" alt="Logo" width="1000" height="800">
  <br>
  <br>
  <br>
   <h4>*Responsividade: </h4>
    <br>
   <img src="prints\projeto-livro-responsividade.png" alt="Logo" width="400" height="700">

  
