<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

{{-- ck editor --}}
{{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script> --}}

{{-- <script>
 $(function()){
    if($("#editor").length>0){
      ClassicEditor
        .create( document.querySelector( '#editor' ) , {
            cloudServices: {
                tokenUrl: 'https://80320.cke-cs.com/token/dev/fcc599b0397d83c4919458cb60ff66943ecc155fe4e506ac22f640dbe6e1',
                uploadUrl: 'https://80320.cke-cs.com/easyimage/upload/'
            }
        })
        .then( editor=> {
            console.log(editor);
        })
        
        .catch( error => {
            console.error( error );
        } );
    }
    }
</script> --}}
<script src="{{ asset('assets/js/custom.js') }}"></script>



