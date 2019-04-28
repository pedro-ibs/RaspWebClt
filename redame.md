# RaspWebClt
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

Após gravar configure sua porta ethernet para compartilhar com outros computadores e com a Raspberry devidamente  ligada e conectada utilize o comando nmap para descobrir seu IP 

```
nmap -sn 10.42.0.1/24
```
 no lugar de 10.42.0.1 cooque o ip corespondente da sua interface de rede e em /24 a máscara de rede respectiva, com o ip em mão conecte via ssh o usuário padrão é pi e a senha padrão é raspberry

```
ssh pi@10.42.0.119
```

