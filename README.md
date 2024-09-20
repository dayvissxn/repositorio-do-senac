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