<!-- Tailwind -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- <link href="node_modules/quill/dist/quill.snow.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<style>
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    .font-family-karla { font-family: karla; }
    .bg-sidebar { background: #3d68ff; }
    .cta-btn { color: #3d68ff; }
    .upgrade-btn { background: #1947ee; }
    .upgrade-btn:hover { background: #0038fd; }
    .active-nav-link { background: #1947ee; }
    .nav-item:hover { background: #1947ee; }
    .account-link:hover { background: #3d68ff; }

    .tags-input {
        display: inline-block;
        border: 1px solid #ced4da;
        padding: 15px;
        border-radius: 4px;
        width:350px
    }

    .tags-input ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tags-input ul li {
        display: inline-block;
        background-color: #e2e3e5;
        color: #495057;
        padding: 5px;
        margin: 5px;
        border-radius: 4px;
        cursor: pointer;
        
    }


    .posts-content{
        margin-top:20px;    
    }
    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }
    .default-style .ui-bordered {
        border: 1px solid rgba(24,28,33,0.06);
    }
    .ui-bg-cover {
        background-color: transparent;
        background-position: center center;
        background-size: cover;
    }
    .ui-rect {
        padding-top: 50% !important;
    }
    .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
        position: relative !important;
        display: block !important;
        padding-top: 100% !important;
        width: 100% !important;
    }
    .d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
        -ms-flex-negative: 1;
        flex-shrink: 1;
    }
    .bg-dark {
        background-color: rgba(24,28,33,0.9) !important;
    }
    .card-footer, .card hr {
        border-color: rgba(24,28,33,0.06);
    }
    .ui-rect-content {
        position: absolute !important;
        top: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
    }
    .default-style .ui-bordered {
        border: 1px solid rgba(24,28,33,0.06);
    }

    .card-counter{
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover{
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary{
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger{
        background-color: #ef5350;
        color: #FFF;
    }  

    .card-counter.success{
        background-color: #66bb6a;
        color: #FFF;
    }  

    .card-counter.info{
        background-color: #26c6da;
        color: #FFF;
    }  

    .big-div {
        background-image: url('https://windowscustomization.com/wp-content/uploads/2019/04/Blue-Nebula.gif');
        background-size: cover;
        height:700px
    }
    .username{
        color:white;
        padding:5px;
    }


</style>