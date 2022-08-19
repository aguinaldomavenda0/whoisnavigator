# Who is navigator
Conhecer quem são os seus utilizadores é importante para garantir uma boa experiência no seu webSite. Por isso achei interessante testar os meus conhecimentos e desenvolver uma class **PHP** para facilitar a identificação de navegadores, nesse momento, é possivel identificar os 6 navegadores, é um código aberto e todas sugestões são bem vindas.

<img src="https://github.com/aguinaldomavenda0/whoisnavigator/blob/9d1f298bd2cad26fc6f52b86ab10d47d9dd09b94/apresentation/whoisnavigator1.png"/>

### Como Usar ?
Simples importe a class **Navigator** no seu código **PHP**, criar a sua instância e chamar a função __whoisnavigator__ passando como parâmetro o useragent do php.

```
$agent = $_SERVER['HTTP_USER_AGENT'];
(new Navigator)->whoisnavigator($agent)
```
<img src="https://github.com/aguinaldomavenda0/whoisnavigator/blob/9d1f298bd2cad26fc6f52b86ab10d47d9dd09b94/apresentation/whoisnavigator2.png"/>


### O Resultado: 
A função **whoisnavigator** retorna um objecto com os seguintes atributos versão do produto de desenvolvimento, nome do navegador e a plataforma do dispositivo.x   
<img src="https://github.com/aguinaldomavenda0/whoisnavigator/blob/9d1f298bd2cad26fc6f52b86ab10d47d9dd09b94/apresentation/reponse_json.PNG"/>

[Caso deseja ver o resultado](http://mavendeveloper.my-style.in/navigator/navigator.php)


