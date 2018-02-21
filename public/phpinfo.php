<?php

// check if environment is authorized to view php info
if (in_array(getenv('APPLICATION_ENV'), array('local', 'aws-qa'))) {

    // display php info
    phpinfo();

} else {

    // display error message
    echo '<img src="/img/phpinfo.jpg">';

}
