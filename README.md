AwesomeAdmin(碉堡了Admin)
===============

> 运行环境要求PHP7.1+
> mysql5.7
> redis6.0

[English](./README-EN.md) | 简体中文
## 一. 基本介绍

##二. 使用说明

####1. 本地使用docker-compose体验项目[官方文档](https://docs.docker.com/compose/install)

1. 安装
   1. 使用 Docker Desktop
      * [mac官方文档](https://hub.docker.com/editions/community/docker-ce-desktop-mac)
      * [Windows官方文档](https://hub.docker.com/editions/community/docker-ce-desktop-windows)
   2. Linux 安装docker-compose
      ```
      # 运行以下命令以下载Docker Compose的当前稳定版本
      sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
      # 将可执行权限应用于二进制文件：
      sudo chmod +x /usr/local/bin/docker-compose
      ```
2. 使用git克隆本项目
   - ```
          git clone
      ```
3. 一键启动运行项目
   1. 配置文件在./thinkphp6/docker-compose.yml下
      ```
        # 使用docker-compose启动四个容器
        docker-compose up
        # 如果您修改了配置选项,重新打包镜像
        docker-compose up --build
        # 使用docker-compose 后台启动
        docker-compose up -d
      ```
4. web项目预览 [http://127.0.0.1:8082](http://127.0.0.1:8082)
   1. 后台登录
      ```
      地址：http://127.0.0.1:8082/admin
      账号：admin
      密码：admin
      ```
   



