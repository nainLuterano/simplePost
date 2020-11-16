<?php

    function page_next($numberPagination) {
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
            if ($page < $numberPagination ){
                return ++$page;
            } else {
                return $numberPagination;
            }
    
        } else {
            return 2;
        }
    }