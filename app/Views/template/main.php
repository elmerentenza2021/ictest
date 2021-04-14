<?= $this->extend('template/default') ?>

<?= $this->section('main') ?>


<div class="container-fluid py-3" style=" display: flex;">
    <div class="container" >
        <div class="row" >
            <div class="col-lg-3" style="width: fit-content;">
                <h2 style="color:#ce8484; font-size: 28px; " ><?php  
                echo lang('msg.create_reservation');  ?></h2>
            </div>
            
            <div class="col-lg-7 pt-3" style="margin: 0; padding: 0;">
                <h4 style="font-size: 15px; color: gray;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla, earum et nihil dolore culpa delenitinihil dolore culpa delenitinihil dolore culpa delenitinihil!</h4>    
            </div>
            
        </div>
    </div>
</div>



<script>
    // in the case of update... getting the values...
    const type      = '<?php echo (isset($type)) ? $type : '' ;?>';
    const flag      = '<?php echo (isset($flag)) ? $flag : '';?>';
    const name      = '<?php echo (isset($name)) ? $name : '' ;?>';
    const phone     = '<?php echo (isset($phone)) ? $phone : '' ;?>';
    const birth     = '<?php echo (isset($birth)) ? $birth : '' ;?>';
    const coment    = '<?php echo (isset($coment)) ? $coment : '' ;?>';
    const id        = '<?php echo (isset($id)) ? $id : '' ;?>';

    function addTypeOptionsToSelect(){
        $.get("/types/getlist", function(data){
            
            const typesList = data;
            var sel = document.getElementById("type");
            // var opt = document.createElement("option");
            // opt.setAttribute("value", "");
            
            // //selected disabled hidden
            
            // opt.setAttribute("style", "color: #fff;");
            // opt.text = "";
            // sel.add(opt);
            
            typesList.map((item) => {
                var sel = document.getElementById("type");
                var opt = document.createElement("option");
                opt.setAttribute("value", item.id);
                
                // select the option in the case of updating...
                // because with jquery did not work for me...
                if (item.id == type)    
                        opt.setAttribute("selected", "");
                
                opt.text = item.type;
                sel.add(opt);
            });
        });            
    }

    /**
     * ************ Initializing values***************************
     */
    $(document).ready(function() {
        $("#txtEditor").Editor();
        
        // $('#txtEditorContent').text($('#txtEditor').Editor("getText"));
        
        addTypeOptionsToSelect();

        if (flag == 'updating'){
            
            $('#name').val(name);
            $('#phone').val(phone);
            $('#birth').val(birth);
            $('#btnsend').val('Update');
            $('#contact-form').attr('action', '/<?php echo $locale; ?>/update/' + id);
            $('#contact-form').attr('method', 'post');

            $('#idbtnlist').css('visibility', 'hidden');
            
            $("#txtEditor").Editor('setText', coment);
        }else{
            
            $('#btnsend').val('Send');
            $('#contact-form').attr('action', '/<?php echo $locale; ?>/add');
            $('#idbtnlist').attr('display', 'block');
            $('#idbtnlist').css('visibility', 'visible');
        }

    });

</script> 

    
<div class="container" id="listado" style="display:none">
        <div class="row col-lg-10 " style="min-height: 30rem">
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th><a href="#!" data-bind="click: sortByName"><?php  
                        echo lang('msg.Name'); ?></a></th>
                        <th><a href="#!" data-bind="click: sortByType"><?php  
                        echo lang('msg.Type'); ?></a></th>
                        <th><a href="#!" data-bind="click: sortByPhone"><?php  
                        echo lang('msg.Phone'); ?></a></th>
                        <th><a href="#!" data-bind="click: sortByBirth"><?php  
                        echo lang('msg.Birth'); ?></a></th>
                        <th><?php  
                        echo lang('msg.Select'); ?></th>
                    </tr>
                </thead>
                <tbody data-bind="foreach: itemsToShow">
                    <tr>
                        <td data-bind="text: name"></td>
                        <td data-bind="text: type"></td>
                        <td data-bind="text: phone"></td>
                        <td data-bind="text: birth"></td>
                        <td><input onclick="radioClick(this.value)" type="radio" name="element" data-bind="value:id;" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-auto mb-auto col-lg-12">
            <div class="col-lg-2 mt-2 ">
                <button class="btn btn-block btn-secondary " type="button" data-bind="click: back"><?php  
                    echo lang('msg.Back'); ?></button>
            </div>
            <div class="col-lg-2 mt-2 ">
            <button class="btn btn-block btn-secondary" type="button" data-bind="click: next"><?php  
                echo lang('msg.Next'); ?></button>
            </div>
            <div class="col-4 justify-content-center">
            <?php  
                echo lang('msg.Page'); ?>: <span data-bind="text: currentPage"></span>
                <?php  
                echo lang('msg.Total'); ?>: <span data-bind="text: totalPages"></span>
            </div>
            
            
            <div class="col-lg-2 mt-2 " >
                <button class="btn btn-block btn-primary" onclick="fnItem('u')"  type="button"><?php  
                echo lang('msg.Edit'); ?></button>
            </div>
            <div class="col-lg-2 mt-2 " >
                <button class="btn btn-block btn-danger" onclick="fnItem('d')"  type="button"><?php  
                echo lang('msg.Delete'); ?></button>
            </div>
        </div>
    </div>


