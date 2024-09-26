# repositorio-do-senac
Repositório para depositar códigos das aulas referente a programação web!

1. Configuração Inicial

- git config --global user.name "Seu Nome"
Define o nome do usuário para todos os repositórios locais.

- git config --global user.email "seuemail@example.com"
Define o e-mail do usuário.

2. Comandos de Inicialização

- git init
Inicializa um novo repositório Git em um diretório.

- git clone <url>
Clona um repositório existente do GitHub para o seu computador.

3. Controle de Versão

- git status
Exibe o estado atual do repositório (arquivos modificados, prontos para commit, etc.).

- git add <arquivo>
Adiciona um arquivo específico ao staging area (preparação para commit).

- git add .
Adiciona todos os arquivos modificados ao staging area.

- git commit -m "mensagem do commit"
Realiza um commit com uma mensagem explicativa.

- git commit -am "mensagem do commit"
Adiciona e faz commit de todos os arquivos modificados e monitorados de uma só vez.

4. Sincronização com Repositórios Remotos

- git remote add origin <url>
Vincula o repositório local a um repositório remoto (geralmente no GitHub).

- git push origin master
Envia os commits locais para o repositório remoto (neste caso, a branch master).

- git pull origin master
Puxa atualizações do repositório remoto e as mescla com o código local.

5. Branching e Fusão (Merge)

- git branch
Lista todas as branches no repositório.

- git branch <nome-da-branch>
Cria uma nova branch.

- git checkout <nome-da-branch>
Muda para uma branch existente.

- git checkout -b <nome-da-branch>
Cria e muda para uma nova branch.

- git merge <nome-da-branch>
Mescla outra branch na branch atual.

6. Histórico e Reversão

- git log
Exibe o histórico de commits.

- git diff
Mostra as diferenças entre os arquivos no diretório de trabalho e o último commit.

- git reset --hard <commit>
Reverte para um commit específico, descartando as alterações posteriores.

7. Colaboração

- git fetch
Baixa o conteúdo de um repositório remoto sem fazer merge.

- git rebase <branch>
Aplica os commits de uma branch sobre outra para manter um histórico linear.

- git stash
Armazena temporariamente as modificações locais para limpar a área de trabalho sem fazer commit.

<!--  -->
<!-- Comandos HTML -->
<!--  -->

1. Tags de Estrutura

<!DOCTYPE html>: Define o tipo de documento.
<html>: Tag raiz do documento HTML.
<head>: Contém metadados (não visíveis ao usuário), como título e links para estilos.
<title>: Define o título da página (aparece na aba do navegador).
<meta>: Define metadados, como charset e viewport.
<link>: Vincula arquivos externos, como CSS.
<style>: Inclui CSS diretamente no HTML.
<body>: Contém o conteúdo visível da página.
<header>: Define o cabeçalho da página.
<footer>: Define o rodapé da página.
<nav>: Define a área de navegação.
<section>: Define uma seção de conteúdo.

2. Formatação de Texto

<h1>, <h2>, <h3>, <h4>, <h5>, <h6>: Cabeçalhos de diferentes níveis (do maior ao menor).
<p>: Define um parágrafo.
<br>: Quebra de linha.
<hr>: Linha horizontal para separar conteúdo.
<strong>: Texto em negrito (ou forte semântico).
<em>: Texto em itálico (ênfase).
<b>: Negrito (visual, sem significado semântico).
<i>: Itálico (visual, sem significado semântico).
<mark>: Realça o texto (background amarelo).
<small>: Define texto menor.
<blockquote>: Citação em bloco.
<pre>: Define texto pré-formatado (mantém espaços e quebras de linha).

3. Criação de Links

<a href="URL">Texto do link</a>: Cria um link. O atributo href define o destino do link.
Exemplo: <a href="https://www.example.com">Visite o site</a>

4. Imagens

<img src="URL" alt="Descrição da imagem">: Insere uma imagem.
src: Define o caminho da imagem.
alt: Texto alternativo que descreve a imagem para acessibilidade.

5. Listas

Lista ordenada:
<ol>: Cria uma lista ordenada (numerada).
<li>: Item de lista.

Lista não ordenada:

<ul>: Cria uma lista não ordenada (com marcadores).
<li>: Item de lista.


6. Tabelas
<table>: Define uma tabela.
<tr>: Define uma linha na tabela.
<th>: Define uma célula de cabeçalho (em negrito e centralizada).
<td>: Define uma célula normal.
<caption>: Adiciona um título à tabela.


7. Formulários

<form>: Cria um formulário.
Atributos: action (URL de envio), method (método de envio: GET ou POST).
<input>: Campo de entrada. Tipos comuns:
text: Entrada de texto.
password: Entrada de senha.
email: Entrada de e-mail.
submit: Botão de envio.
radio: Botão de opção.
checkbox: Caixa de seleção.
<textarea>: Área de texto multilinhas.
<button>: Botão clicável.
<label>: Rótulo para os campos de formulário.


8. Outras Tags Úteis

<div>: Container de bloco, usado para agrupar elementos.
<span>: Container em linha, usado para agrupar texto ou outros elementos em linha.
<iframe src="URL">: Insere um conteúdo externo, como um vídeo do YouTube.
<video>: Insere um vídeo.
<audio>: Insere um áudio.
<script>: Adiciona código JavaScript.
<noscript>: Define conteúdo que será mostrado se o JavaScript estiver desativado.