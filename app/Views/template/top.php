<script>
    function logoClick(){
        window.location.replace('/contacts/');
    }
</script>
<div class="container-fluid" style="
    background-image: url('/images/banner.jpeg');
    background-color: black;
    background-repeat: no-repeat, repeat;
    height: 18rem;
    color: white;
">
    <div class="container" >
        <div class="row pt-5 pl-1" style=" align-items: center; display: flexbox;" >
            <div class="col-lg-3">
                <h1 style="font-size: 60px;" onclick="logoClick()">
                    <span style="font-weight: 700; ">ISU</span><span >Corp</span>
                </h1>
            </div>
            <div class="col-lg-4 pt-4">
                <h4 style="margin: 0; padding: 1rem 2rem; width: fit-content; ">
                <?php  
                        echo lang('msg.world_class'); ?> <br /><?php  
                        echo lang('msg.soft_dev'); ?>
                </h4>
            </div>
        </div>
    </div>
</div>