<div class="container-fluid " style="background-color: #e4e2e2 ;">

    <form action="" id="contact-form">

        <input type="hidden" id="idcoment" name="coment" value="" >
        <input type="hidden" id="security" name="security" value="<?= $security ?>" >

        <div class="container">
            <div class="row mt-3" style="background-color: white;" >                
                    <div class="col-lg-3 col-sm-3 celdas" >
                        <img class="contact_icon" src="/images/person2.png" alt="" >
                        
                        <input required style="padding-left: 3.5rem;" type="text" id="name" name="name" placeholder="<?php  
                        echo lang('msg.Name'); ?>" value="" pattern="^[a-zA-Z ]+$">
                    </div>
                    <div class="col-lg-3 col-sm-3 celdas" >
                        <img class="contact_icon" src="/images/world2.png" alt="" >
                        <select required style="padding-left: 3.5rem;" name="type" id="type"  >
                            <option value="" selected disabled hidden><?php  
                                echo lang('msg.Type'); ?></option>

                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-3 celdas">
                        <img class="contact_icon" src="/images/telef2.png" alt=""  >
                        <input  style="padding-left: 3.5rem;" type="number" id="phone" name="phone" value="" placeholder="<?php  
                        echo lang('msg.Phone'); ?> 1234567890" 
                        min="1000000000"
                        max="999999999999"
                        minlength="8"
                        maxlength="12"
                        >
                    </div>
                    <div class="col-lg-3 col-sm-3 celdas">
                        <input required style="padding: 0.5rem 0; " type="date" id="birth" name="birth" >
                    </div>

            </div>
            <div class="row">
                <div class="col-lg-12 " style="padding: 0; margin: 0; background-color: #fff; margin-top: 1rem;">
                    <textarea id="txtEditor"></textarea> 
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row justify-content-end" >
                
                <div class="col-lg-2 col-md-2 col-sm-3 mb-3"  >
                    <button class="btn btn-block btn-primary " id="idbtnlist" data-bind="click: init" type="button"><?php  
                    echo lang('msg.List'); ?></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 mb-3" >
                    <button class="btn btn-block btn-danger" id="btnsend" type="submit"><?php  
                        echo lang('msg.Send'); ?></button>
                </div>
            </div>
        </div>
        <input  type="hidden" id="selectedItem" name="selectedItem" value="">
    </form>
</div>

<script src="/js/model.js"></script>
<script >

    $.get("/contacts/getlist", function(data){
        
        ko.applyBindings(new MyViewModel(data));
    });
    
    function fnItem(p){
        const v = $('#selectedItem').val();

        if (!v){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo lang('msg.fire_not') ?>',
                //footer: '<a href>Why do I have this issue?</a>'
            })
            return ;
        }
        if (p==='d'){
            Swal.fire({ 
                title: '<?php echo lang('msg.fire_dtitle') ?>', 
                text: "<?php echo lang('msg.fire_dtext') ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33', 
                confirmButtonText: '<?php echo lang('msg.fire_dconfirm') ?>'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '<?php echo lang('msg.fire_deleted') ?>!',
                        '<?php echo lang('msg.fire_deletedfile') ?>',
                        'success'
                    ).then(() => {
                        
                        setTimeout(function(){
                            
                        },2000);
                        window.location.replace("/<?php echo $locale; ?>/delete/"+v);
                    });
                }
            })
        }

        if (p==='u'){
            Swal.fire({
                title: '<?php echo lang('msg.fire_dtitle') ?>', 
                text: "<?php echo lang('msg.fire_updatemsg') ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33', 
                confirmButtonText: '<?php echo lang('msg.fire_go') ?>', 
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function(){
                        
                    },2000);
                    window.location.replace("/<?php echo $locale; ?>/load/"+v);
                }
            })
        }
    }

    function radioClick(v){
        $('#selectedItem').val(v);
        // console.log($('#selectedItem').val());
    }

    // $('#btnsend').click(function () {
        
    
    // });

    function validDate(){
        /**
            validaciones finales antes de hacer el submit.
        */
        var d_user = $('#birth').val()
        var a_user = d_user.split("-")
        var year2 = Number(a_user[0])
        var month2 = Number(a_user[1])
        var day2 = Number(a_user[2])

        var n = new Date();
        
        var arr = n.toLocaleDateString().split("/")
        
        var day1 = Number(arr[0])
        var month1 = Number(arr[1])
        var year1 = Number(arr[2])

        var dif = year1 - year2

        if (year2 > year1 || dif > 115){
            
            return false
        }
        console.log("year ok", year2 ,"----", year1)

        if (year2 === year1){

            if (month2 > month1){
                return false
            }
            console.log("month ok", month2 ,"----", month1)

            if (month2 === month1){

                if (day2 >= day1){
                    return false
                }

                console.log("day ok", day2 ,"----", day1)
            }
        }

        return true
    }

    $('#contact-form').submit(function (e){
        // e.preventDefault();
        $('#idcoment').val($("#txtEditor").Editor('getText'));

        if (!validDate()){
            e.preventDefault();
            $('#birth').focus()
            
            alert($('#birth').val()+"... NO !!!!")
        }

        

        // let telef = $('#phone').val()
        // let regexp = '/ ^ \ (? (\ d {3}) \)? [-]? (\ d {3}) [-]? (\ d {4}) $ /'
        // let res = regexp.test(telef)
        // console.log("todo ok");


                
    });
</script>

<?= $this->endSection() ?>
