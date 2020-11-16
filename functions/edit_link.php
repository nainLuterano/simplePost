<?php

function edit_link($link,$id) {
    echo "<a href='/pages/edit/$link.php?id=$id' class='text-white'>editar</a>";
}