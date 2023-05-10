<p align="center">
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
  <a href="#-como-rodar">Como rodar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-contribuir">Como contribuir</a>&nbsp;&nbsp;&nbsp;
  </p>
<br>


# Venda com imposto 

Esse projeto foi desenvolvido com as seguintes tecnologias:

- [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
- [PHP](https://www.php.net/) - 8.1.18
- [Postgre](https://www.postgresql.org/) - 12
- [HTML5](https://developer.mozilla.org/pt-BR/docs/Web/HTML/Element) 
- [CSS3](https://developer.mozilla.org/pt-BR/docs/Web/CSS)

## 💻 Projeto

Projeto de uma loja.

![img.png](.github%2Fimg.png)

### Pre-requisitos

- Cadastro dos produtos;
- Cadastro dos tipos de cada produto;
- Cadastro dos valores percentuais de imposto dos tipos de produtos;
- A tela de venda, onde serão informados os produtos e quantidades adquiridas;
- O sistema deve apresentar o valor de cada item multiplicado pela quantidade adquirida e a
quantidade pago de imposto em cada item, um totalizador do valor da compra e um
totalizador do valor dos impostos;
- A venda deverá ser salva;

## 🚀 Como Rodar

- Clone o projeto.
- Entre na past `public` do projeto.
- Crie um banco de dados, eu usei `venda_produto.
- Crie o .env com os dados .env-exemple. Preencha as variáveis.
- Execute no terminal `php -S localhost:8080`.
- Execute no terminal `php migration.php`.
- Execute no terminal`php seeds.php`.
- Se vc estiver usando linux é preciso da permissão na pasta das imagens `sudo chmod -R 777 public/img`.
- Para testar como admin faça o login com o usuario `joao@teste.com` senha `123456`.
- Para testar como usuario comum faça o login com o usuario `antonio@teste.com` senha `123456`.
- Acesse `localhost:8080`.

## 🤔 Como contribuir

- Faça um fork desse repositório;
- Cria uma branch com a sua feature: `git checkout -b minha-feature`;
- Faça commit das suas alterações: `git commit -m 'feat: Minha nova feature'`;
- Faça push para a sua branch: `git push origin minha-feature`.

Depois que o merge da sua pull request for feito, você pode deletar a sua branch.

## 📝 Licença

Esse projeto está sob a licença MIT.