### 易撰会员数据

    功能：cookie模拟登录，获取登录之后的数据                                      

#### 文件目录

    |-action            
        |-getCate.php   获取不同平台的分类
        |-index.php     首页
        |-login.php     登录 
        |-loginout.php  登出 
        |-toUrl.php     重定向跳转到文章详情页 
        |-yizhuan.php
    |-function          函数
        |-curl.php      curl函数
    |-static            静态文件
        |-css
        |-html
        |-js 
    |-index.php         入口文件 
    |-README.md         说明

#### 需要修改位置

* ./function/curl.php  里面函数getDatalogin() 中的易撰账号密码
* ./action/login.php   里面的后台登录账号密码（当然了这个是固定死的）



