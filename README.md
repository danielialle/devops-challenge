# daniel-info

### Instalação do Servidor!
​
  - Ao Criar o servidor EC2 deve atualizar e instalar os seguintes pacotes:
     - sudo su (entrar com superusuário)
     - yum update (atualizar pacotes).
     - yum install httpd24 (apache) fazer o service httpd start e confirmar se o apache esta executando no browser com o endereço do servidor AWS.
     - yum install php70 (php) testar uma pagina com codigo em php e salvar index.php na pasta /var/www/html e testar o php.
 
 ### Instalação do RDS Mysql 5.7! 
​
  - Criar um RDS Mysql versão 5.7 com acesso apenas a rede interna amazon na porta 3306, informar nome do banco, usuario e senha do banco.
     
  ### Configurar o acesso Mysql e criar Databade para o Wordpress!  
​
  - No servidor EC2 apache instalar o mysql:
     - yum install mysql.
     - Conectar no servidor RDS através do comando: mysql -h database-1.cndqlf2jwce3.us-east-2.rds.amazonaws.com -P 3306 -u admin -p.
     - Informar a senha do Banco.
     - Criar um database no mysql: create database caseinfo. (no exemplo foi criado a base caseinfo)
     
  ### Instalar o Wordpress e configurar o Mysql RDS!  
​
  - cd /var/www/html
  - wget https://wordpress.org/latest.tar.gz (Instalar a última versão):
  - tar -xzf latest.tar.gz (descompactar o arquivo).
  - cd wordpress/ (acessar a pasta Wordpress).
  - cp wp-config-sample.php wp-config.php (copiar o arquivo de configuração).
  - vim wp-config.php (editar o arquivo de configuração com as seguintes informações:
  - Encontrar no arquivo e editar:
    
          -define('DB_NAME', 'nome da base'); (nome do Banco)
          -define('DB_USER', 'usuario'); (nome do usuário)
          -define('DB_PASSWORD', 'senha'); (senha do banco)
          -define('DB_HOST', 'endpoint do rds mysql'); (endereço do banco RDS)
   
     - https ://api.wordpress.org/secret-key/1.1/salt/ (acessar este endereço e copiar as linhas para cookies que o WordPress e substituir no arquivo )
     - Encontrar no arquivo, deletar e colar todas as linhas do site:
    
          -define('AUTH_KEY',         'XyOG`meM9KCY%s%SJhsy171hhMfw4MnW#VMne3y-EE 2r.1l0tQTAZDAL`OwwjCH');
          -define('SECURE_AUTH_KEY',  '$8gTHj|AAsy4LV|?^o<i<E|X)3ulta _{5SOp^WiT_2S4Tfav=j#OGV*ik4_:(Ba');
          -define('LOGGED_IN_KEY',    '2ybXyg%+TkaVMUj5/=jmxYRq1E,W!CWt^Hpxj?#qq0-1|j!#CmKM5+UI-?Ec7 Q/');
          -define('NONCE_KEY',        'k?0KIKi?A^^ve=.-v5egYd!czzvOxbd,%$rs%,&Ar8WtU<oQ+LP.B}c4g0b7b-j:');
     
  - Salvar o arquivo
  - yum install php70-mysql (php usar o banco mysql)
  - mv wordpress/* . (mover todos os arquivos da pasta para /var/www/html)
  - rm -rf wordpress (deletar a pasta do wordpress vazia)
  - chown -R apache:apache (alterar usuário dos arquivos da pasta /var/www/html)
  - acessar o endereço do servidor no browser e concluir a instalação do Wordpress informando os dados de acesso usuario e senha do Banco  
  
  ### Instalar o Nginx!  
​
  - cd /etc/httpd/conf/httpd.conf
   -no arquivo encontrar a linha:
     -Listen 80
   -substituir por
     -Listen 127.0.0.1:8080
  - Salvar o arquivo
  - service httpd restart (restart no serviço do apache)
  - yum install nginx
  - service nginx restart (iniciando o serviço nginx)
  - vim /etc/nginx/nginx.conf
  - Alterar as seguintes linhas no arquivo nginx.conf:
    - user nginx (remover)
    - user apache (adicionar)
  - Encontrar esse trecho no arquivo e editar para essas informações:
    
          -server {
          -listen       80 default_server;
          -#listen       [::]:80 default_server;
          -server_name  ec2-18-188-174-37.us-east-2.compute.amazonaws.com;
          -root         /var/www/html;
          -}
   - Encontrar esse trecho no arquivo e editar para essas informações:
    
          -location / {
          -root           /var/www/html;
          -proxy_pass   http://127.0.0.1:8080/;
          -proxy_set_header  Host $http_host;
          -proxy_set_header  X-Real-IP $remote_addr;
          -}
     
  - Salvar arquivo editado nginx.conf
  - vim /etc/nginx/conf.d/proxy.conf (criar esse acrquivo)
  - Encontrar esse trecho no arquivo e editar para essas informações:
 
          -proxy_redirect  off;
          -proxy_set_header  Host $http_host;
          -proxy_set_header  X-Real-IP $remote_addr;
          -proxy_set_header  X-Forwarded-For $proxy_add_x_forwarded_for;
          -client_max_body_size 10m;
          -client_body_buffer_size 128k;
          -proxy_send_timeout 90;
          -proxy_connect_timeout 90;
          -proxy_read_timeout 90;
          -proxy_buffer_size 4k;
          -proxy_buffers 4 32k;
          -roxy_busy_buffers_size 64k;
          -proxy_temp_file_write_size 64k;
     
  
  - service httpd restart
  - service nginx restart
