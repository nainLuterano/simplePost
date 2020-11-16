<?php
//href='/pages/delete/$link.php?id=$id'
function delete_link($link,$id) {
    echo "<div  
    class='text-white' onclick='(function (){
        if(confirm(\"Tem certeza de deletar?\")) 
            window.location = \"/pages/delete/$link.php?id=$id\";
        
    })()' >delete</div>";    
}