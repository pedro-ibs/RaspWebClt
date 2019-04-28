# Controlador Web Para Raspberry pi

## Resumo
Esse projeto refere se a primeira parte de um trabalho de Linguagem de programação um do segundo semestre do curso de Análise e desenvolvimento de Sistemas do Instituto Federal de Ciência e Tecnologia onde estudo. No entendo decidi fugir um pouco do tema, Neste projeto construir um sistema que pode controlar as entradas e saídas do computador embarcado Raspberry Pi contemplando alguns recursos básicos neste quesito. 

##### importante salientar que esse projeto não abrange aspectos de segurança do servidor pois se trata de um estudo focado em html, css, javascript e php. Desse modo caso seja necessário realize as configurações adequadas  de forma a abranger suas próprias necessidades




### Preparando ambiente.

Obtenha o [Raspbian Lite](https://www.raspberrypi.org/downloads/raspbian/), não iremos utilizar interface gráfica por conta disso o Raspbian Lite é o ideal para  esse trabalho.

Com a imagem em mão grave-a em um cartão sd de no mínimo 4Gb, utilize o comando fdisk para detectar o ponto de montagem e para gravar utilize o comando dd:

```
sudo fdisk -l
```
```
sudo dd if=2019-04-08-raspbian-stretch-lite.img of=/dev/mmcblk0
```

Configure sua porta ethernet para compartilhar rede com outros computadores e com a Raspberry devidamente  ligada e conectada utilize o comando nmap para descobrir seu IP 

```
nmap -sn 10.42.0.1/24
```
No lugar de 10.42.0.1 cooque o ip corespondente da sua interface de rede e em /24 a máscara de rede respectiva, com o ip em mão conecte via ssh o usuário padrão é pi e a senha padrão é raspberry

```
ssh pi@10.42.0.119
```

Antes de prosseguir,  com o comando raspi-config configure a raspberry de acordo com sua necessidade caso tenha dúvida procure saber sobre essas configurações no google há pontos importantes nelas
 
```
sudo raspi-config
```
Após a configuração podemos instalar todas as dependências necessárias para o pleno funcionamento desse projeto siga a sequência de comando:

```
sudo apt update
sudo apt upgrade
sudo rpi-update
sudo reboot - h now
```

```
sudo apt install apache2 -y
sudo apt install php libapache2-mod-php -y
```
para controlar os pinos do Raspberry utilizei o istale o [wiringpi](http://wiringpi.com/) com ele podemos facilmente controlar os pinos via comando shell script:

```
cd /tmp
wget https://lion.drogon.net/wiringpi-2.50-1.deb
sudo dpkg -i wiringpi-2.50-1.deb
sudo reboot - h now
```
---

Nesse ponto de o Servidor  está pronto, para confirmar acesse o ip de sua raspberry  com um navegador você deve ver a página do apache. Eu utilizei o visual Code para desenvolver a página, para isso usei a extensão [SSJ FS](https://github.com/SchoofsKelvin/vscode-sshfs) que por via ssh podemos editar os arquivos. Para baixar os arquivos do projeto basta clonar o repositório:

```
cd /var/www/html/
sudo mkdir RaspWebClt
sudo chown pi RaspWebClt
cd RaspWebClt/
git clone  https://github.com/pedro-ibs/RaspWebClt.git
mv RaspWebClt/* .
sudo rm -r RaspWebClt
```

No meu caso o acesso para a página web é “http://10.42.0.119/my/index.html”  isso pode mudar conforme o ip e o directŕio que decidiu colocar(sempre abaixo de  /var/www/html/)


# Sobre o Projeto 
Seu funcionamento é simples basicamente uso o método get do javascript para informar ao php qual botão foi pressionado juntamente com qual setor, e com o comando [shell_exec](https://www.php.net/manual/pt_BR/function.shell-exec.php)  controlo os pinos da raspberry juntamente ao  [wiringpi](http://wiringpi.com/).


##### Nos arquivos não há imagens mas elas podem ser facilmente adicionadas sendo inseridas na pasta ./img e com o arquivo ./php/matrizClt.inc devidamente atualizado( se necessário pois algumas imagens não se encontram nesse arquivo)
 
