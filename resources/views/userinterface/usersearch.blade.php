<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LINTASARTA</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('userinterface/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('userinterface/css/stylish-portfolio.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('userinterface/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
        
        .search {
          text-align: center;
          margin: 22em 0em 0em 0em;
          position: relative;
        }
        .s-bar {
          width: 34%;
          margin: 0 auto;
          padding: 0.5em 0em 0.5em 0em;
        }
        .s-bar input[type="text"] {
          font-size: 1em;
          font-weight: 600;
          color: gray;
          padding: 1.3em 1em 1.3em 1.5em;
          width: 70%; 
          border-radius: 5px 0px 0px 5px;
         -webkit-border-radius: 5px 0px 0px 5px;
          -moz-border-radius: 5px 0px 0px 5px;
          -o-border-radius: 5px 0px 0px 5px;
          background: rgba(255, 255, 255, 0.5);
          border: none;
          outline: none;
          -webkit-appearance: none;
        }
        .s-bar input[type="submit"]{
          font-size: 1em;
          font-weight: 600;
          color: #fff;
          padding: 1.3em 0.5em;
          width: 22%;
          text-align: center;
          border-radius: 0px 5px 5px 0px;
          -webkit-border-radius:0px 5px 5px 0px;
          -moz-border-radius:0px 5px 5px 0px;
          -o-border-radius:0px 5px 5px 0px;
          margin: 0px 0px 0px -4px;
          background:#7ac209;
          cursor:pointer;
          border: none;
          outline: none;
          -webkit-appearance: none;
          background: #7ac209;
          background: -moz-linear-gradient(top, #7ac209 0%, #7ac209 37%, #7ac209 66%, #7ac209 100%);
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7ac209), color-stop(37%,#7ac209), color-stop(66%,#7ac209), color-stop(100%,#7ac209));
          background: -webkit-linear-gradient(top, #7ac209 0%,#7ac209 37%,#7ac209 66%,#7ac209 100%);
          background: -o-linear-gradient(top, #7ac209 0%,#7ac209 37%,#7ac209 66%,#7ac209 100%);
          background: -ms-linear-gradient(top, #7ac209 0%,#7ac209 37%,#7ac209 66%,#7ac209 100%);
          background: linear-gradient(to bottom, #8EDB15 0%,#8EDB15 37%,#8EDB15 66%,#8EDB15 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7ac209', endColorstr='#7ac209',GradientType=0 );
        }
        .s-bar input[type="submit"]:hover{
            opacity: 0.8;
              filter: alpha(opacity=100); 
              transition: all 0.3s ease; 
             -webkit-transition: all 0.3s ease;
             -moz-transition: all 0.3s ease;
             -o-transition: all 0.3s ease;
        }
        .search i {
          background: url(../images/search.png)no-repeat;
          width: 31px;
          height: 31px;
          display: block;
          position: absolute;
          top: 20%;
          left: 32.2%;
          cursor: pointer;
        }
        .search p {
          font-size: 0.9em;
          font-weight: 400;
          color: #fff;
          margin: 1em 0em 0em 0em;
        }
        .search p a {
          font-size: 0.9em;
          font-weight: 400;
          color: #fff;
          text-decoration: underline;
        }
        .search p a:hover {
            text-decoration:none;
        }
        @media(max-width:1440px){
        .search i {
          left: 29.2%;
        }
        .s-bar {
          width: 40%;
        }
        }
        @media(max-width:1366px){

        }
        @media(max-width:1280px){
        .copyright {
          margin: 13em 0em 4em 0em;
        }
        .s-bar input[type="text"] {
          width: 63%;
        }
        .search i {
          left: 30.2%;
        }
        }
        @media(max-width:1024px){
        .s-bar {
          width: 50%;
        }
        .search i {
          left: 25.2%;
        }
        .copyright {
          margin: 13em 0em 4.1em 0em;
        }
        }
        @media(max-width:768px){
        .copyright {
          margin: 21em 0em 7.2em 0em;
        }
        .search {
          margin: 22em 0em 0em 0em;
        }
        .s-bar {
          width: 58%;
        }
        .search i {
          left: 19.5%;
        }
        .s-bar input[type="text"] {
          width: 67%;
        }
        .copyright p {
          font-size: 0.9em;
        }
        }
        @media(max-width:667px){
        .search i {
          left: 18.5%;
        }   
        }
        @media(max-width:640px){
        .s-bar {
          width: 65%;
        }
        .search i {
          left: 15.5%;
        }   
        }
        @media(max-width:600px){
        .search i {
          left: 14.5%;
        }   
        }
        @media(max-width:568px){
        .s-bar input[type="text"] {
          width: 64%;
        }   
        }
        @media(max-width:480px){
        .s-bar input[type="text"] {
          width: 55%;
          font-size: 0.8em; 
        }
        .s-bar input[type="submit"] {
          width: 30%;
          font-size: 0.8em;
        }
        .search i {
          top: 17%;
        }
        }
        @media(max-width:414px){
        .search i {
          top: 16%;
          left: 13.5%;
        }   
        }
        @media(max-width:320px){
        .copyright {
          margin: 10.45em 0em 3em 0em;
        }
        .copyright p {
          font-size: 0.8em;
        }
        .copyright p {
          font-size: 0.8em;
        }
        .search {
          margin: 11.25em 0em 0em 0em;
        }
        .s-bar {
          width: 100%;
        }
        .search i {
          left: 43%;
          top: -36%;
        }
        .search p {
          font-size: 0.72em;
        }
        .s-bar input[type="submit"] {
          text-shadow: rgba(80, 80, 80, 0.08) 1px 1px, 
                       rgba(80, 80, 80, 0.07) 2px 2px, 
                       rgba(80, 80, 80, 0.09) 3px 3px, 
                       rgba(80, 80, 80, 0.04) 4px 4px, 
                       rgba(80, 80, 80, 0.06) 5px 5px;              
        }
        }
        /*--meadia quiries end here--*/
    </style>

</head>

<body>
    <a class="btn btn-dark" style="color: white; position: fixed; z-index: 1; top: 0; right: 0; text-decoration: none;" href="{{URL::to('login')}}">Admin Page</a>
    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1><span class="fa fa-search"></span> Cari nomor tiket anda disini!</h1>
            <br>
            <div class="s-bar">
               <form role="form" method="POST" role="form" action="{{ URL::to('user-search') }}">
                <input type="text" name="NO_TIKET" value="Masukkan nomor tiket" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukkan nomor tiket';}">
                {{csrf_field()}}
                <input type="submit"  value="Search"/>
              </form>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>APLIKASNUSA LINTASARTA</strong>
                    </h4>
                    <p>Menara Thamrin 11th Floor
                        <br>Jl. M.H. Thamrin Kav. 3<br>
                        Central Jakarta 10250</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> +6221 230 2345 (Hunting)</li>
                        </li>
                    </ul>
                    <br>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; 2017</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="{{ URL::asset('userinterface/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('userinterface/js/bootstrap.min.js') }}"></script>

</body>

</html>
