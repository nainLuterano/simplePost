<?php

function page_prev() {
    if(isset($_GET['page'])) {
        $page = intval($_GET['page']);
        if ($page > 1 ){
            return --$page;
        } else {
            return 1;
        }

    } else {
        return 1;
    }
}