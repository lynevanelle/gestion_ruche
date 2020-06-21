<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="public/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/icon/css/ionicons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>


<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#" >GESTION DES RUCHES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=ruches" >Ruches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listeInformation"  >Information</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-md-0">
                <a class="nav-link" href="#" >Connexion</a>
            </div>
        </div>
    </nav>
</header>
<body >
<?= $content ?>

</body>

<script src="public/js/validetor.js"></script>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/datatables/jquery.dataTables.js"></script>
<script src="public/js/datatables/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
        $("[rel='tooltip']").tooltip();
    });

    $('.btn_delete').on('click',function(){
        var id=$(this).attr('id');
        $('#Modal_Delete').modal('show');
        $('[name="ruche_delete"]').val(id);
    });

    $('.btn_delete-info').on('click',function(){
        var id=$(this).attr('id');
        $('#Modal_Delete').modal('show');
        $('[name="info_delete"]').val(id);
    });

    $('.add-info').on('click',function(){
        var id=$(this).attr('id');
        $('[name="id_r"]').val(id);

        $.ajax({
            type: 'POST',
            url: 'index.php?action=addInformation',
            dataType : "JSON",
            data:{id:id},
            success: function(response){
                var url="http://"+window.location.hostname+"/"+window.location.pathname.split("/")[1]+"?action=formInformation&id="+id;
                console.log(response);
                window.location.replace(url);

            },
            error: function(response) {
                console.log(JSON.stringify(response));
                var urls="http://"+window.location.hostname+"/"+window.location.pathname.split("/")[1]+"?action=action=ruches";
                window.location.replace(urls);


                },
        });



    });


</script>
</html>