
ClassicEditor
        .create( document.querySelector( '#editor' ), { 
            cloudServices: {
                tokenUrl: 'https://80320.cke-cs.com/token/dev/fcc599b0397d83c4919458cb60ff66943ecc155fe4e506ac22f640dbe6e1',
                uploadUrl: 'https://80320.cke-cs.com/easyimage/upload/'
            }
        })
        
        .catch( error => {
            console.error( error );
        } );

if($("#frm_comment").length>0){
    $("#frm_comment").on('submit',function(){
        $.ajax({
            beforeSend:function(){
                $("#btn-comment").html('Menyimpan.. <i class="fas fa-stroopwafel fa-spin"></i>');
                console.log($("#frm_comment").serialize());
            },
            url:$("#frm_comment").attr('action'),
            dataType:'JSON',
            method:'POST',
            data:$("#frm_comment").serialize(),
            success:function(data){
                if(data==true){
                    $("#btn-comment").html('SEND');
                    location.reload();
                }
                console.log(data);
            },
            error:function(err){
                console.log(err);
            }
        });
        return false;
    });
}