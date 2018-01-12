#Sistema Clinica Martin


Sistema desenvolvido para realização de consultas médicas

Foi utilizado uma estrutura MVC basica e o padrão orientado a objetos 
para criação das classes/modelos.

Para realização do sistema ser assincrono e dinâmico ao usuario,
foi utilizado AJax da biblioteca do jquery.

Definição do layout foi utilizado apenas css3 e html5.



#Utilizades do projeto:

Cadastrar/Login de pacientes.

Cadastrar/Login de Medicos.

Cadastrar Consultas Médicas.

Retorna lista de médicos por categoria

Possibilita o usuario marcar uma consulta 

Um modelo apenas para realizar verificações dos dados inseridos.

O medico pode visualizar as consultas pendentes a ele e suas datas

Um usuario não pode marcar uma consulta no mesmo dia que outro usuario

Foi criado um evento dentro do banco de dados
que deleta diariamente todas consultas que já venceram a data.

O usuario (paciente/medico) pode deletar ele mesmo do banco de dados



#Tecnologias Utilizadas:

PDO
PHP 5
Biblioteca Jquery
HTML 5
Javascript
AJAX
CSS3
Mysql

#Segurança do sistema


Para proteger o sistema contra sqlinjections 
foi utilizado o bindParam do proprio PDO para proteção.

#Configurações

Dados para configurar o banco de dados se encontram em /models/config.inc

Paciente cadastro dados de acesso:

E-mail paciente@gmail.com Senha: 123

E-mail medico@gmail.com Senha: 123

Base de dados na pasta raiz do projeto

#Considerações finais

Agradeço a oportunidade que me foi dada pela equipe facil consulta de realizar
esse projeto.Um grande abraço a todos.

Sobre os commits, foi por falta de atenção e não commitei todo processo de desenvolvimento do sistema,
se for preciso tenho os logs gerados pela ide desde a estruturação do modelo MVC a criação das classes
para verificação de autenticidade do código.
Qualquer duvida/sugestão/problema me contatem pelo meu e-mail viniciusgulartemartin@gmail.com
