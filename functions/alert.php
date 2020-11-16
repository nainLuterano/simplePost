<?php


function alert(){
    global $status;
    if(count($status) > 0) {

        printf("
            <div class='alert alert-%s'>
                %s
            </div>
        ", $status['class'], $status['mensagem']);
    }
}


function set_alert($classe, $mensagem) {
    global $status;
    $status['class'] = $classe;
    $status['mensagem'] = $mensagem;
}