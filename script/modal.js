//fonction prend en entrée un id task
function openModal(pId){ 
    console.log(pId) 
    //fonction ajax pour récupérer les données
    jQuery.ajax({
                type: "GET",
                url: "./view/view_detail_task.php?ID="+pId,
                dataType: 'text',
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                beforeSend: function(xhr) {
                xhr.overrideMimeType('text/html; charset=UTF-8');
            },
                success: function(data,textStatus){
                    //fonction ouverture du dialog Jquery
                    $(function(){
                        $('#dialog').dialog({
                            show: {
                            effect: "blind",
                            duration: 500
                        },
                            //modal: true,
                            bgiframe: false,
                            resizable: false,
                            draggable:true,
                            width: 440,
                            title: 'Update task :'
                        });
                        //Je remplis ma DIV avec les infos
                        $('#dialog').html(data);
                        return false;
                    });
            },
                error: function (xhr, ajaxOptions, thrownError){
                    jAlert("Erreur de traitement Ajax");
            }
        });
    }