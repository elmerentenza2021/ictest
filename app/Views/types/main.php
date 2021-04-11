<?= $this->extend('template/default') ?>


<?= $this->section('main') ?>

<script>

$.get("/types/getlist", function(data){
            
    const typesList = data;
    console.log(typesList);
    
    typesList.map((item) => {
        
        var node = document.createElement("LI");
        /**node.setAttribute("style", "width: fit-content;"); */
        node.setAttribute("class", "pt-4");
        var textnode = document.createTextNode(item.type);
        node.appendChild(textnode);
        document.getElementById("types").appendChild(node);

        var node_del = document.createElement("A");
        node_del.setAttribute("href", "/types/delete/"+item.id);
        var text_del = document.createTextNode(" delete ");
        node_del.appendChild(text_del);
        document.getElementById("types").appendChild(node_del);
    });
});

</script>
<br />
<div class="container">
    <div class="row">
        <ul id="types">
            <!-- <li class="pt-3" style="width: fit-content;">contact type </li>
            <a href="#"></a> -->
            
        </ul>
    </div>
</div>

<form action="/types/add/"   >
<div class="container">
    <div class="row ">
        <div class="col-lg-4 col-md-12">
            <div >
                <label for="type">Type</label>
                <input required type="text" name="type" value="" placeholder="Type">

            </div>
            <div >
                <input type="submit" value="Add type" >
            </div>
        </div>
    </div>
</div>
</form>


<?= $this->endSection() ?>