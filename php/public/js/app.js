window.onload = index();

function index()
{
    $("#sign-btn").click(function(e)
    {
        $.ajax(
        {
            url : 'signup.php',
            type : 'GET',
            dataType : 'html',
            success : function(reponse_signup, statut)
            {
                $("#conteneur_page").html(reponse_signup);
                index();
            }
        });
    });

    $("#signup").submit(function(e)
    {
        e.preventDefault();
        $.ajax({
            url : 'traitement_signup.php',
            data: $("#signup").serialize(),
            method: "POST",
            success : function(reponse_traitement_signup, statut)
            {
                var x = document.getElementById("snackbar")
                x.className = "show";
                x.innerText = reponse_traitement_signup;
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    });

    $('[data-type="retour"]').click(function(e)
    {
        $.ajax(
        {
            url : 'connexionpage.php',
            type : 'GET',
            dataType : 'html',
            success : function(reponse_connexionpage, statut)
            {
                $("#conteneur_page").html(reponse_connexionpage);
                index();
            }
        });
    });

    $("#create-btn").click(function(e)
    {
        $.ajax(
        {
            url : 'connexionpage.php',
            type : 'GET',
            dataType : 'html',
            success : function(reponse_connexionpage, statut)
            {
                $("#conteneur_page").html(reponse_connexionpage);
                index();
            }
        });
    });

    $("#dl-btn").click(function(e)
    {
        $.ajax(
        {
            url : 'telecharger.php',
            type : 'GET',
            dataType : 'html',
            success : function(reponse_telecharger, statut)
            {
                $("#conteneur_page").html(reponse_telecharger);
                index();
            }
        });
    });

    $("#telecharger").submit(function(e)
    {
        e.preventDefault();reponse_connexionpage

        var file_data = $('#file').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                            
        $.ajax(
        {
            url: 'traitement_telecharger.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(reponse_traitement_telecharger)
            {
                console.log(reponse_traitement_telecharger); // display response from the PHP script, if any
            }
        });
    });

    $("#file").change(function(e)
    {
        var nom_fichier = new Array();

        if (this.value)
        {
            if ('files' in this)
            {
                for (var i = 0; i < this.files.length; i++)
                {                
                    var file = this.files[i];
                    if ('name' in file)
                    {
                        document.getElementById("conteneur_fichier").innerHTML  = "<p>"+ file.name +"</p>";
                    }
                }
            }
        }
        else
        {
            document.getElementById("conteneur_fichier").innerHTML  = "<p>Veuillez choisir un fichier</p>";
        }
    });
}