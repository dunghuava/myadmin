
<?php if ($this->session->flashdata('reponse')) { ?>
    <script >
        $(document).ready(function () {
            toastr.<?=$this->session->flashdata('reponse')['code']?>('<?=$this->session->flashdata('reponse')['message']?>')
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('disable_screen')) { ?>
    <script >
        $(document).ready(function () {
            $('html,body').css({'cursor':'pointer'});
            $(document).click(function (e) { 
                toastr.<?=$this->session->flashdata('reponse')['code']?>('<?=$this->session->flashdata('reponse')['message']?>')
            });
        });
    </script>
<?php } ?>