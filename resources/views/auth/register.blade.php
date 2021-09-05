<div class="body"></div>
        <div class="grad"></div>
        <div class="header">
              <div><span>ОХУ БОЛОН ЕВРОПЫН ОРНУУДААС</span> <br><span>АЙСУЙ БУЙ МОНГОЛД БУУХ БОЛОН</span><br><span>МОНГОЛООР ДАМЖИН ӨНГӨРӨХ</span><br><span>АЧААНЫ БИЧИГ БАРИМТЫН САН</span></div>
        </div>
        <br>
        <div class="login">
        
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Нэр">

                               @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                 
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="И-мейл хаяг">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autofocus placeholder="Нууц үг">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required autofocus placeholder="Баталгаажуулах нууц үг">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Бүртгүүлэх
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
         <style type="text/css">
@font-face {  
     font-family:Perforama; src: url('{{ asset('fonts/Perforama1.ttf') }}'); 
}

        .body{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url('images/all.jpg');
            background-size: cover;
            -webkit-filter: blur(5px);
            z-index: 0;
        }

            .grad{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
                z-index: 1;
                opacity: 0.7;
            }

            .header{
                position: absolute;
                top: calc(54% - 35px);
                left: calc(33% - 255px);
                z-index: 2;
            }
            
            .header div{
                float: left;
                color: #fff;
                font-size: 23px;
                font-weight: 200;
                font-family: Perforama;
            }

            .header div span{
                color:#e5e5e5;



            }

            .login{
                position: absolute;
                top: calc(50% - 75px);
                left: calc(50% - 50px);
                height: 150px;
                width: 350px;
                padding: 10px;
                z-index: 2;
            }

              .login input[type=email]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid #fff;
                border-radius: 2px;
                color: #fff;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                 margin-top: 10px;
            }

            .login input[type=password]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid #fff;
                border-radius: 2px;
                color: #fff;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }
            .login input[type=text]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid #fff;
                border-radius: 2px;
                color: #fff;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }
            .login button{
                width: 250px;
                height: 35px;
                background:  #0c80b8;
                border: 1px solid  #0c80b8;
                cursor: pointer;
                border-radius: 2px;
                color: #fff;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 6px;
                margin-top: 10px;
            }

            .login input[type=button]:hover{
                opacity: 0.8;
            }

            .login input[type=button]:active{
                opacity: 0.6;
            }

            .login input[type=text]:focus{
                outline: none;
                border: 1px solid #fff;
            }

            .login input[type=password]:focus{
                outline: none;
                border: 1px solid #fff;
            }

            .login input[type=button]:focus{
                outline: none;
            }

            ::-webkit-input-placeholder{
               color: #fff;
            }

            ::-moz-input-placeholder{
               color: #fff;
            }
            ::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}
        </style>