# Import o Flask, render template e todos os módulos necessários
from flask import Flask, render_template, request, redirect, url_for
import sqlite3

# Criar uma instância da aplicação Flask
app = Flask(__name__)

# Fazer uma conexão com o banco de dados SQLite
# Está função será usada para conectar ao banco de dados
def conectar_banco():
    conn = sqlite3.connect('banco.db') # Cria o arquivo 'banco.db'
    return conn

def criar_tabela():
    conn = conectar_banco()
    cursor = conn.cursor()
    # Criar a tabela 'contatos' com as colunas necessárias
    cursor.execute('''
    CREATE TABLE IF NOT EXISTS contatos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL,
        mensagem TEXT NOT NULL,
        tema TEXT NOT NULL
        )
        ''')
    conn.commit()
    conn.close()

# Rota para processar o formulário e salvar os dados no banco de dados
@app.route('/contato', methods=['POST'])
def contato():
    # Coletar os dados do formulário
    nome = request.form['nome']
    email = request.form['email']
    mensagem = request.form['mensagem']
    tema = request.form.get('tema')

    # Conectar ao banco de dados e inserir os dados informados
    conn = conectar_banco()
    cursor = conn.cursor()
    cursor.execute('''
    INSERT INTO contatos (nome, email, mensagem, tema)
    VALUES (?, ?, ?, ?)''', (nome, email, mensagem, tema))
    conn.commit()
    conn.close()

    # Redirecionar para a página de resultado
    return redirect(url_for('resultado'))

# Rota para exibir os dados inseridos no banco
@app.route('/resultado')
def resultado():
    # Conectar ao banco de dados e buscar os dados
    conn = conectar_banco()
    cursor = conn.cursor()
    cursor.execute('SELECT nome, email, mensagem, tema FROM contatos')
    dados = cursor.fetchall() # Pega todos os dados da tabela 'contatos'
    conn.close()

    # Renderizar a página de resultado com os dados
    return render_template('resultado.html', contatos=dados)

if __name__ == 'main':
    criar_tabela() # Chama a função para criar a tabela, se ela não existir
    app.run(debug=True)