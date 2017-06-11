<style>
    *{
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-user-select: none;
        user-select: none;
    }
    a{
        color: #7B7D7D;
        transition: 0.2s ease-in-out;
        text-decoration: none;
    }
    a:hover{
        color: #E5E8E8;
        text-decoration: none;
        padding-left: 8px;
        padding-right: 8px;
    }
    a:focus{
        color: #7B7D7D;
        text-decoration: none;
    }
    .container-fluid{
        padding: 0;
        overflow-x: hidden;
    }
    /*collumn left & right*/
    .left{
        background-color: #242a2e;
        height:100vh;
    }
    .right{
        background-color: #5bb982;
        height:100vh;
    }
    .muli{
        font-family: 'Muli', sans-serif;
    }
    .mutedText{
        font-size: 16px;
    }
    .smaller{
        font-size: 12px;
    }
    .bigger{
        font-size: 42px;
    }
    /*colors*/
    .white{
        color: #ededed;
    }
    .gray{
        color: #7B7D7D;
    }
    #welcomeScreen{
        font-size: 85px;
        font-family: 'Muli', sans-serif;
        padding: 50px;
    }
    #slider{
        width: 93%;
        padding-top: 50px;
        text-align: center;
    }
    .topWelcome{
        position: absolute;
        top: 25%;
    }
    .logoContainer{
        position: absolute;
        top: 5%;
    }
    .logoImage{
        width: 300px;
    }
    .bottomWelcome{
        position: absolute;
        bottom: 0;
    }
    #loginForm{
        position: relative;
        margin-top: 50%;
        padding: 50px;
    }
    #bottomForm{
        position: absolute;
        bottom: 0;
        padding: 34px;
        right: 0;
    }
    .loginText{
        font-size: 23px;
        padding-left: 10px;
    }
    .loginButtonContainer{
        padding-top: 20px;
        padding-left: 15px;
    }
    .loginButton{
        color: #ededed;
        background-color: #242a2e;
        width: 110px;
        height: 35px;
        border: none;
        outline: none;
        transition: 0.2s ease-in-out;
    }
    .loginButton:hover{
        background-color: #7b878d;
    }
    .aForgot{
        color: #242a2e;
    }
    .aForgot:hover{
        color: #7b878d;
    }
    .wrongIdAlert{
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        color: #CB4335;
        padding-top: 20px;
    }
    .certificate{
        height: 35px;
    }
</style>