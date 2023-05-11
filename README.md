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

* Criando migrations
![img_14.png](.github%2Fimg_14.png)

* Criando seeds
![img_15.png](.github%2Fimg_15.png)

* Tela inicial listando os produtos (sem estar logado)
![img.png](.github%2Fimg.png)

* Tela de login
![img_1.png](.github%2Fimg_1.png)

* Tela para se cadastrar.
![img_2.png](.github%2Fimg_2.png)

* Carrinho
  ![img_4.png](.github%2Fimg_4.png)

* Tela inicial após login (visão Admin)
![img_3.png](.github%2Fimg_3.png)

* Lista de produtos
![img_6.png](.github%2Fimg_6.png)

* Detalhe do produto 
![img_5.png](.github%2Fimg_5.png)

* Criação do produto
![img_7.png](.github%2Fimg_7.png)

* Lista de tipo de produto
![img_8.png](.github%2Fimg_8.png)

* Detalhe do tipo de produto
![img_9.png](.github%2Fimg_9.png)

* Criação do tipo deproduto
![img_10.png](.github%2Fimg_10.png)

* Lista de usuário
![img_12.png](.github%2Fimg_12.png)

* Detalhe do usuário
![img_11.png](.github%2Fimg_11.png)

* Criação do usuário
![img_13.png](.github%2Fimg_13.png)

* Lista de compras
![img_16.png](.github%2Fimg_16.png)

* Detalhes da compra
![img_17.png](.github%2Fimg_17.png)

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