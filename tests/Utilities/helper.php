<?php

function create($class, $attr=[]){
    return factory($class)->create($attr);
}

// Go composer.json add to autoload-dev
