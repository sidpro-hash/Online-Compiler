# Online-Compiler
Online Compiler for C,C++,JAVA,Python,JavaScript. 
[online compiler on Azure](http://collegeek-online-compiler.eastus.azurecontainer.io/) |
[online-compiler on AWS](http://ec2-54-82-89-25.compute-1.amazonaws.com/)


[Separate Compiler on Heroku](https://cpp-collegeek.herokuapp.com/)

![Compiler Preview](compiler.gif)

## How to Run?
You can download and install Docker [https://docs.docker.com/get-docker/](https://docs.docker.com/get-docker/)
Docker runs processes in isolated containers. A container is a process which runs on a host. The host may be local or remote.

**Docker Pull Command**

```
docker pull sidpro/compiler
```
**Start a apache server instance**

```
docker run -p 8080:80 --name compiler -d sidpro/compiler
```
Now you can check http://localhost:8080/ in your browser.


**Stop instance**
```
docker stop compiler
```
**Remove container**
```
docker rm compiler
```
**Remove Docker image**
```
docker rmi sidpro/compiler
```




