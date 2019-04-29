# Controlador Web Para Raspberry pi

## Resumo
O projeto a seguir, apresenta a 1ª etapa de um trabalho acadêmico da disciplina de Linguagem de Programação 1 (LP1) ofertada no 2º módulo do curso de Análise e Desenvolvimento de Sistemas do Instituto Federal de Ciência e Tecnologia (IFSP – Campus Guarulhos). Para o projeto desta disciplina, decidi fugir um pouco do tema do cenário comum da disciplina e desenvolver algo mais aplicado a sistemas embarcados, com o desenvolvimento de um servidor web para controle dos GPIOs de uma Raspberry Pi.

Com o html, css, javascript e php junto ao [wiringpi](http://wiringpi.com/) desenvolvi uma pagina web para controlar os GPIOs de uma Raspberry Pi, onde onde uso o método get do javascript para informar ao php qual dos botões foram pressionado juntamente com o setor controlado, e com o comando [shell_exec](https://www.php.net/manual/pt_BR/function.shell-exec.php) controlo os pinos da raspberry juntamente ao [wiringpi](http://wiringpi.com/) excutando on comando shell como.



##### importante, esse projeto não abrange aspectos de segurança do servidor desse modo se necessário realize as configurações adequadas  de acordo com suas necessidades

---

### Preparando ambiente.

Obtenha o [Raspbian Lite](https://www.raspberrypi.org/downloads/raspbian/), não é necessario utilizar interface gráfica por conta disso o Raspbian Lite é o ideal.

Com a imagem em mãos grave-a em um cartão sd de no mínimo 4Gb, utilize o comando fdisk para detectar o ponto de montagem e para gravar utilize o comando dd:

```
sudo fdisk -l
```
```
sudo dd if=2019-04-08-raspbian-stretch-lite.img of=/dev/mmcblk0
```

Configure sua porta ethernet para “Compartilhar com outros computadores”, com a Raspberry devidamente  ligada e conectada utilize o comando nmap para descobrir seu IP

```
nmap -sn 10.42.0.1/24
```
No lugar de 10.42.0.1 coloque o ip corespondente de sua interface de rede e em /24 a máscara de rede respectiva, após descobrir o ip conecte se via ssh o usuário padrão é senha padrão são  pi e raspberry

```
ssh pi@10.42.0.119
```

Antes de prosseguir,  com o comando raspi-config configure a raspberry de acordo com suas necessidades caso tenha dúvida procure saber sobre essas configurações no google há pontos importantes nelas
 
```
sudo raspi-config
```
Após a configuração podemos instalar todas as dependências necessárias para o funcionamento do projeto, então siga a sequência de comando:

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
Para controlar os pinos do Raspberry utilizei o [wiringpi](http://wiringpi.com/) com ele podemos facilmente controlar os pinos via comando shell script, para instalar siga com os seguintes comando:

```
cd /tmp
wget https://lion.drogon.net/wiringpi-2.50-1.deb
sudo dpkg -i wiringpi-2.50-1.deb
sudo reboot - h now
```
---

Nesse ponto de o Servidor está pronto, para confirmar acesse o ip de sua raspberry  com um navegador, e então você deve ver uma página do apache.

Eu utilizei o Visual Code para desenvolver o projeto, para isso usei a extensão chamada [SSJ FS](https://github.com/SchoofsKelvin/vscode-sshfs) onde podemos editar os arquivos vias ssh através do Visual Code.

Para baixar os arquivos do projeto basta clonar o repositório em /var/www/html:

```
cd /var/www/html/
sudo mkdir RaspWebClt
sudo chown pi RaspWebClt
cd RaspWebClt/
git clone  https://github.com/pedro-ibs/RaspWebClt.git
mv RaspWebClt/* .
sudo rm -r RaspWebClt
```

No meu caso o acesso da página web é “http://10.42.0.119/my/index.html”  isso pode mudar conforme o ip e o directotio que decidiu colocar os arquivos (sempre abaixo de  /var/www/html/).

##### Nos arquivos não há imagens mas elas podem ser facilmente adicionadas na pasta ./img e com o arquivo ./php/matrizClt.inc devidamente atualizado( se necessário, pois algumas imagens não se encontram nesse arquivo)


