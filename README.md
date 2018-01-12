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





#Tecnologias Utilizadas:

PDO
PHP 5
Biblioteca Jquery
HTML 5
Javascript
AJAX
CSS3


#Segurança do sistema


Para proteger o sistema contra sqlinjections 
foi utilizado o bindParam do proprio PDO para proteção.