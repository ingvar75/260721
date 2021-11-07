<?php

use app\views\dto\NotFoundDTO;

$variables = $this->getVariables();

/**
 * @var NotFoundDTO $variables
 */

?>
<div class="row justify-content-center mt-5">
    <div class="col-md-12 text-center">
        <span class="display-1 d-block">404</span>
        <div class="mb-4 lead">The page you are looking for was not found.</div>
        <a href="/" class="btn btn-link">Back to Home</a>
    </div>
</div>